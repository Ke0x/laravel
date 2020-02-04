<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{
    function add(Request $req)
    {
        DB::table('skill_user')->insert(['skill_id' => $req->id, 'user_id' => Auth::user()->id, 'level' => $req->level]);
        return redirect()->route('user');
    }

    function update(Request $req)
    {
        DB::table('skill_user')->where('user_id', Auth::user()->id)->where('skill_id', $req->id)->update(['level' => $req->level ]);
        return redirect()->route('user');
    }

    function delete(Request $req)
    {
        DB::table('skill_user')->where('user_id', Auth::user()->id)->where('skill_id', $req->id)->delete();
        return redirect()->route('user');
    }
}

