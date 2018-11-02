@extends('layouts.master')

@section('content')
<show-movie :data_id="{{$movieId}}"></show-movie>
<div class="e">
    <form class="p" action="/favorite/{{$movieId}}" method="POST">
        {{csrf_field()}}
        <button type="submit" class="btn btn-success">Favorite</button>
    </form>
    <form class="r" action="/watched/{{$movieId}}" method="POST">
        {{csrf_field()}}
        <button type="submit" class="btn btn-warning">Watched</button>
    </form>
</div>

<div class="container">
    <h3 class="card-title">What do you think about the movie?</h3>
    <form class="form" action="/post/{{$movieId}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="movie_id" value="{{$movieId}}">
        <div class="input-group input-group-lg">
            <div class="input-group-prepend ">
                <span class="input-group-text" id="">Name</span>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Be anyone you want" required>
        </div>
        <div class="input-group mb-3">
            <textarea type="text" class="form-control" name="review" placeholder="Write here.." required>
            </textarea>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Post</button>
            </div>
        </div>
    </form>
    <div class="feedback">
        @if(count($reviews) <= 0)
        <p>Be the first to review!</p>
        @else
        @foreach($reviews as $review)
        <div class="custom-card">
            <div class="card-user">
                <h5>A review by <br> <span style="text-transform: uppercase;">{{$review->name}}</span></h5>
                <em>written at {{$review->created_at}}</em>
            </div>
            <div class="card-body">
                <p>{{$review->review}}</p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
