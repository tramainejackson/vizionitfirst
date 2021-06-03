<?php

namespace App\Http\Controllers;

use App\Donation;
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

    /**
     * Show the home web page.
     *
     * @return \Illuminate\Http\Response
     */
    public function donate() {
    	$message_reasons = MessageReason::all();

	    return view('donate', compact('message_reasons'));
    }

    /**
     * Show the home web page.
     *
     * @return \Illuminate\Http\Response
     */
    public function paypal_donation(Request $request)
    {
	    $this->validate($request, [
		    'orderID' => 'required|max:100',
		    'payerID' => 'required|',
		    'donation' => 'required',
		    'first_name' => 'required|max:50',
		    'last_name' => 'required|max:50',
		    'company_name' => 'nullable|max:100',
		    'email_address' => 'required|email|max:100',
	    ]);

	    $donation = new Donation();
	    $donation->order_id = $request->orderID;
	    $donation->payer_id = $request->payerID;
	    $donation->amount = $request->donation;
	    $donation->first_name = $request->first_name;
	    $donation->last_name = $request->last_name;
	    $donation->company_name = $request->company_name;
	    $donation->email = $request->email_address;

	    if ($donation->save()) {
		    return response('Thank you for your donation. We value your support and will continue to strive to uplift our communities!', 200)
			    ->header('Content-Type', 'text/plain');
	    } else {
		    return response('Donation Successful but some of your personal information wasn\'t saved', 200)
			    ->header('Content-Type', 'text/plain');
	    }
    }

}
