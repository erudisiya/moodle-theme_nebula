<?php
/**Copyright (C) 2020 onwards Erudisiya PVT LTD
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * nebula left side panel controller
 *
 * @package   theme_nebula
 * @copyright 2022 Erudisiya PVT LTD
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */
require_once(__DIR__.'/../../config.php');
//print_r($_POST);
set_config("nebula_leftpane", $_POST["open"], 'theme_nebula');