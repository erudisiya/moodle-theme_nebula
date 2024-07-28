<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * A maintenance layout for the boost theme.
 *
 * @package   theme_nebula
 * @copyright 2022 Erudisiya PVT LTD - https://erudisiya.com/
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
$isfont = get_config('theme_nebula', 'fontsite');
$sitefont = isset($isfont) ? $isfont : 'Roboto';
$bodyattributes = $OUTPUT->body_attributes(['nebula-maintenance']);
$font = '<link rel="preconnect" href="https://fonts.googleapis.com">
               <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
               <link href="https://fonts.googleapis.com/css2?family='
                . $sitefont .
               ':ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">';

$templatecontext = [
    // We cannot pass the context to format_string, this layout can be used during
    // installation. At that stage database tables do not exist yet.
    'sitename' => format_string($SITE->shortname, true, ["escape" => false]),
    'output' => $OUTPUT,
    'font' => $font
];

echo $OUTPUT->render_from_template('theme_nebula/maintenance', $templatecontext);
