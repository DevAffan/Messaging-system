@extends('layouts.app')
@section('content')
<div class="list-group">

    <div class="d-flex w-100 justify-content-between">
        <div>
            <h5 class="mb-1">From: {{$message->userfrom->email}}</h5>
            <h5 class="mb-1">Name: {{$message->userfrom->name}}</h5>
        </div>
        <small>Date: {{$message->created_at}}</small>
    </div>
        <hr>
        <p class="mb-1">Subject: {{$message->subject}}</p>
        <p>Message: {{$message->message}}</p>

    </div>

    <a href="{{route('home')}}" class="btn btn-warning">Back</a>
    <div class="float-end">
        <a href="{{route('messsage.create' , [$message->userFrom->id , $message->subject])}}" class="btn btn-primary">Reply</a>
        <a href="{{route('messsage.trash' , $message->id)}}" class="btn btn-danger">Delete</a>
    </div>
@endsection
