<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\User;

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
        
        return view('user/home');
    

    }
    public function show()
    {
        $user_id = auth()->user()->id;
        $stories = Story::orderBy('created_at' , 'DESC')->where('user_id', $user_id)->paginate(4);
        return view('user/show_stories')->with('stories' , $stories);
    
    }


   

}
