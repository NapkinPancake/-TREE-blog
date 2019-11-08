@extends('layouts.app')

@section('content')
<div class='text-center mb-5'>
    <h1 class='Tittle'>Stories</h1>
    <div class='float-left'>{{$stories->links()}}</div>
    <a href="/stories/create"   class='btn btn-primary float-right'>+Add</a>
    <hr>
    
</div>


<div class="card-columns">

@foreach ($stories as $story)

<div class="card card-readonly ">
        <div class="card-body">
        <h5 class="card-title">{{$story->tittle}}</h5>
        <p class="card-text">{{$story->story}}</p>
        <a href="/stories/{{$story->id}}"   class='btn btn-success float-right ml-3'>View</a>
        </div>
        <br>
        
      </div>
      
@endforeach

</div>
    
@endsection