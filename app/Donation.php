<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Donation extends Authenticatable
{
    use Notifiable;
	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'payer_id', 'amount', 'first_name', 'last_name', 'company_name', 'email'
    ];
	
	/**
	* Get the name of the member
	*/
	public function getTitleAttribute($value) {
		return ucwords(strtolower($value));
	}

	/**
	* Get the link of the member
	*/
	public function getLinkAttribute($value) {
		return strtolower($value);
	}

	/**
	* Get the owner of the member
	*/
	public function getNameAttribute($value) {
		return ucwords(strtolower($value));
	}

	/**
	 * Get the avatar of the member
	 */
	public function getAvatarAttribute($value) {

		// Check if file exist
		if($value !== null) {
			$img_file = Storage::disk('public')->exists('images/' . $value);

			if($img_file) {
				$img_file = $value;
			} else {
				$img_file = 'empty_face.png';
			}
		} else {
			$img_file = 'empty_face.png';
		}

		return $img_file;
	}

	/**
	* Set the name of the member
	*/
	public function setTitleAttribute($value) {
		$this->attributes['title'] = ucwords(strtolower($value));
	}

	/**
	* Set the link of the member
	*/
	public function setLinkAttribute($value) {
		$this->attributes['link'] = strtolower($value);
	}

	/**
	* Set the owner of the member
	*/
	public function setNameAttribute($value) {
		$this->attributes['name'] = ucwords(strtolower($value));
	}

	/**
	 * Check for active clients
	 */
	public function scopeShowMembers($query) {
		return $query->where([
			['active', '=', 1],
			['non_profit', '=', 1],
		])->get();
	}
}
