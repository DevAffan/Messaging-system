@extends('layouts.app')

@section('content')

<form action="{{route('messsage.store')}}" method="post">
    @csrf
<div class="form-group">
    <label for="to">To:</label>
    <select name="to_user" id="to_user"  class="form-control">
        @foreach ( $users as $user)
        <option value="{{$user->id}}">{{$user->email}}</option>
        @endforeach
    </select>
</div>
    <div class="mb-3">
      <label for="subject" class="form-label">Subject</label>
      <input type="text" class="form-control" id="subject" name="subject" value="{{$subject}}">
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <input type="text" class="form-control" id="message" name="message">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
