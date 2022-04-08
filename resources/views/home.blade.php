@extends('layouts.app')

@section('content')

                    @if (count($messages) > 0)
                        <ul class="list-group">
                            @foreach ($messages as $message)
                            <a href="{{route('messsage.show' ,$message->id)}}">
                                <li class="list-group-item">
                                       <strong>From: {{$message->userFrom->name}} , {{ $message->userFrom->email }}</strong> | Subject: {{ $message->subject }} <br>
                                       <small>{{$message->created_at->diffForHumans()}}</small>
                                       @if ($message->is_read)
                                       <span class="badge bg-success float-end">Read</span>
                                       @endif
                                </li>
                            </a>

                            @endforeach
                        </ul>
                    @else
                        <p>You have no messages</p>
                    @endif
@endsection
