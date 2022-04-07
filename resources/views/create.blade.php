@extends('layouts.app')

@section('content')

                    @if (count($messages) > 0)
                        <ul class="list-group">
                            @foreach ($messages as $message)
                                <li class="list-group-item">
                                    <a href="/messages/{{ $message->id }}">
                                       <strong>From: {{$message->userFrom->name}},{{ $message->userFrom->email }}</strong> | Subject: {{ $message->message }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    @else
                        <p>You have no messages</p>
                    @endif
@endsection
