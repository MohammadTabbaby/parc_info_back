<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;

use TCG\Voyager\Facades\Voyager;

class Charts extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
   
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {

        return view('dashbord');
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
?>

