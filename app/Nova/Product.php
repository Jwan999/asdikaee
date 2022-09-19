<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;

//use Laravel\Nova\Fields\Currency;
//use Pifpif\NovaTextCurrency\Currency;
use Laravel\Nova\Fields\Currency;
use Vyuldashev\NovaMoneyField\Money;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Product extends Resource
{
    public static function icon()
    {
        return '
<svg class="sidebar-icon"  viewBox="0 0 135 135" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Wireframe" stroke="none" stroke-width="1" fill="var(--sidebar-icon)" fill-rule="evenodd">
        <g id="Group-29" transform="translate(1.000000, 1.000000)" fill="var(--sidebar-icon)" fill-rule="nonzero" stroke="var(--sidebar-icon)" stroke-width="6">
            <path d="M66.2586377,37.1048371 C50.1574382,37.1048371 37.1048371,50.1574382 37.1048371,66.2586377 C37.1048371,82.3598372 50.1574382,95.4124383 66.2586377,95.4124383 C82.3598372,95.4124383 95.4124383,82.3598372 95.4124383,66.2586377 C95.3934526,50.165309 82.3519665,37.1238229 66.2586377,37.1048371 L66.2586377,37.1048371 Z M50.7435151,84.3392948 C54.5063104,79.6135127 60.2178062,76.8603188 66.2586377,76.8603188 C72.2994692,76.8603188 78.010965,79.6135127 81.7737603,84.3392948 C72.862183,92.0360712 59.6550924,92.0360712 50.7435151,84.3392948 L50.7435151,84.3392948 Z M85.4126847,80.4167834 C80.636371,74.7975805 73.6335013,71.5591663 66.2586377,71.5591663 C58.8837741,71.5591663 51.8809044,74.7975805 47.1045907,80.4167834 C39.791729,70.5637053 41.1470555,56.77001 50.2378165,48.5287019 C59.3285775,40.2873938 73.1886979,40.2873938 82.2794589,48.5287019 C91.3702199,56.77001 92.7255464,70.5637053 85.4126847,80.4167834 L85.4126847,80.4167834 Z" id="Shape"></path>
            <path d="M66.2586377,47.7062192 C62.5067613,47.7062192 59.1243188,49.966295 57.6885378,53.4325768 C56.2527569,56.8988587 57.04639,60.8887217 59.6993672,63.5416989 C62.3523445,66.1946762 66.3422075,66.9883093 69.8084893,65.5525283 C73.2747712,64.1167474 75.534847,60.7343049 75.534847,56.9824284 C75.534847,51.8593195 71.3817466,47.7062192 66.2586377,47.7062192 L66.2586377,47.7062192 Z M66.2586377,60.9579467 C64.0630196,60.9579467 62.2831194,59.1780465 62.2831194,56.9824284 C62.2831194,54.7868103 64.0630196,53.0069102 66.2586377,53.0069102 C68.4542558,53.0069102 70.234156,54.7868103 70.234156,56.9824284 C70.234156,59.1780465 68.4542558,60.9579467 66.2586377,60.9579467 Z" id="Shape"></path>
            <path d="M124.566239,58.3076012 C128.957475,58.3076012 132.517275,54.7478009 132.517275,50.3565647 L132.517275,29.1538006 C132.517275,24.7625644 128.957475,21.2027641 124.566239,21.2027641 L121.915893,21.2027641 L121.915893,13.2517275 C121.907131,5.93663307 115.97926,0.00876235058 108.664166,-1.42108547e-14 L18.5524186,-1.42108547e-14 C14.1611823,-1.42108547e-14 10.601382,3.55980031 10.601382,7.95103653 L10.601382,21.2027641 L7.95103653,21.2027641 C3.55980031,21.2027641 -6.39488462e-13,24.7625644 -6.39488462e-13,29.1538006 C-6.39488462e-13,33.5450368 3.55980031,37.1048371 7.95103653,37.1048371 L10.601382,37.1048371 L10.601382,58.3076012 L7.95103653,58.3076012 C3.5598004,58.3076013 -6.39488462e-13,61.8674016 -6.39488462e-13,66.2586377 C-6.39488462e-13,70.6498738 3.5598004,74.2096741 7.95103653,74.2096742 L10.601382,74.2096742 L10.601382,95.4124383 L7.95103653,95.4124383 C3.55980031,95.4124383 -6.39488462e-13,98.9722386 -6.39488462e-13,103.363475 C-6.39488462e-13,107.754711 3.55980031,111.314511 7.95103653,111.314511 L10.601382,111.314511 L10.601382,124.566239 C10.601382,128.957475 14.1611823,132.517275 18.5524186,132.517275 L108.664166,132.517275 C115.97926,132.508513 121.907131,126.580642 121.915893,119.265548 L121.915893,111.314511 L124.566239,111.314511 C128.957475,111.314511 132.517275,107.754711 132.517275,103.363475 L132.517275,82.1607108 C132.517275,77.7694745 128.957475,74.2096742 124.566239,74.2096742 L121.915893,74.2096742 L121.915893,58.3076012 L124.566239,58.3076012 Z M124.566239,26.5034551 C126.029984,26.5034551 127.216584,27.6900552 127.216584,29.1538006 L127.216584,50.3565647 C127.216584,51.8203101 126.029984,53.0069102 124.566239,53.0069102 L121.915893,53.0069102 L121.915893,26.5034551 L124.566239,26.5034551 Z M5.30069102,29.1538006 C5.30069102,27.6900552 6.48729112,26.5034551 7.95103653,26.5034551 L18.5524186,26.5034551 C20.016164,26.5034551 21.2027641,27.6900552 21.2027641,29.1538006 C21.2027641,30.617546 20.016164,31.8041461 18.5524186,31.8041461 L7.95103653,31.8041461 C6.48729112,31.8041461 5.30069102,30.617546 5.30069102,29.1538006 Z M5.30069102,66.2586377 C5.30069102,64.7948923 6.48729112,63.6082922 7.95103653,63.6082922 L18.5524186,63.6082922 C20.016164,63.6082922 21.2027641,64.7948923 21.2027641,66.2586377 C21.2027641,67.7223831 20.016164,68.9089832 18.5524186,68.9089832 L7.95103653,68.9089832 C6.48729112,68.9089832 5.30069102,67.7223831 5.30069102,66.2586377 Z M5.30069102,103.363475 C5.30069102,101.899729 6.48729112,100.713129 7.95103653,100.713129 L18.5524186,100.713129 C20.016164,100.713129 21.2027641,101.899729 21.2027641,103.363475 C21.2027641,104.82722 20.016164,106.01382 18.5524186,106.01382 L7.95103653,106.01382 C6.48729112,106.01382 5.30069102,104.82722 5.30069102,103.363475 Z M116.615202,119.265548 C116.615202,123.656784 113.055402,127.216584 108.664166,127.216584 L18.5524186,127.216584 C17.0886732,127.216584 15.9020731,126.029984 15.9020731,124.566239 L15.9020731,111.314511 L18.5524186,111.314511 C22.9436548,111.314511 26.5034551,107.754711 26.5034551,103.363475 C26.5034551,98.9722386 22.9436548,95.4124383 18.5524186,95.4124383 L15.9020731,95.4124383 L15.9020731,74.2096742 L18.5524186,74.2096742 C22.9436548,74.2096742 26.5034551,70.6498739 26.5034551,66.2586377 C26.5034551,61.8674015 22.9436548,58.3076012 18.5524186,58.3076012 L15.9020731,58.3076012 L15.9020731,37.1048371 L18.5524186,37.1048371 C22.9436548,37.1048371 26.5034551,33.5450368 26.5034551,29.1538006 C26.5034551,24.7625644 22.9436548,21.2027641 18.5524186,21.2027641 L15.9020731,21.2027641 L15.9020731,7.95103653 C15.9020731,6.48729112 17.0886732,5.30069102 18.5524186,5.30069102 L108.664166,5.30069102 C113.055402,5.30069102 116.615202,8.86049132 116.615202,13.2517275 L116.615202,119.265548 Z M124.566239,79.5103653 C126.029984,79.5103653 127.216584,80.6969654 127.216584,82.1607108 L127.216584,103.363475 C127.216584,104.82722 126.029984,106.01382 124.566239,106.01382 L121.915893,106.01382 L121.915893,79.5103653 L124.566239,79.5103653 Z" id="Shape"></path>
        </g>
    </g>
</svg>
';
    }

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Product::class;

    public static $priority = 4;


    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
//            ID::make(__('ID'), 'id')->sortable(),
            Text::make(__("Name"), 'name')->rules("required", "max:255")->sortable(),
            Textarea::make(__("Description"), 'description'),
            Image::make(__("Image"), "preview_img")->creationRules("required", "image")->disk('public'),
            Currency::make(__("Price"), 'price')->currency('IQD'),
//            Currency::make('Price')->currency('IQD'),
            BelongsTo::make(__("Category"), "category", Category::Class)->showCreateRelationButton(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
