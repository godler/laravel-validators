<?php

namespace Godler\Validators;

class BaseValidator{

    public function calculateSum( $value, $weights, $start = 0 ) {
		$values = is_string( $value ) ? str_split( $value ) : $value;

		return collect( $values )
			->pipe( function ( $collection ) use ( $start ) {
				return $collection->splice( $start );
			} )
			->transform( function ( $value, $key ) use ( $weights ) {
				return isset( $weights[$key] ) ? $value * $weights[$key] : 0;
			} )
			->sum();
	}

	public function preValidation( $value, $pattern, $check_zero = true ) {
		if ( ! preg_match( $pattern, $value ) ) {
			return false;
		}

		$values = str_split( $value );

		if ( $check_zero && array_sum( $values ) === 0 ) {
			return false;
		}

		return true;
    }
    
}