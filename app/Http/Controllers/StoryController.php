<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\User;

class StoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['index', 'show'] ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::orderBy('created_at' , 'DESC')->paginate(5);
        return view('Stories/index')->with('stories' , $stories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Stories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate ($request , [ 
            'tittle' => 'required | max:50 ' , 
            'story' => 'required | max:455' , 
            
         ]);
    
         $story = new Story;
         $story->tittle = $request->input('tittle');
         $story->user_id = auth()->user()->id;
         $story->story = $request->input('story');
         $story->save();
    
         return redirect('/stories')->with('success' , 'Story created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::find($id);
        return view('Stories/show')->with('story' , $story);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $story = Story::find($id);

        if (auth()->user()->id !== $story->user_id) {
            return redirect('/stories')->with('error' , "You have no such right");
        }
        return view('Stories/edit')->with('story' , $story);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $story = Story::find($id);
        

         $story->tittle = $request->input('tittle');
         //$story->overview = $request->input('overview');
         $story->story = $request->input('story');
         //$story->url = $request->input('url');
         $story->save();
    
         return redirect('/stories')->with('success' , 'Story edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);

        if (auth()->user()->id !== $story->user_id) {
            return redirect('stories');
        }

        $story->delete();

        return redirect('/stories' )->with('success' , 'Story deleted');
    }
}
