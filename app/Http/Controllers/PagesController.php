<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to Index!";
        return redirect('/books');
        //return view('pages.index')->with('title', $title); 
    }
    public function contact(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('pages.contact')->with('users', $user);
    }
    
    public function additem(){
        return view('pages.addItem'); 
    }
    public function about(){
        return view('pages.about'); 
    }

}
