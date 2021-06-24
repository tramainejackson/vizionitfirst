<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Client;
use App\Member;
use App\MessageReason;
use App\Service;
use App\NewsArticle;
use App\Mail\NewContact;
use App\Mail\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class MemberController extends Controller
{

	public function __construct() {
		$this->middleware(['auth'])->except(['index']);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
	    $allMembers = Member::all();
	    $members = Member::showMembers();

	    if((Auth::user())) {
		    return view('admin.members.index', compact('allMembers'));
	    } else {
		    return view('members', compact('members'));
	    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
	    $this->validate($request, [
		    'name'      => 'required|max:50',
		    'title'     => 'nullable|max:50',
		    'email'     => 'nullable|email|max:50',
		    'phone'     => 'nullable',
		    'active'    => 'nullable',
		    'bio'       => 'nullable',
	    ]);

	    $member = new Member();
	    $member->name           = $request->name;
	    $member->title          = $request->title;
	    $member->email          = $request->email;
	    $member->phone          = $request->phone;
	    $member->active         = $request->active;
	    $member->bio            = $request->bio;
	    $member->non_profit     = 1;
	    $member->rpmanagement   = 0;

	    if($member->save()) {
		    return redirect()->action('MemberController@index')->with('status', 'New Member Added Successfully');
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Member $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member) {
    	return view('admin.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Member $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member) {

    	return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Member $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member) {

	    $this->validate($request, [
		    'name'    => 'required|max:100',
		    'email'   => 'nullable|email|max:50',
		    'title'   => 'nullable',
		    'phone'   => 'nullable',
		    'bio'     => 'required',
		    'active'  => 'required',
	    ]);

	    if($request->hasFile('avatar')) {

		    $newImage = $request->file('avatar');

		    // Check to see if upload is an image
		    if($newImage->guessExtension() == 'jpeg' || $newImage->guessExtension() == 'png' || $newImage->guessExtension() == 'gif' || $newImage->guessExtension() == 'webp' || $newImage->guessExtension() == 'jpg') {

			    // Check to see if images is too large
			    if($newImage->getError() == 1) {
				    $fileName = $request->file('media')[0]->getClientOriginalName();
				    $error .= "<li class='errorItem'>The file " . $fileName . " is too large and could not be uploaded</li>";
			    } elseif($newImage->getError() == 0) {
				    // Check to see if images is about 25MB
				    // If it is then resize it
				    if($newImage->getClientSize() < 25000000) {
					    $image = Image::make($newImage->getRealPath())->orientate();
//					    $path = $newImage->store('public/images');
					    $image_ext = substr($image->mime(), '6');

					    // Create a smaller version of the image
					    // and save to large image folder
					    $image->fit(1700, 1700, function ($constraint) {
						    $constraint->upsize();
					    });

					    if($image->save(storage_path('app/public/images/' . str_ireplace(' ', '_', strtolower($member->name)) . '.' . $image_ext))) {
							$member->avatar = str_ireplace(' ', '_', strtolower($member->name) . '.' . $image_ext);
					    }

				    } else {
					    // Resize the image before storing. Will need to hash the filename first
					    $path = $newImage->store('public/images');
					    $image = Image::make($newImage)->orientate()->resize(1600, null, function ($constraint) {
						    $constraint->aspectRatio();
						    $constraint->upsize();
					    });

					    //Save Image
					    $image->save(storage_path('app/'. $path));
				    }
			    } else {
				    $error .= "<li class='errorItem'>The file " . $fileName . " may be corrupt and could not be uploaded</li>";
			    }
		    } else {
			    // Upload is not an image.
			    // Redirect with error
			    $error .= "<li class='errorItem'>The file " . $fileName . " may be corrupt and could not be uploaded</li>";
		    }
	    }

	    $member->name      = $request->name;
	    $member->email     = $request->email != null ? $request->email : null;
	    $member->bio       = $request->bio != null ? $request->bio : null;
	    $member->phone     = $request->phone != null ? $request->phone : null;
	    $member->title     = $request->title != null ? $request->title : null;
	    $member->active    = $request->active != null ? $request->active : null;

	    if($member->save()) {
		    return back()->with('status', 'Member Info Updated Successfully');
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Member $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member) {
	    if($member->delete()) {
		    return redirect()->action('MemberController@index')->with('status', 'Team Member Deleted Successfully');
	    }
    }
}
