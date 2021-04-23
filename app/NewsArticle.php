<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsArticle extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'email', 'last_name',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * Set the user's last name.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setLastNameAttribute($value)
	{
		$this->attributes['last_name'] = ucwords(strtolower($value));
	}

	/**
	 * Set the user's first name.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setFirstNameAttribute($value)
	{
		$this->attributes['first_name'] = ucwords(strtolower($value));
	}

	/**
	 * Set the user's email.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setEmailAttribute($value)
	{
		$this->attributes['email'] = strtolower($value);
	}

	/**
	 * Get the image of the news article
	 */
	public function getImageAttribute($value) {

		// Check if file exist
		if($value !== null) {
			$img_file = Storage::disk('public')->exists('images/' . $value);

			if($img_file) {
				$img_file = $value;
			} else {
				$img_file = 'empty_article.png';
			}
		} else {
			$img_file = 'empty_article.png';
		}

		return $img_file;
	}

	/**
	 * Get the document of the news article
	 */
	public function getDocumentAttribute($value) {

		// Check if file exist
		if($value !== null) {
			$document_file = Storage::disk('public')->exists('documents/' . $value);

			if($document_file) {
				$document_file = asset('/storage/documents/' . $value);
			} else {
				$document_file = null;
			}
		} else {
			$document_file = null;
		}

		return $document_file;
	}

	/**
	 * Check for active clients
	 */
	public function scopeShowArticles($query) {
		return $query->where([
			['active', '=', 1],
			['non_profit', '=', 1]
		])->orderBy('updated_at', 'desc')->get();
	}
}
