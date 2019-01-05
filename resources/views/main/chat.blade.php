@extends('main.app')
@section('title','Lawceylon-Homepage')
@section('headSection')
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-header">
            <h3>Lawceylon Chat</h3>
            <div id="app">
            <profilechat-app :user="{{auth()->user()}}"></profilechat-app> 
            </div>
        </div>
    </div>
@endsection
