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

        <a href="{{route('messsage.create' , [$message->userFrom->id , $message->subject])}}" class="btn btn-primary">Reply</a>
</div>


@endsection
