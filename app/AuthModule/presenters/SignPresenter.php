<?php

namespace App\AuthModule;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends \SignPresenter {

	public function getRedirectString() {
		return (':Front:Status:default');
	}
}
