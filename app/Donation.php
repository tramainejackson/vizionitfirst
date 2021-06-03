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
	 * Create full name accessor
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function full_name()	{
		return $this->first_name . " " . $this->last_name;
	}
	
	/**
	* Get the name of the member
	*/
	public function getTitleAttribute($value) {
		return ucwords(strtolower($value));
	}

	/**
	* Set the name of the member
	*/
	public function setTitleAttribute($value) {
		$this->attributes['title'] = ucwords(strtolower($value));
	}

}
