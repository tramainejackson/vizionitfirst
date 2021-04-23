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

class NewsArticleController extends Controller
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
	    $allArticles    = NewsArticle::all();
	    $articles       = NewsArticle::showArticles();
	    $today          =  Carbon::now();

	    if((Auth::user())) {
		    return view('admin.news.index', compact('allArticles', 'today'));
	    } else {
		    return view('news_articles', compact('articles'));
	    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
	    $today          =  Carbon::now();

	    return view('admin.news.create', compact('today'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
	    $this->validate($request, [
		    'title'          => 'required|max:255',
		    'link'           => 'nullable|max:1000',
		    'document'       => 'nullable|file',
		    'article_image'  => 'nullable|image',
		    'active'         => 'nullable',
	    ]);

	    $document           = new NewsArticle();
	    $document->title    = $request->title;
	    $document->link     = $request->link;
	    $document->active   = $request->active;

	    if($request->hasFile('document')) {
		    $document_file = $request->file('document');
		    $document->document = $path = $document_file->store('public/documents');

		    if($document_file->guessExtension() == 'png' || $document_file->guessExtension() == 'jpg' || $document_file->guessExtension() == 'jpeg' || $document_file->guessExtension() == 'gif' || $document_file->guessExtension() == 'bmp') {
			    // Document is an image
			    $image = Image::make($document_file->getRealPath())->orientate();
			    $image->save(storage_path('app/'. $path));
		    }
	    }

	    if($request->hasFile('article_image')) {
		    $error = '';
		    $newImage = $request->file('article_image');

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
					    $image->resize(300, null, function ($constraint) {
						    $constraint->aspectRatio();
					    });

					    if($image->save(storage_path('app/public/images/' . str_ireplace(' ', '_', strtolower($document->title)) . '.' . $image_ext))) {
						    $document->image = str_ireplace(' ', '_', strtolower($document->title) . '.' . $image_ext);
					    }

				    } else {
					    // Resize the image before storing. Will need to hash the filename first
					    $path = $newImage->store('public/images');
					    $image = Image::make($newImage)->orientate()->resize(1600, null, function ($constraint) {
						    $constraint->aspectRatio();
						    $constraint->upsize();
					    });

					    // Save Image
					    if($image->save(storage_path('app/'. $path))) {

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

	    if($document->save()) {
		    return back()->with('status', 'New Article Added Successfully');
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsArticle  $news
     * @return \Illuminate\Http\Response
     */
    public function show(NewsArticle $news) {
	    $articles   = NewsArticle::showArticles();
	    $today      =  Carbon::now();

	    return view('admin.news.show', compact('articles', 'news', 'today'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsArticle  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsArticle $news) {
	    return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsArticle  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsArticle $news) {
	    $this->validate($request, [
		    'title'          => 'required|max:255',
		    'link'           => 'nullable|max:255',
		    'document'       => 'nullable|file',
		    'article_image'  => 'nullable|image',
		    'active'         => 'nullable',
	    ]);

	    $news->title    = $request->title;
	    $news->link     = $request->link;
	    $news->active   = $request->active;

	    // Check if file exist
	    $old_document = Storage::disk('public')->exists(str_ireplace('public', '', $news->document));

	    if($old_document) {
	    	$old_document = $news->document;
	    }

	    if($request->hasFile('document')) {
		    $document_file = $request->file('document');
		    $news->document = $path = $document_file->store('public/documents');

		    if($document_file->guessExtension() == 'png' || $document_file->guessExtension() == 'jpg' || $document_file->guessExtension() == 'jpeg' || $document_file->guessExtension() == 'gif' || $document_file->guessExtension() == 'bmp') {
			    // Document is an image
			    $image = Image::make($document_file->getRealPath())->orientate();
			    $image->save(storage_path('app/'. $path));
		    }

		    if($old_document) {
			    Storage::delete($old_document);
		    }
	    }

	    if($request->hasFile('article_image')) {
		    $error = '';
		    $newImage = $request->file('article_image');

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
					    $image->resize(300, null, function ($constraint) {
						    $constraint->aspectRatio();
					    });

					    if($image->save(storage_path('app/public/images/' . str_ireplace(' ', '_', strtolower($news->title)) . '.' . $image_ext))) {
						    $news->image = str_ireplace(' ', '_', strtolower($news->title) . '.' . $image_ext);
					    }

				    } else {
					    // Resize the image before storing. Will need to hash the filename first
					    $path = $newImage->store('public/images');
					    $image = Image::make($newImage)->orientate()->resize(1600, null, function ($constraint) {
						    $constraint->aspectRatio();
						    $constraint->upsize();
					    });

					    // Save Image
					    if($image->save(storage_path('app/'. $path))) {

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

	    if($news->save()) {
		    return back()->with('status', 'Article Updated Successfully');
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsArticle  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsArticle $news){
	    if($news->delete()) {
		    return redirect()->action('NewsArticleController@index')->with('status', 'Article Deleted Successfully!');
	    }
    }
}
