@extends('layouts.master')


@section('content')

<div class="container emp-profile" style="margin-top:10px;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="/img/popcorn.png" alt="popcorn" style="width:80%; border-radius:50%; box-shadow:0 0 5px grey;float:left;"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{$user->name}}
                                    </h5>
                                    <h6>
                                        Member
                                    </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Statistic</a>
                                </li>
                            </ul>
                        </div>
                        <div class="row" style="padding:3em 0;">
                            <div class="col-md-8" style="margin:auto;">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>User Id</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{$user->id}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{$user->name}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{$user->email}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Phone</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>123 456 7890</p>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="z">
                                            <div>
                                                    <div class="z-card">
                                                        <h5>Reviews</h5>
                                                        <p>{{count($user->reviews)}}</p>
                                                    </div>
                                            </div>
                                            <div>
                                                <div class="z-card">
                                                    <h5>Favorites</h5>
                                                    <p>{{count($user->favorites)}}</p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="z-card">
                                                    <h5>Watched</h5>
                                                    <p>{{count($user->watched)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p">
                                            <a href="/profile/{{$user->id}}/stat" class="btn btn-primary">View more details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="/profile/{{$user->id}}/edit" class="profile-edit-btn" name="btnAddMore">Edit Profile</a>
                    </div>
                </div>


        </div>

@endsection
