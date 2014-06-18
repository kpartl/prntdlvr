<?php

namespace App\AdminModule;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends \SignPresenter {

	public function getRedirectString() {
		return (':Admin:AdminPage:default');
	}
}
