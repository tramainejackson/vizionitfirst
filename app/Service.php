<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Service extends Authenticatable
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
        'title', 'content', 'active'
    ];
	
	/**
	* Get the name of the service
	*/
	public function getTitleAttribute($value) {
		return ucfirst(strtolower($value));
	}

	/**
	* Get the link of the service
	*/
	public function getLinkAttribute($value) {
		return strtolower($value);
	}

	/**
	* Get the owner of the service
	*/
	public function getOwnerAttribute($value) {
		return ucwords(strtolower($value));
	}

	/**
	* Set the name of the service
	*/
	public function setTitleAttribute($value) {
		$this->attributes['title'] = ucfirst(strtolower($value));
	}

	/**
	* Set the link of the service
	*/
	public function setLinkAttribute($value) {
		$this->attributes['link'] = strtolower($value);
	}

	/**
	* Set the owner of the service
	*/
	public function setOwnerAttribute($value) {
		$this->attributes['owner'] = ucwords(strtolower($value));
	}

	/**
	 * Check for active services
	 */
	public function scopeShowServices($query)
	{
		return $query->where('active', '=', 1)
			->get();
	}
}
