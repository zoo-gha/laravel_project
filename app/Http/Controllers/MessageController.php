<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::paginate(5);
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.message.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required'
        ]);
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->content = $request->content;
        $message->save();
        return redirect()->back()->with('success', 'Message Sent Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function voir(Message $message)
    {
        return view('admin.messages.select', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        Message::destroy($message->id);
        return redirect()->route('messages.index')->with('success', 'Product Deleted Successfuly!!');
    }
}
