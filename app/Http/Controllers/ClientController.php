<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Client;
use App\ClientImage;
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

class ClientController extends Controller
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
    	$allClients = Client::all();
    	$clients = Client::showClients();

	    if((Auth::user())) {
		    return view('admin.clients.index', compact('allClients'));
	    } else {
		    return view('clients', compact('clients'));
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
		    'first_name'    => 'required|max:50',
		    'last_name'     => 'nullable|max:50',
		    'email'         => 'nullable|email|max:50',
		    'phone'         => 'nullable',
		    'show_client'   => 'nullable',
		    'bio'           => 'required',
	    ]);

	    $client = new Client();
	    $client->email = $request->email;
	    $client->last_name = $request->last_name;
	    $client->first_name = $request->first_name;
	    $client->bio = $request->bio;
	    $client->phone = $request->phone;
	    $client->show_client = $request->show_client;

	    if($client->save()) {
		    return back()->with('status', 'New Client Added Successfully');
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client) {
    	$client_images = $client->images()->get();

    	return view('admin.clients.show', compact('client', 'client_images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client) {

    	return view('admin.clients.edit', compact('client', 'img_file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client) {

	    $this->validate($request, [
		    'first_name'    => 'required|max:50',
		    'last_name'     => 'nullable|max:50',
		    'email'         => 'nullable|email|max:50',
		    'phone'         => 'nullable',
		    'show_client'   => 'nullable',
		    'bio'           => 'required',
	    ]);

	    $client->last_name      = $request->last_name;
	    $client->first_name     = $request->first_name;
	    $client->email          = $request->email != null ? $request->email : null;
	    $client->bio            = $request->bio != null ? $request->bio : null;
	    $client->phone          = $request->phone != null ? $request->phone : null;
	    $client->show_client    = $request->show_client;
	    $newImageCounter = $client->images()->count() > 0 ? array_last(explode('_', $client->images->last()->file_name)) : 1;
//	    dd($request);

	    // Client Avatar (Default Image)
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

					    // prevent possible upsizing
					    // Create a larger version of the image
					    // and save to large image folder
					    $image->resize(1600, null, function ($constraint) {
						    $constraint->aspectRatio();
						    // $constraint->upsize();
					    });

					    if($image->save(storage_path('app/public/images/' . str_ireplace(' ', '_', strtolower($client->full_name())) . '_lg.' . $image_ext))) {
						    $client->avatar_height = $image->height();

						    // Create a smaller version of the image
						    // and save to large image folder
						    $image->resize(300, null, function ($constraint) {
							    $constraint->aspectRatio();
						    });

						    if ($image->save(storage_path('app/public/images/' . str_ireplace(' ', '_', strtolower($client->full_name())) . '_sm.' . $image_ext))) {
							    $client->avatar = str_ireplace(' ', '_', strtolower($client->full_name()) . '_sm.' . $image_ext);
						    }
					    }

				    } else {
					    // Resize the image before storing. Will need to hash the filename first
					    $path = $newImage->store('public/images');
					    $image = Image::make($newImage)->orientate()->resize(1600, null, function ($constraint) {
						    $constraint->aspectRatio();
						    $constraint->upsize();
					    });
					    $image->save(storage_path('app/'. $path));

					    // Save Image
					    if($addImage->save()) {

					    }
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

	    if($request->hasFile('media')) {
		    foreach($request->file('media') as $newImage) {
			    // Check to see if upload is an image
			    if($newImage->guessExtension() == 'jpeg' || $newImage->guessExtension() == 'png' || $newImage->guessExtension() == 'gif' || $newImage->guessExtension() == 'webp' || $newImage->guessExtension() == 'jpg') {
				    $addImage = new ClientImage();

				    // Check to see if images is too large
				    if($newImage->getError() == 1) {
					    $fileName = $request->file('media')[0]->getClientOriginalName();
					    $error .= "<li class='errorItem'>The file " . $fileName . " is too large and could not be uploaded</li>";
				    } elseif($newImage->getError() == 0) {
					    // Check to see if images is about 25MB
					    // If it is then resize it
					    if($newImage->getClientSize() < 25000000) {
						    $image = Image::make($newImage->getRealPath())->orientate();
//					        $path = $newImage->store('public/images');
						    $image_ext = substr($image->mime(), '6');

						    // prevent possible upsizing
						    // Create a larger version of the image
						    // and save to large image folder
						    $image->resize(1600, null, function ($constraint) {
							    $constraint->aspectRatio();
							    // $constraint->upsize();
						    });

						    if($image->save(storage_path('app/public/images/' . str_ireplace(' ', '_', strtolower($client->full_name())) . '_' . $newImageCounter . '_lg.' . $image_ext))) {
							    $addImage->lg_height = $image->height();

							    // Create a smaller version of the image
							    // and save to large image folder
							    $image->resize(300, null, function ($constraint) {
								    $constraint->aspectRatio();
							    });

							    if ($image->save(storage_path('app/public/images/' . str_ireplace(' ', '_', strtolower($client->full_name())) . '_' . $newImageCounter . '_sm.' . $image_ext))) {
								    $addImage->sm_height = $image->height();
								    $addImage->file_ext = $image_ext;
								    $addImage->file_name = str_ireplace(' ', '_', strtolower($client->full_name()) . '_' . $newImageCounter);
							    }
						    }

						    // Add Client ID
						    $addImage->client_id = $client->id;

						    // Save Image
						    if($addImage->save()) {}

					    } else {
						    // Resize the image before storing. Will need to hash the filename first
						    $path = $newImage->store('public/images');
						    $image = Image::make($newImage)->orientate()->resize(1500, null, function ($constraint) {
							    $constraint->aspectRatio();
							    $constraint->upsize();
						    });
						    $image->save(storage_path('app/'. $path));

						    $addImage->save();
					    }
				    } else {
					    $error .= "<li class='errorItem'>The file " . $fileName . " may be corrupt and could not be uploaded</li>";
				    }
			    } else {
				    // Upload is not an image. Should be a video
				    // May need to add an if to make sure its either an mp4 m4v or wmv or mov

			    }

			    $newImageCounter++;
		    }
	    }

	    if($client->save()) {
		    return back()->with('status', 'Client Info Updated Successfully');
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Client $client
     * @return \Illuminate\Http\Response
     */
	public function remove_images(Request $request) {
		if(isset($request->remove_image)) {
			$images = $request->remove_image;

			foreach($images as $image) {
				$removeImage = ClientImage::find($image);

				if($removeImage->delete()) {
					Storage::delete('public/images/' .$removeImage->file_name . '_sm.' . $removeImage->file_ext);
					Storage::delete('public/images/' .$removeImage->file_name . '_lg.' . $removeImage->file_ext);
				}
			}
		}

		return redirect()->back()->with('status', 'Client Images Deleted Successfully');
	}
}
