<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Message;
use App\ConsultContact;
use App\ConsultResponse;
use App\Mail\NewConsultContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MessageController extends Controller
{
	public function __construct() {
		$this->middleware(['auth'])->except('store');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
	    $admin = Auth::user();
	    $messages = Message::paginate(10);
	    $messagesCount = Message::all()->count();
	    $today = Carbon::now();

        return view('admin.messages.index', compact('admin', 'messages', 'today', 'messagesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
	    $admin = Auth::user();

	    return view('admin.consult_request.create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

    	if(isset($request->chat)) {
		    $this->validate($request, [
			    'first_name'    => 'required|max:50',
			    'last_name'     => 'required|max:50',
			    'email'         => 'required|email|max:50',
			    'phone'         => 'nullable',
			    'message'       => 'required',
		    ]);
	    } else {
		    $this->validate($request, [
			    'first_name'    => 'required|max:50',
			    'last_name'     => 'required|max:50',
			    'email'         => 'required|email|max:50',
			    'phone'         => 'nullable',
			    'reason'        => 'required|array|min:1',
			    'message'       => 'required',
		    ]);
	    }


	    $message = new Message();
	    $message->email = $request->email;
	    $message->last_name = $request->last_name;
	    $message->first_name = $request->first_name;
	    $message->message = $request->message;
	    $message->phone = $request->phone;
	    $message->non_profit = 1;
	    $message->rpmanagement = 0;

	    if($message->save()) {
//		    $contact = new ConsultContact();
//		    $contact->consult_request_id = $message->id;
//		    $contact->email = $message->email;
//		    $contact->last_name = $message->last_name;
//		    $contact->first_name = $message->first_name;

//		    if($contact->save()) {}

//		    \Mail::to($message->email)->send(new Update($message));
//		    \Mail::to($message->email)->send(new NewConsultContact($contact));

		    return back()->with('status', 'Thank you for your request ' . $message->first_name . '. You will be hearing from us soon!');
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message) {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message) {

	    if($message->delete()) {
		    return redirect()->action('MessageController@index')->with('status', 'Message Deleted Successfully!');
	    }
    }
}
