<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\User;
use DB;

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
        $ALlusers = User::get();
        /*$ALlusers = DB::table('users')
        ->join('skill_user', 'users.id', '=', 'skill_user.user_id')
        ->join('skills', 'skill_user.skill_id', '=', 'skills.id')
        ->get();
        */
        return view('admin', ['ALlusers' => $ALlusers], ['AUser' => $AUser]);
    }

    public function member(Request $req)
    {
        $AUser = auth()->user();
        $ASkills = Skill::get();

        return view('user', ['ASkills' => $ASkills], ['AUser' => $AUser]);
    }
    
}
