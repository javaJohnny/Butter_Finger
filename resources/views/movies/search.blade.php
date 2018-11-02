@extends('layouts.master')

@section('content')
<div class="pageup">
    <a href="#top"><img src="/img/chevron-up.png" alt="PageUp"></a>
</div>
<div class="container">
    <search-View title="{{$movie}}"></search-View>

</div>
@endsection
