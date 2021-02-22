<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Client;
use App\Member;
use App\MessageReason;
use App\Service;
use App\Mail\NewContact;
use App\Mail\Update;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('web');
    }

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$services = Service::all();

		return view('index', compact('services'));
	}

    /**
     * Show the home web page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about() {
	    // Get all the members to return
	    $members = Member::all();

	    return view('about', compact('members'));
    }

    /**
     * Show the home web page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact_us() {
    	$message_reasons = MessageReason::all();

	    return view('contact_us', compact('message_reasons'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function consult_request(Request $request) {
//    	dd($request);

	    $this->validate($request, [
		    'email'      => 'required|email|max:50',
		    'first_name' => 'required|max:50',
		    'last_name'  => 'required|max:50',
		    'service'  => 'required',
		    'type'  => 'required',
	    ]);

		$consult = new ConsultRequest();
		$consult->email = $request->email;
		$consult->last_name = $request->last_name;
		$consult->first_name = $request->first_name;
		$consult->service = $request->service;
		$consult->type = $request->type;

		if($consult->save()) {
			\Mail::to($consult->email)->send(new Update($consult));
//			\Mail::to('lorenzodevonj@yahoo.com')->send(new NewContact($consult));

			return back()->with('status', 'Thank you for your request ' . $consult->first_name . '. We will contact you at ' . $consult->email . ' soon!');
		}
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function rate_request(Request $request) {
//    	dd($request);

	    $this->validate($request, [
		    'email'      => 'required|email|max:50',
		    'first_name' => 'required|max:50',
		    'last_name'  => 'required|max:50',
		    'service'  => 'required',
		    'type'  => 'required',
	    ]);

		$consult = new ConsultRequest();
		$consult->email = $request->email;
		$consult->last_name = $request->last_name;
		$consult->first_name = $request->first_name;
		$consult->service = $request->service;
		$consult->type = $request->type;

		if($consult->save()) {
			return back()->with('status', 'Thank you for your request ' . $consult->first_name . '. We will contact you at ' . $consult->email . ' soon!');
		}
    }
}
