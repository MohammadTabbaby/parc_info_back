<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use DB;
class Reclamation extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Reclamation::count();
        $string = 'Reclamation';
        $count2 = 33;
        $string2="qsdqsdqs";
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-megaphone',
            'title'  => "{$count} {$string},{$count2} {$string2}",
            'text'   => __('', ['count' => $count, 'string' => Str::lower($string),
            'count2' => $count2, 'string2' => Str::lower($string2)]),
            'button' => [
                'text' => 'Reclamations',
                'link' => route('voyager.reclamations.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('Post'));
    }
}
