@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-1"></div>

    <div class="col-10"><div class="card-deck">
        <div class="card">
            <div class="card-body">
            <h3 class="card-title text-center">{{$username = auth()->user()->name }}</h3>
            

            @if(count($stories) > 0 ) 
            <h4 class="card-title text-center">Your stories</h4>
            <a href="/stories/create"   class='btn btn-primary float-right'>+Add</a>
            <br>
            
           
        
            @foreach ($stories as $story)
            <div>
            <a href="/stories/{{$story->id}}"><h5 >{{$story->tittle}}</h5></a>
            
            <p>{{$story->story}}</p>
            <a href="/stories/{{$story->id}}/edit"  class='btn btn-success float-left mr-2 '>Edit</a>
            {!!Form::open( ['action' => ['StoryController@destroy', $story->id,] , 'method'=> 'POST' ])!!}
            {{Form::hidden('_method' , 'DELETE') }}
            {{Form::submit('Delete' , ['class'=>'btn btn-danger  mr-2']) }}
            {!!Form::close() !!} 
        
            <hr>
            </div>

            @endforeach
            
            {{$stories->links()}}

            @else 
            <h5 class='text-center text-muted'>You've got no stories yet</h5>
            <a href="/stories/create"   class='btn btn-primary float-right'>+Add</a>   
            @endif

            </div>

       
        </div>
    </div>

    <div class="col-1"></div>
</div>


    
@endsection