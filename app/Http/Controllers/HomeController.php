<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

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
        return view('home');
    }

    public function admin(Request $req)
    {
        $AUser = auth()->user();
        $ASkills = Skill::get();

        return view('admin', ['ASkills' => $ASkills], ['AUser' => $AUser]);
    }

    public function member(Request $req)
    {
        $AUser = auth()->user();
        $ASkills = Skill::get();

        return view('user', ['ASkills' => $ASkills], ['AUser' => $AUser]);
    }
    
}
