<?php

namespace Klik\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		Validator::extend( 'nip', function ( $attribute, $value, $parameters ) {
			return NipValidator::valid( $attribute, $value, $parameters );
		});
		Validator::extend( 'regon', function ( $attribute, $value, $parameters ) {
			return RegonValidator::valid( $attribute, $value, $parameters );
		});
	}
}
