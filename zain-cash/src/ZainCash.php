<?php


namespace Hdrm147;

use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

class ZainCash
{
    private $msisdn;
    private $secret;
    private $merchant_id;
    private $language;
    private $redirection_url;
    private $transaction_init_url = 'https://test.zaincash.iq/transaction/init';
    private $transaction_redirect_url = 'https://test.zaincash.iq/transaction/pay?id=';
    private $production;
    private $verify = false;


    /**
     * ZainCash constructor.
     * @param array $configuration
     * @throws \Exception
     */
    public function __construct($configuration)
    {
        $this->validate($configuration);
        $this->merchant_id = $configuration["merchant_id"];
        $this->msisdn = $configuration["msisdn"];
        $this->secret = $configuration["secret"];
        $this->language = $configuration["language"];
        $this->redirection_url = $configuration["redirection_url"];
        $this->production = $configuration["production_cred"] ?? false;
        $this->production = $configuration["production_cred"] ?? false;

        if ($this->production) {
            $this->transaction_init_url = 'https://api.zaincash.iq/transaction/init';
            $this->transaction_redirect_url = 'https://api.zaincash.iq/transaction/pay?id=';
        }

    }

    /**
     * @param $configuration
     * @throws \Exception
     */
    private function validate($configuration)
    {
        $fields = [
            "merchant_id" => "Merchant Id",
            "msisdn" => "Msisdn",
            "secret" => "Secret",
            "language" => "Language",
            "redirection_url" => "Redirection Url",
        ];
        foreach ($fields as $key => $field) {
            $value = $configuration[$key] ?? null;
            if (!$value || !is_string($value)) {
                throw new \Exception("$field is required and must be a string");
            }
        }


    }

    /**
     * @param $amount
     * @param $service_type
     * @param $order_id
     * @param bool $include_url
     * @param bool $auto_redirect
     * @return mixed
     * @throws \Exception
     */
    public function init($amount, $service_type, $order_id)
    {
        $token = $this->encode($amount, $service_type, $order_id);
        $options = $this->build($token);
        $response = $this->send($options);
        $result = $response->id;

        return [
            "id" => $response->id,
            "url" => $this->transaction_redirect_url . $result,

        ];

    }

    public function build($token)
    {
        return [
            "form_params" => [
                "token" => ($token),
                'merchantId' => $this->merchant_id,
                'lang' => $this->language,
            ],
            'verify' => $this->verify
        ];
    }

    /**
     * @param $options
     * @return \Psr\Http\Message\StreamInterface
     * @throws \Exception
     */
    private function send($options)
    {
        $client = new Client;
        $response = $client->post($this->transaction_init_url, $options)->getBody();
        $decoded = json_decode($response);
        Log::info(json_encode($decoded));
        if (property_exists($decoded, 'err')) {
            throw new \Exception($decoded->err->msg);
        }
        return $decoded;
    }


    private function encode($amount, $service_type, $order_id)
    {
        $now = time();
        $payload = [
            'amount' => $amount,
            'serviceType' => $service_type,
            'msisdn' => $this->msisdn,
            'orderId' => $order_id,
            'redirectUrl' => $this->redirection_url,
            'iat' => $now,
            'exp' => $now + 60 * 60 * 4
        ];

        $token = JWT::encode(
            $payload,      //Data to be encoded in the JWT
            $this->secret,
            'HS256'
        );

        return $token;
    }

    public static function decode($token, $secret)
    {
        $result = (array)JWT::decode($token, $secret, array('HS256'));
        return $result;
    }

}
