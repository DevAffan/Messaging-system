<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
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
        $messages = Message::with('userFrom')->where('to_user_id', auth()->user()->id)->orderBy('created_at' , 'desc')->notDeleted()->get();
        // dd($messages);
        return view('home' , compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id = 0 , $subject = ''){
        if($id == 0){
            $users = User::where('id' , '!=' , auth()->user()->id)->get();
        }else{
            $users = User::where('id' ,$id)->get();
        }

        if($subject !== ''){
            $subject = 'Re: ' . $subject;
        }
        return view('create' , compact('users' , 'subject'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        // dd($request->all());
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'to_user' => 'required',
        ]);

        $message = new Message();
        $message->from_user_id = auth()->user()->id;
        $message->to_user_id = $request->to_user;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        return redirect()->route('home')->with('success' , 'Message sent successfully');

}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::with('userFrom')->find($id);
        // dd($message);
        $message->is_read = true;
        $message->save();
        return view('show' , compact('message'));
    }



    public function sent(){
        $messages = Message::with('userTo')->where('from_user_id', auth()->user()->id)->get();
        // dd($messages);
        return view('sent' , compact('messages'));
    }




    public function trash($id)
    {
        $message = Message::find($id);
        $message->is_deleted = true;
// dd($message);
        // $message->delete();
        $message->save();
        return redirect()->route('home')->with('success' , 'Message deleted successfully');
    }


}
