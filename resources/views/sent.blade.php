@extends('layouts.app')
@section('content')

<div class="list-group">
    @if (count($messages) > 0)
        @foreach ($messages as $message)
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">To: {{$message->userTo->email}}</h5>
                <small>{{$message->created_at->diffForHumans()}}</small>
            </div>
            <p class="mb-1">Subject: {{$message->subject}}</p>
            <small>{{$message->message}}</small>
            </a>
        @endforeach

    @else
        <p>You have no messages</p>
    @endif

</div>


@endsection
