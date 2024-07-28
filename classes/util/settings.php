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
 * Theme helper to load a theme configuration.
 *
 * @package    theme_nebula
 * @copyright  2022 Erudisiya PVT LTD - https://erudisiya.com/
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_nebula\util;

use theme_config;

/**
 * Helper to load a theme configuration.
 *
 * @package    theme_nebula
 * @copyright  2022 Erudisiya PVT LTD - https://erudisiya.com/
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class settings {
    /**
     * @var \stdClass $theme The theme object.
     */
    protected $theme;
    /**
     * @var array $files Theme file settings.
     */
    protected $files = [
        'loginbg',
        'sliderimage1', 'sliderimage2', 'sliderimage3', 'sliderimage4',
        'sliderimage5', 'sliderimage6', 'sliderimage7', 'sliderimage8', 'sliderimage9',
        'marketing1icon', 'marketing2icon', 'marketing3icon', 'marketing4icon'
    ];

    /**
     * Class constructor
     */
    public function __construct() {
        $this->theme = theme_config::load('nebula');
    }

    /**
     * Magic method to get theme settings
     *
     * @param string $name
     *
     * @return false|string|null
     */
    public function __get(string $name) {
        if (in_array($name, $this->files)) {
            return $this->theme->setting_file_url($name, $name);
        }

        if (empty($this->theme->settings->$name)) {
            return false;
        }

        return $this->theme->settings->$name;
    }

    /**
     * Get footer settings
     *
     * @return array
     */
    public function footer() {
        global $CFG;

        $templatecontext = [];

        $settings = [
            'facebook', 'twitter', 'linkedin', 'youtube', 'instagram', 'whatsapp', 'telegram',
            'website', 'mobile', 'mail', 'copyright', 'poweredby'
        ];

        foreach ($settings as $setting) {
            $templatecontext[$setting] = $this->$setting;
        }

        $templatecontext['enablemobilewebservice'] = $CFG->enablemobilewebservice;

        if ($CFG->enablemobilewebservice) {
            $iosappid = get_config('tool_mobile', 'iosappid');
            if (!empty($iosappid)) {
                $templatecontext['iosappid'] = $iosappid;
            }

            $androidappid = get_config('tool_mobile', 'androidappid');
            if (!empty($androidappid)) {
                $templatecontext['androidappid'] = $androidappid;
            }

            $setuplink = get_config('tool_mobile', 'setuplink');
            if (!empty($setuplink)) {
                $templatecontext['mobilesetuplink'] = $setuplink;
            }
        }

        return $templatecontext;
    }

    /**
     * Get frontpage settings
     *
     * @return array
     */
    public function frontpage() {
        return array_merge($this->frontpage_slideshow(),
            $this->frontpage_marketingboxes(),
            $this->frontpage_numbers(),
            $this->upcoming_events(),
            $this->faq()
        );
    }

    /**
     * Get config theme slideshow
     *
     * @return array
     */
    public function frontpage_slideshow() {
        $templatecontext['slidercount'] = $this->slidercount;

        $defaultimage = new \moodle_url('/theme/nebula/pix/default_slide.jpeg');
        for ($i = 1, $j = 0; $i <= $templatecontext['slidercount']; $i++, $j++) {
            $sliderimage = "sliderimage{$i}";
            $slidertext = "slideheading{$i}";
            $templatecontext['slides'][$j]['key'] = $j;
            $templatecontext['slides'][$j]['active'] = $i === 1;
            $templatecontext['slides'][$j]['image'] = $this->$sliderimage ?: $defaultimage->out();
            $options = new \stdClass();
            $options->context = \context_system::instance();
            
            $templatecontext['slides'][$j]['text'] = format_string($this->$slidertext, FORMAT_MOODLE);
        }

        return $templatecontext;
    }

    /**
     * Get config theme slideshow
     *
     * @return array
     */
    public function frontpage_marketingboxes() {
        if ($templatecontext['displaymarketingbox'] = $this->displaymarketingbox) {
            $templatecontext['marketingheading'] = format_string($this->marketingheading);
            $templatecontext['marketingcontent'] = format_string($this->marketingcontent);

            $defaultimage = new \moodle_url('/theme/nebula/pix/default_markegingicon.svg');

            for ($i = 1, $j = 0; $i < 5; $i++, $j++) {
                $marketingicon = 'marketing' . $i . 'icon';
                $marketingheading = 'marketing' . $i . 'heading';
                $marketingcontent = 'marketing' . $i . 'content';

                $templatecontext['marketingboxes'][$j]['icon'] = $this->$marketingicon ?: $defaultimage->out();
                $templatecontext['marketingboxes'][$j]['heading'] = format_string($this->$marketingheading) ?: 'Lorem';
                $templatecontext['marketingboxes'][$j]['content'] = format_string($this->$marketingcontent) ?:
                    'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.';
            }
        }

        return $templatecontext;
    }

    /**
     * Get config theme slideshow
     *
     * @return array
     */
    public function frontpage_numbers() {
        global $DB;

        if ($templatecontext['numbersfrontpage'] = $this->numbersfrontpage) {
            $templatecontext['numberscontent'] = $this->numbersfrontpagecontent ? format_text($this->numbersfrontpagecontent) : '';
            $templatecontext['numbersusers'] = $DB->count_records('user', ['deleted' => 0, 'suspended' => 0]) - 1;
            $templatecontext['numberscourses'] = $DB->count_records('course', ['visible' => 1]) - 1;
        }

        return $templatecontext;
    }

    /**
     * Get config theme slideshow
     *
     * @return array
     */
    public function faq() {
        $templatecontext['faqenabled'] = false;

        if ($this->faqcount) {
            for ($i = 1; $i <= $this->faqcount; $i++) {

                $faqquestion = 'faqquestion' . $i;
                $faqanswer = 'faqanswer' . $i;

                if (!$this->$faqquestion || !$this->$faqanswer) {
                    continue;
                }
                if ($i == 1){
                    $templatecontext['faq'][] = [
                        'id' => $i,
                        'question' => format_string($this->$faqquestion),
                        'answer' => format_string($this->$faqanswer),
                        'buttoncollapsed' => "",
                        'areaclass' => "show"
                    ];
                } else {
                    $templatecontext['faq'][] = [
                        'id' => $i,
                        'question' => format_string($this->$faqquestion),
                        'answer' => format_string($this->$faqanswer),
                        'buttoncollapsed' => "collapsed",
                        'areaclass' => ""
                    ];
                }
                
            }
            if (isset($templatecontext['faq'])){
                if (count($templatecontext['faq'])) {
                    $templatecontext['faqenabled'] = true;
                }
            }
            
        }

        return $templatecontext;
    }
    public function upcoming_events() {
        GLOBAL $CFG, $PAGE;

        require_once($CFG->dirroot.'/calendar/lib.php');
        $courseid = $PAGE->course->id;
        $categoryid = ($PAGE->context->contextlevel === CONTEXT_COURSECAT) ? $PAGE->category->id : null;
        $calendar = \calendar_information::create(time(), $courseid, $categoryid);
        list($data, $template) = calendar_get_view($calendar, 'upcoming_mini');
        //print_r($data->events);die;
        if (isset($data->events) && !empty($data->events)){
            $eventcount = 1;
            foreach ($data->events as $key => $event) {
                //print_r($event); die;
                if ($eventcount == 1) {
                    $templatecontext["feventid"] = $event->id;
                    $templatecontext["feventname"] = format_string($event->name);
                    $templatecontext["feventdescription"] = format_string(strip_tags($event->description));
                    $templatecontext["feventtimestart"] = date("d M, Y", $event->timestart);
                    $templatecontext["feventviewurl"] = $event->viewurl;
                    $templatecontext["feventlocation"] = format_string($event->location);
                } else {
                    $templatecontext['eventbox'][] = [
                        'eventid' => $event->id,
                        'eventname' => format_string($event->name),
                        'eventdescription' => format_string($event->description),
                        'eventtimestarttime' => date("H:i a", $event->timestart),
                        'eventtimestartmonth' => date("M", $event->timestart),
                        'eventtimestartdate' => date("d", $event->timestart),
                        'eventviewurl' => $event->viewurl,
                        'eventlocation' => format_string($event->location)
                    ];
                    
                    $templatecontext['eventsrepeatenabled'] = true;
                }
                $eventcount++;
            }
            $templatecontext['eventsenabled'] = true;
        } else {
            $templatecontext['eventsenabled'] = false;
        }
        //print_r($templatecontext["eventbox"]); die;
        return $templatecontext;
    }
}

