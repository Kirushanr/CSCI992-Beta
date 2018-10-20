<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Advert;



class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id){
        return view('messaging.landing',['id'=>$id]);
    }

    public function create($id){

        return view('messaging.create',['id'=>$id]);
    }



    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // don't show the current user in list
        $userId = Auth::id();
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        return view('messaging.show', compact('thread', 'users'));
    }

    public function store($id){
        try{

            $advert = Advert::findOrFail($id);
            $participant = $advert->user_id;

            $input = Input::all();
            $thread = Thread::create([
                'subject' => $input['subject'],
            ]);
            // Message
            Message::create([
                'thread_id' => $thread->id,
                'user_id' => Auth::id(),
                'body' => $input['message'],
            ]);
            // Sender
            Participant::create([
                'thread_id' => $thread->id,
                'user_id' => Auth::id(),
                'last_read' => new Carbon,
            ]);
            
            $thread->addParticipant($participant);
            
            return redirect()->route('user-messages');

        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function getThreads()
    {
        // All threads, ignore deleted/archived participants
        //$threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();
        return view('messaging.index', compact('threads'));
    }
    
    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => Input::get('message'),
        ]);
        // Add replier as a participant
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
        ]);
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }
        return redirect()->route('user-messages.show', $id);
    }
}
