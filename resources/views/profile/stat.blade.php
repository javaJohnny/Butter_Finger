@extends('layouts.master')

@section('content')
<div style="position:relative;">
<div class="fixed">
    <a href="/profile/{{$user->id}}"><img src="/img/left-arrow-angle.png" alt="home btn"></a>
</div>
    <div class="container">
        <div class="sgrid">
            <div class="stat-box">
                <h4>Favorites({{count($user->favorites)}})</h4>
                @if(count($user->favorites) > 0)
                @foreach($user->favorites as $movie)
                <div class="stat-card">
                    <favorite-show :data_id="{{$movie->movie_id}}"></favorite-show>
                </div>
                @endforeach
                @else
                    <h4>(YOU HAVE NO FAVORITES)</h4>
                @endif
            </div>
            <div class="stat-box">
                <h4>Watched({{count($user->watched)}})</h4>
                @if(count($user->watched) > 0)
                @foreach($user->watched as $movie)
                <div class="stat-card">
                    <favorite-show :data_id="{{$movie->movie_id}}"></favorite-show>
                </div>
                @endforeach
                @else
                    <h4>(YOU HAVE NO WATCHED MOVIES)</h4>
                @endif
            </div>
        </div>
        <div class="stat-box">
            <h4>Reviews({{count($user->reviews)}})</h4>
            @if(count($user->reviews) > 0)
            @foreach($user->reviews as $review)
            <div class="review">
                <div>
                    <favorite-show :data_id="{{$review->movie_id}}"></favorite-show>
                </div>
                <div class="review-card">
                    <div class="reviewer-name">
                        <h6>
                            Written as {{$review->name}}
                        </h6>
                    </div>
                    <div class="review-body">
                        "{{$review->review}}"
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h4>(YOU HAVE NO REVIEWS)</h4>
            @endif
        </div>
    </div>
</div>

@endsection
