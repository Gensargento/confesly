<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function showMessageBox(String $username) {
        $messagedUser = User::where('name', $username)->first();
        return Inertia::render('ShowMessageBox')->with('user', $messagedUser);
    }

    public function sendMessage(String $username, Request $request) {
        $messagedUser = User::where('name', $username)->first();
        $request->validate([
            'content' => 'required',
        ]);
        $message = new Message();
        $message->content = $request->content;
        $message->user_id = $messagedUser->id;
        $message->save();
        return Inertia::render('MessageSentSuccesfully')->with('user', $messagedUser);
    }

    public function showDashboard() {
    $authenticatedUser = Auth::user();
    $messages = Message::select('*')->where('user_id',$authenticatedUser->id)->paginate(5);
    $messages = Message::select('*')->where('user_id',$authenticatedUser->id)->latest()->paginate(5);
    //return Inertia::render('Dashboard', ['messages' => $messages, 'user' => $authenticatedUser]);
    return Inertia::render('Dashboard')->with('messages', $messages)->with('user', $authenticatedUser);

    }
}
