<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Equipement extends BaseDimmer
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
        $count = \App\Equipement::count();
        $string = 'Equipements';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-hammer',
            'title'  => "{$count} {$string}",
            'text'   => __('', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'Equipements',
                'link' => route('voyager.equipements.index'),
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
