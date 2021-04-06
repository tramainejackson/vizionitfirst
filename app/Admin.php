<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	/**
	 * Get the phone number of the settings
	 */
	public function concat_phone() {
		$concatPhone = null;

		if($this->phone != null) {
			if(strlen($this->phone) == 10) {
				$first3 = substr($this->phone, 0, 3);
				$second3 = substr($this->phone, 3, 3);
				$last4 = substr($this->phone, 6);

				$concatPhone = $first3 . '-' . $second3 . '-' . $last4;
			} else {
				$concatPhone = $this->phone;
			}
		} else {
			$concatPhone = $this->phone;
		}

		return $concatPhone;
	}

	/**
	 * Check for active services
	 */
	public function concat_address() {
		return $this->address . ' ' . $this->city . ', ' . $this->state;
	}
}
