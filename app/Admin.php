<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
	/**
	 * Check for active services
	 */
	public function concat_address(){
		return $this->address . ' ' . $this->city . ', ' . $this->state;
	}
}
