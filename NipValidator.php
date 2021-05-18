<?php

namespace Godler\Validators;

class NipValidator extends BaseValidator{


	public static function valid( $attribute, $value, $parameters ) {
		$self = new static;

		$value = trim( $value );

		if ( empty( $value ) ) {
			return true;
		}

		return $self->validateNip( $value );
	}

	protected function validateNip( $value ) {
		//Jeśli zaczyna się z dużej litery Z może być czymkolwiek.
		
		if(\preg_match('/^[Z].*/', $value)){
	
            return true;
		}
		
	

		
		
		if ( ! $this->preValidation( $value, '/^\d{10}$/' ) ) {
			return false;
		}

		$sum      = $this->calculateSum( $value, [6, 5, 7, 2, 3, 4, 5, 6, 7] );
		$checksum = intval( $value[9] );

		return $sum % 11 === $checksum;
	}



}