<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Client extends Model
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
	public function setLastNameAttribute($value) {
		$this->attributes['last_name'] = ucwords(strtolower($value));
	}

	/**
	 * Set the user's first name.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setFirstNameAttribute($value) {
		$this->attributes['first_name'] = ucwords(strtolower($value));
	}

	/**
	 * Set the user's email.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setEmailAttribute($value) {
		$this->attributes['email'] = strtolower($value);
	}

	/**
	 * Get the user's avatar.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function getAvatarAttribute($value) {
		$client_image = '';
		$value != '' ? $client_image = $value : $client_image = 'default';

		// Check if file exist
		$img_file = Storage::disk('public')->exists('images/' . $client_image);

		if($img_file) {
			$img_file = $client_image;
		} else {
			$img_file = 'default.png';
		}

		return strtolower($img_file);
	}

	/**
	 * Get the documents for the contact.
	 */
	public function images() {
		return $this->hasMany('App\ClientImage');
	}

	/**
	 * Concat first and last name
	 */
	public function full_name() {

		if($this->last_name != '') {
			return $this->first_name . ' ' . $this->last_name;
		} else {
			return $this->first_name;
		}
	}

	/**
	 * Search contacts with criteria
	 */
	public function scopeSearch($query, $search)
	{
		return $query->where('first_name', 'like', '%' . $search . '%')
			->orWhere('last_name', 'like', '%' . $search . '%')
			->orWhere('email', 'like', '%' . $search . '%')
			->orWhere('phone', 'like', '%' . $search . '%')
			->get();
	}

	/**
	 * Check for duplicated
	 */
	public function scopeDuplicates($query)
	{
		return $query->selectRaw('*, COUNT(email) as email_count')
			->where('duplicate', null)
			->groupBy('email')
			->havingRaw('COUNT(email) > 1');
	}

	/**
	 * Check for active clients
	 */
	public function scopeShowClients($query) {
		return $query->where('show_client', '=', 1)
			->get();
	}

}