<?php

namespace Klik\Validators;

class RegonValidator extends BaseValidator{


	public static function valid( $attribute, $value, $parameters ) {
		$self = new static;

		$value = trim( $value );

		if ( empty( $value ) ) {
			return true;
		}

		return $self->validateRegon( $value );
	}

	protected function validateRegon( $value ) {
		if ( ! $this->preValidation( $value, '/^\d{9}$/' ) ) {
			return false;
		}

		$sum      = $this->calculateSum( $value, [8, 9, 2, 3, 4, 5, 6, 7] );
		$modulo   = $sum % 11 !== 10 ? $sum % 11 : 0;
		$checksum = intval( $value[8] );

		return $modulo === $checksum; 
	}



}