<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageReason extends Model
{
	/**
	 * Get the reason from db
	 */
	public function getReasonAttribute($value) {
		return ucwords(str_ireplace('_', ' ', strtolower($value)));
	}

	/**
	 * Set the reason for db
	 */
	public function setReasonAttribute($value) {
		return strtolower(str_ireplace(' ', '_', $value));
	}

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
	 * Get the consult request record associated with the user.
	 */
	public function consultContact()	{
		return $this->hasOne('App\ConsultContact');
	}

	/**
	 * Get the consult request record associated with the user.
	 */
	public function consultResponse()	{
		return $this->hasOne('App\ConsultResponse');
	}

	/**
	 * Scope a query to only include most recent consult request
	 * that hasn't been responded to yet.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeLeastRecent($query)	{
		return $query->where('responded', '=', 'N')
					 ->orderBy('created_at', 'asc')
					 ->get();
	}
}
