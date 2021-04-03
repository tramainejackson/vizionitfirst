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
		    'title'     => 'required|max:255',
		    'link'      => 'nullable|max:1000',
		    'document'  => 'nullable|file',
		    'active'    => 'nullable',
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
        //
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
		    'title'     => 'required|max:255',
		    'link'      => 'nullable|max:255',
		    'document'  => 'nullable|file',
		    'active'    => 'nullable',
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
