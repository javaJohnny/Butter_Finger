@extends('layouts.master')

@section('content')
<div class="container">
    <similar-movie :id="{{$movieId}}"></similar-movie>
</div>

@endsection
