<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;



class HomeController extends Controller
{
    public function index()
    {
        $data = product::paginate(3);
        return view('home.userpage',compact('data'));
    }

    public function redirect()
    {
        $user_type = Auth::user()->user_type;

        if($user_type == '1' ){
            return view('admin.home');
        }else{
            $data = product::all();
        return view('home.userpage',compact('data'));
        }
    }

}