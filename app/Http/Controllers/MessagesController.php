<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::with('userFrom')->where('to_user_id', auth()->user()->id)->get();
        // dd($messages);
        return view('home' , compact('messages'));
    }

}
