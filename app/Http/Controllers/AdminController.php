<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class AdminController extends Controller
{

    function add(Request $req)
    {
        DB::table('skill_user')->insert(['skill_id' => $req->id, 'user_id' => $req->uid, 'level' => $req->level]);
        return redirect()->to('admin/'. $req->uid);
    }

    function update(Request $req)
    {
        DB::table('skill_user')->where('user_id', $req->uid)->where('skill_id', $req->id)->update(['level' => $req->level ]);
        return redirect()->to('admin/'. $req->uid);
    }

    function delete(Request $req)
    {
        DB::table('skill_user')->where('user_id', $req->uid)->where('skill_id', $req->id)->delete();
        return redirect()->to('admin/'. $req->uid);
    }


}
