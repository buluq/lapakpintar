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

class Seo extends Core {
	public function setAnalytics($id, $vendor) {
		switch ($vendor) {
			case 'google':
				$code = '<script>'
					. '(function(p,i,n,t,a,r){p.GoogleAnalyticsObject=t;'
					. 'p[t]||(p[t]=function(){(p[t].q=p[t].q||[].push(arguments)});'
					. 'p[t].t=+new Date;'
					. 'a=i.createElement(n);'
					. 'r=i.getElementsByTagName(n)[0];'
					. "a.src='https://www.google-analytics.com/analytics.js';"
					. "r.parentNode.insertBefore(a,r)}(window,document,'script','ga'));"
					. "ga('create', '$id', 'auto');"
					. "ga('send','pageview');"
					. '</script>';
				break;
			default:
				$code = '<script>'
					. '(function(p,i,n,t,a,r){p.GoogleAnalyticsObject=t;'
					. 'p[t]||(p[t]=function(){(p[t].q=p[t].q||[].push(arguments)});'
					. 'p[t].t=+new Date;'
					. 'a=i.createElement(n);'
					. 'r=i.getElementsByTagName(n)[0];'
					. "a.src='https://www.google-analytics.com/analytics.js';"
					. "r.parentNode.insertBefore(a,r)}(window,document,'script','ga'));"
					. "ga('create', '$id', 'auto');"
					. "ga('send','pageview');"
					. '</script>';
				break;
		}

		Base::instance()->set('ANALYTICS.CODE', $code);
	}

	public function setCopyright($year = 'auto') {
		if (intval($year) == 'auto') {
			$year = date('Y');
		}

		if (intval($year) == date('Y')) {
			$copyright = intval($year);
		}
		elseif (intval($year) < date('Y')) {
			$copyright = intval($year) . ' - ' . date('Y');
		}
		else {
			$copyright = date('Y');
		}

		$this->framework->set('SITE.COPYRIGHT', $copyright);
	}

	public function setMetadata($page_title = '', $page_description = '') {
		if ($page_title == '') {
			$page_title = $this->framework->get('SITE.NAME');
		}
		else {
			$page_title .= ' | ' . $this->framework->get('SITE.NAME');
		}

		if ($page_description == '') {
			$page_description = $this->framework->get('SITE.DESCRIPTION');
		}

		$this->framework->mset(
			array(
				'metadata.page.title'       => $page_title,
				'metadata.page.description' => $page_description
			)
		);
	}
}

/* Akhir dari berkas seo.php */