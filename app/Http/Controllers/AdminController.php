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

    function newskill(Request $req)
    {
        $image = $req->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/');
        $image->move($destinationPath, $name);
        $path = 'assets/' . $req->name;

        DB::table('skills')->insert(['name' => $req->name, 'description' => $req->description, 'logo' => $path]);
        return redirect()->to('admin/'. $req->uid);
    }

    function editskill(Request $req)
    {
        $image = $req->file('image');
        $name = $req->name . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/');
        $image->move($destinationPath, $name);
        $path = 'assets/' . $name;

        DB::table('skills')->where('id', $req->id)->update(['name' => $req->name, 'description' => $req->description, 'logo' => $path ]);
        return redirect()->to('admin/skill/'. $req->id);
    }


}
