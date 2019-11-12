@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-4"><a href='/stories' class="btn btn-outline-light">←stories</a></div>
  <div class="col-4"></div>
  <div class="col-4"></div>
</div>


<div class="row mt-4">
  <div class="col-2"> </div>  
  <div class="col-8">
      <div class="card  w-100 h -100">
          <div class="card-body">
          <h5 class="card-title">{{$story->tittle}}</h5>
          <p class="card-text">{{$story->story}}</p>
          <small>Created by {{$story->user->name}} from {{$story->created_at}}</small>
          
        @if (!Auth::guest())
          @if (Auth::user()->id == $story->user_id)
          
      
          {!!Form::open( ['action' => ['StoryController@destroy', $story->id,] , 'method'=> 'POST' ])!!}
          {{Form::hidden('_method' , 'DELETE') }}
          {{Form::submit('Delete' , ['class'=>'btn btn-danger float-right  mr-2']) }}
          {!!Form::close() !!} 
          <a href="/stories/{{$story->id}}/edit"   class='btn btn-success float-right mr-2'>Edit</a>
        
          @endif
        @endif
          
         
    </div>
  </div>
  </div>
  <div class="col-2"></div>
</div>


    

@endsection
