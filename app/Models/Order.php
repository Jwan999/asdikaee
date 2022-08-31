<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $guarded;
    protected $casts = [
        "payment_details"=>"json",
        ];
    public function items(){
        return $this->hasMany(OrderItem::Class);
    }
}
