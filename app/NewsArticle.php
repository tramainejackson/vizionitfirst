<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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
	 * Get the documents for the contact.
	 */
	public function images() {
		return $this->hasMany('App\ClientImage');
	}

	/**
	 * Check for active clients
	 */
	public function scopeShowArticles($query) {
		return $query->where('active', '=', 1)
			->get();
	}
}
