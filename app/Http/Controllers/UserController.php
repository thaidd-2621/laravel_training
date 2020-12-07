<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $leng = 0;
    public function index()
    {
        $users = DB::table('users')->get();
        return view('welcome', ['users' => $users]);
    }
    public function show(Request $request)
    {
        $id = 1;

        if( $id == null) {
            $user = DB::table('users')->get();
            foreach ($user as $value) {
                echo $value->id . " " . $value->name . " " . $value->email . "<br/>";
            }
        } else {
            $user = DB::table('users')->where('id', $id)->first();
            return view('greeting', ['user' => $user]);
        }

    }
    public function delete($id) 
    {
        $number = DB::table('users')->delete($id);
        if ($number > 0) {
            echo "Success";
        }
    }
}