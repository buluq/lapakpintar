<?php
/**
 * Berkas indeks situs web
 *
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

$framework = require(__dir__ . '/../app/lib/base.php');
$framework->config(__dir__ . '/../app/conf/system.ini');
$framework->run();

/* Akhir dari berkas index.php */