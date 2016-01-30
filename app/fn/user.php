<?php
/**
 * This file is part of LapakPintar.
 *
 * LapakPintar is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License,
 * or (at your option) any later version.
 *
 * LapakPintar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with LapakPintar.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    LapakPintar
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @since      0.0.1
 */

class User extends Core {
	public function __construct() {
		parent::__construct();
		new \DB\SQL\Session($this->database);
	}

	public function authenticate() {
		$password = $this->framework->get('DEVELOPER.PASSWORD');
		$salt     = $this->framework->get('DEVELOPER.SALT');
		$username = $this->framework->get('DEVELOPER.USERNAME');
		$formpass = $this->framework->get('POST.password');
		$formuser = $this->framework->get('POST.username');

		if ($formuser !=  $username || crypt($formpass, $salt) != $password) {
			$this->framework->set('login_error', 'activated');
			$this->framework->reroute("/login?login_error=activated");
		}
		else {
			$this->framework->set('SESSION.username', $formuser);
			$this->framework->set('SESSION.last_login', time());
			$this->framework->set('SESSION.user', 'active');
			$this->framework->reroute('/');
		}
	}

	public function login() {
		$this->framework->clear('SESSION');
	}

	public function logout() {
		$this->framework->clear('SESSION');
		$this->framework->reroute('/login');
	}
}

/* End of file: user.php */