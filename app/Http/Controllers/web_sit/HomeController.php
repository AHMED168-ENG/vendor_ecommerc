<?php

namespace App\Http\Controllers\web_sit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\main_catigory\catigors_models;
use App\models\sliders\slider_model;
use App\models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function activ_acount_notification()
    {
        return view('frontEnd\\activ_acount_notification');
    }

    public function active_acount($id)
    {
        $element = User::find($id);
        $element->update([
            "active" => "1",
        ]);
        $name = $element -> f_name . $element -> l_name;
        return redirect()->route("home")->with("welcome" , "welcome $name in my websit");
    }

    public function all_product($id)
    {
        $element = User::find($id);
        $element->update([
            "active" => "1",
        ]);
        $name = $element -> f_name . $element -> l_name;
        return redirect()->route("home")->with("welcome" , "welcome $name in my websit");
    }
}
