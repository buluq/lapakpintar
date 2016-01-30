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

class Router extends Core {
	private $seo;
	private $user;

	public function __construct() {
		parent::__construct();
		$this->seo  = $this->getDependency('Seo');
		$this->user = $this->getDependency('User');
	}

	public function afterRoute() {
		$id     = $this->framework->get('ANALYTICS.ID');
		$vendor = $this->framework->get('ANALYTICS.VENDOR');

		if (null == $this->framework->get('page')) {
			$this->framework->set('page', '');
		}

		$this->seo->setCopyright();

		if ($id != '') {
			$this->seo->setAnalytics($id, $vendor);
		}

		echo Template::instance()->render('base.html');
	}

	public function beforeRoute() {
		$this->setLayout('2column');
	}

	public function homeRoute() {
		$this->seo->setMetadata();
	}

	public function loginRoute() {
		$this->setLayout('1column');

		$request = $this->framework->get('VERB');

		switch ($request) {
			case 'GET':
				$this->seo->setMetadata();
				//$this->user->login();
				$this->framework->set('page', 'login.html');
			break;

			case 'POST':
				$this->user->authenticate();
			break;
		}
	}

	public function logoutRoute() {
		$this->user->logout();
	}
}

/* Akhir dari berkas router.php */