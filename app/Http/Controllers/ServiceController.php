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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class ServiceController extends Controller
{

	public function __construct() {
		$this->middleware(['auth'])->except(['index', 'show']);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    	$allServices = Service::all();
    	$services = Service::showServices();

	    if((Auth::user())) {
		    return view('admin.services.index', compact('allServices'));
	    } else {
		    return view('services', compact('services'));
	    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
	    $this->validate($request, [
		    'title'             => 'required|max:100',
		    'service_content'   => 'required',
		    'active'            => 'nullable',
	    ]);

	    $service                    = new Service();
	    $service->title             = $request->title;
	    $service->service_content   = $request->service_content;
	    $service->active            = $request->active;

	    if($service->save()) {
		    return back()->with('status', 'New Service Added Successfully');
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service) {
    	//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service) {
    	return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service) {

	    $this->validate($request, [
		    'title'             => 'required|max:50',
		    'active'            => 'nullable',
		    'service_content'   => 'required',
	    ]);

	    $service->title             = $request->title;
	    $service->service_content   = $request->service_content != null ? $request->service_content : null;
	    $service->active            = $request->active;

	    if($service->save()) {
		    return back()->with('status', 'Service Info Updated Successfully');
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service) {
    	// Remove Service
	    if($service->delete()) {
		    return redirect()->action('ServiceController@index')->with('status', 'Service Deleted Successfully');
	    }
    }
}
