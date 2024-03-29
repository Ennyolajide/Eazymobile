<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends NotificationController
{
    protected $messages;

    public function messageIndex()
    {
        $messages = request()->wantsJson() ?
            Message::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(25)->get()
            : Message::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);

        request()->wantsJson() ? $messages->makeHidden(['user_id','sender_id','reply', 'updated_at']) : false;

        return request()->wantsJson() ? response()->json($messages) : view('dashboard.messages.inbox', compact('messages'));
    }

    public function showMessage(Message $message)
    {
        $message->update(['read' => true]);
        $messages = request()->wantsJson() ?  '' : Auth::user()->messages->sortByDesc('id');
        request()->wantsJson() ? $message->makeHidden(['user_id','sender_id','reply', 'updated_at']) : false;

        return request()->wantsJson() ?
            response()->json($message) : view('dashboard.messages.message', compact('message', 'messages'));
    }

    public function createMessages()
    {
        $messages = Auth::user()->messages->sortByDesc('id');

        return view('dashboard.messages.compose', compact('messages'));
    }

    public function storeMessage()
    {
        $validateData = request()->validate([
            'subject' => 'required|min:5|max:50',
            'content' => 'required|min:15|max:300',
        ]);

        $validateData['sender_id'] = Auth::user()->id; //setting the sender as the logged in user
        $validateData['user_id'] = Auth::user()->role = 'customer' || 'reseller' ? 1 : 0;

        $status = Message::create($validateData);
        $response = $status ? 'message sent successfully' : 'message sending failed';

        return redirect(route('messages.inbox'))->withNotification($this->clientNotify($response, $status));
    }

    public function replyMessage(Message $message)
    {
        $validateData = request()->validate([
            'subject' => 'required|min:5|max:50', 'content' => 'required|min:15|max:300',
        ]);
        $validateData['reply'] = $message->id; // id of the message to be replied
        $validateData['user_id'] = $message->sender_id; //sender
        $validateData['sender_id'] = $message->user_id;
        $status = Message::create($validateData);
        $response = $status ? 'message sent successfully' : 'message sending failed';

        return redirect(route('messages.inbox'))->withNotification($this->clientNotify($response, $status));
    }

    public function deleteMessage(Message $message)
    {
        $status = $message->delete();

        $response = 'message deleted succesfully';

        return redirect(route('messages.inbox'))->withNotification($this->clientNotify($response, $status));
    }
}
