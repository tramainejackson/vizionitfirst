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
		return view('index');
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
}
