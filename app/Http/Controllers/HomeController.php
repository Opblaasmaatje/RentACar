<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // The home page is loaded, a selection of random cars will be viewable at the bottom
        $range = range(1, 20);
        shuffle($range);
        $n = 3;
        $result = array_slice($range, 0 , $n);
        $cars = Car::with(["gas", "brand"])->whereIn('id', $result)->get();
        return view('index')->with(compact("cars"));
    }
}
