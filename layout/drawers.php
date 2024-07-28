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
 * A drawer based layout for the nebula theme.
 *
 * @package    theme_nebula
 * @copyright  2022 Erudisiya PVT LTD - https://erudisiya.com/
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG, $PAGE, $COURSE;
require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');
global $PAGE, $USER;
// Validation for context is needed.
$context = context_system::instance();

$coursepercentage = new core_completion\progress();

$stats = array();

$courses = enrol_get_users_courses($USER->id);

$coursescount = '0';
$coursescompleted = '0';
$activitiescomplete = '0';
$activitiesdue = '0';
foreach ($courses as $key => $course) {
    $coursescount++;
    $completion = new completion_info($course);
    $progresspercentvalue = $coursepercentage->get_course_progress_percentage($course, $USER->id);
    if ($completion->is_enabled()) {
        $modules = $completion->get_activities();
        $activitiesprogress = 0;
        foreach ($modules as $module) {
            $moduledata = $completion->get_data($module, false, $USER->id);
            if ($moduledata->completionstate == COMPLETION_INCOMPLETE) {
                $activitiesdue++;
            } else {
                $activitiescomplete++;
            }
        }
        if ($progresspercentvalue == "100") {
            $coursescompleted++;
        }

    }
}


/*leftmenu activation patch*/
$dashboardactive = $mycourseactive = $mywalletactive = $shopactive = $cartactive = $calendaractive = ""; 
$dashboardstatsactive = "";
if ($this->page->pagelayout === "mydashboard") {
    $dashboardactive = "active";
    $dashboardstatsactive = "active";
    $mycourseactive = $mywalletactive = $shopactive = $cartactive = $calendaractive = ""; 
} else if ($this->page->pagelayout === "mycourses") {
    $mycourseactive = "active";
    $dashboardstatsactive = "";
    $dashboardactive = $mywalletactive = $shopactive = $cartactive = $calendaractive = ""; 
} else if ($this->page->bodyid === "page-mywallet"){
    $mywalletactive = "active";
    $dashboardstatsactive = "";
    $dashboardactive = $mycourseactive = $shopactive = $cartactive = $calendaractive = "";
} else if ($this->page->bodyid === "page-local-nebula-shop-index") {
    $shopactive = "active";
    $dashboardstatsactive = "";
    $dashboardactive = $mycourseactive = $mywalletactive = $cartactive = $calendaractive = "";
} else if ($this->page->bodyid === "page-local-nebula-shop-cart") {
    $cartactive = "active";
    $dashboardstatsactive = "";
    $dashboardactive = $mycourseactive = $mywalletactive = $shopactive = $calendaractive = "";
} else if ($this->page->bodyid === "page-calendar-view") {
    $calendaractive = "active";
    $dashboardstatsactive = "";
    $dashboardactive = $mycourseactive = $mywalletactive = $shopactive = $cartactive = "";
}

// Add block button in editing mode.
$addblockbutton = $OUTPUT->addblockbutton();


if (isloggedin()) {
    $courseindexopen = (get_user_preferences('drawer-open-index', true) == true);
    $blockdraweropen = (get_user_preferences('drawer-open-block') == true);
} else {
    $courseindexopen = false;
    $blockdraweropen = false;
}

if (defined('BEHAT_SITE_RUNNING')) {
    $blockdraweropen = true;
}

$extraclasses = ['uses-drawers'];
if ($courseindexopen) {
    $extraclasses[] = 'drawer-open-index';
}

$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));
if (!$hasblocks) {
    $blockdraweropen = false;
}

$themesettings = new \theme_nebula\util\settings();

if (!$themesettings->enablecourseindex) {
    $courseindex = '';
} else {
    $courseindex = core_course_drawer();
}

if (!$courseindex) {
    $courseindexopen = false;
}

$forceblockdraweropen = $OUTPUT->firstview_fakeblocks();

$secondarynavigation = false;
$overflow = '';
if ($PAGE->has_secondary_navigation()) {
    $secondary = $PAGE->secondarynav;

    if ($secondary->get_children_key_list()) {
        $tablistnav = $PAGE->has_tablist_secondary_navigation();
        $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
        $secondarynavigation = $moremenu->export_for_template($OUTPUT);
        $extraclasses[] = 'has-secondarynavigation';
    }

    $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
    if (!is_null($overflowdata)) {
        $overflow = $overflowdata->export_for_template($OUTPUT);
    }
}

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions() && !$PAGE->has_secondary_navigation();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);
if (!get_config('theme_nebula', 'nebula_leftpane')) {//echo "close";die;
    $openmainclass = "big";
    $closeleftclass = "hiden";
    $btnleftclass = "open";
} else {//echo "open";die;
    $openmainclass = "";
    $closeleftclass = "";
    $btnleftclass = "";
}
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$mw = get_config('theme_nebula', 'enablemoodewalletnav');
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'courseindexopen' => $courseindexopen,
    'blockdraweropen' => $blockdraweropen,
    'courseindex' => $courseindex,
    'primarymoremenu' => $primarymenu['moremenu'],
    'secondarymoremenu' => $secondarynavigation ?: false,
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'forceblockdraweropen' => $forceblockdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'overflow' => $overflow,
    'headercontent' => $headercontent,
    'addblockbutton' => $addblockbutton,
    'enablecourseindex' => $themesettings->enablecourseindex,
    'dashboardlink' => $CFG->wwwroot."/my", 
    'dashboardtext' => get_string("myhome"), 
    'mycourselink' => $CFG->wwwroot."/my/courses.php",
    'mycoursetext' => get_string("mycourses"),
    'mw' => $mw ?: false,
    'mywalletlink' => $CFG->wwwroot."/mywallet",
    'mywallettext' => get_string("mywallet", 'theme_nebula'),
    'myshoplink' => $CFG->wwwroot."/shop",
    'myshoptext' => get_string("shop", 'theme_nebula'),
    'mycartlink' => $CFG->wwwroot."/cart",
    'mycarttext' => get_string("cart", 'theme_nebula'),
    'mycalenderlink' => $CFG->wwwroot."/calendar/view.php?view=month",
    'mycaltext' => get_string("calendar", 'calendar'),
    'wwwroot' => $CFG->wwwroot,
    'openmainclass' => $openmainclass,
    'closeleftclass' => $closeleftclass,
    'btnleftclass' => $btnleftclass,
    'dashboardactive' => $dashboardactive,
    'mycourseactive' => $mycourseactive,
    'mywalletactive' => $mywalletactive, 
    'shopactive' => $shopactive,
    'cartactive' => $cartactive,
    'calendaractive' => $calendaractive,
    'isdashboardstatsshow' => $dashboardstatsactive,
    'coursesenrolled' => $coursescount,
    'coursescompleted' => $coursescompleted,
    'activitiescompleted' => $activitiescomplete,
    'activitiesdue' => $activitiesdue
];
$templatecontext = array_merge($templatecontext, $themesettings->footer());

echo $OUTPUT->render_from_template('theme_nebula/drawers', $templatecontext);
echo '<script src="'.$CFG->wwwroot.'/theme/nebula/javascript/util.js"></script>';
echo '<script src="'.$CFG->wwwroot.'/theme/nebula/javascript/main.js"></script>';