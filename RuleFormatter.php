<?php

namespace Klik\Validators;

class RuleFormatter {
	public static function name( $parameters, $attribute ) {
		return isset( $parameters[0] ) ? $parameters[0] : $attribute;
	}
}