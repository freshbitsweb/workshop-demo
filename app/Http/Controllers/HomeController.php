<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $players = player::select('id', 'name', 'batting_average', 'bowling_average', 'playing', 'avatar')->get();

        return view('home', compact('players'));
    }
}
