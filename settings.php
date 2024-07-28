<?php
// This file is part of Ranking block for Moodle - http://moodle.org/
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
 * Theme nebula block settings file
 *
 * @package    theme_nebula
 * @copyright  2022 Erudisiya PVT LTD - https://erudisiya.com/
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// This is used for performance, we don't need to know about these settings on every page in Moodle, only when
// we are looking at the admin settings pages.
if ($ADMIN->fulltree) {

    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingnebula', get_string('configtitle', 'theme_nebula'));

    /*
    * ----------------------
    * General settings tab
    * ----------------------
    */
    $page = new admin_settingpage('theme_nebula_general', get_string('generalsettings', 'theme_nebula'));

    // Logo file setting.
    $name = 'theme_nebula/logo';
    $title = get_string('logo', 'theme_nebula');
    $description = get_string('logodesc', 'theme_nebula');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo', 0, $opts);
    $page->add($setting);

    // Favicon setting.
    $name = 'theme_nebula/favicon';
    $title = get_string('favicon', 'theme_nebula');
    $description = get_string('favicondesc', 'theme_nebula');
    $opts = array('accepted_types' => array('.png'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, $opts);
    $page->add($setting);

    // Variable $brand-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_nebula/brandcolor';
    $title = get_string('brandcolor', 'theme_nebula');
    $description = get_string('brandcolor_desc', 'theme_nebula');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#580848');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $navbar-header-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_nebula/secondarymenucolor';
    $title = get_string('secondarymenucolor', 'theme_nebula');
    $description = get_string('secondarymenucolor_desc', 'theme_nebula');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#580848');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $fontsarr = [
        'Roboto' => 'Roboto',
        'Poppins' => 'Poppins',
        'Montserrat' => 'Montserrat',
        'Open Sans' => 'Open Sans',
        'Lato' => 'Lato',
        'Raleway' => 'Raleway',
        'Inter' => 'Inter',
        'Nunito' => 'Nunito',
        'Encode Sans' => 'Encode Sans',
        'Work Sans' => 'Work Sans',
        'Oxygen' => 'Oxygen',
        'Manrope' => 'Manrope',
        'Sora' => 'Sora',
        'Epilogue' => 'Epilogue'
    ];

    $name = 'theme_nebula/fontsite';
    $title = get_string('fontsite', 'theme_nebula');
    $description = get_string('fontsite_desc', 'theme_nebula');
    $setting = new admin_setting_configselect($name, $title, $description, 'Roboto', $fontsarr);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_nebula/enablecourseindex';
    $title = get_string('enablecourseindex', 'theme_nebula');
    $description = get_string('enablecourseindex_desc', 'theme_nebula');
    $default = 1;
    $choices = array(0 => get_string('no'), 1 => get_string('yes'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $page->add($setting);

    $name = 'theme_nebula/enablemoodewalletnav';
    $title = get_string('enablemoodewalletnav', 'theme_nebula');
    $description = get_string('enablemoodewalletnav_desc', 'theme_nebula');
    $default = 0;
    $choices = array(0 => get_string('no'), 1 => get_string('yes'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $page->add($setting);
    // Preset.
    $name = 'theme_nebula/preset';
    $title = get_string('preset', 'theme_nebula');
    $description = get_string('preset_desc', 'theme_nebula');
    $default = 'default.scss';

    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_nebula', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets.
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset files setting.
    $name = 'theme_nebula/presetfiles';
    $title = get_string('presetfiles', 'theme_nebula');
    $description = get_string('presetfiles_desc', 'theme_nebula');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 10, 'accepted_types' => array('.scss')));
    $page->add($setting);
    // Must add the page after definiting all the settings!
    $settings->add($page);
    /*
    * ----------------------
    * Login settings tab
    * ----------------------
    */
    $page = new admin_settingpage('theme_nebula_login', get_string('loginsettings', 'theme_nebula'));
    //login position setup
    $name = 'theme_nebula/loginalignment';
    $title = get_string('loginalignment', 'theme_nebula');
    $description = get_string('loginalignmentdesc', 'theme_nebula');
    $options = [];
    $options[1] = get_string('loginalignment-left', 'theme_nebula');
    /*$options[2] = get_string('loginalignment-center', 'theme_nebula');*/
    $options[3] = get_string('loginalignment-right', 'theme_nebula');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Login page background image.
    $name = 'theme_nebula/loginbgimg';
    $title = get_string('loginbgimg', 'theme_nebula');
    $description = get_string('loginbgimg_desc', 'theme_nebula');
    $opts = array('accepted_types' => array('.png', '.jpg', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbgimg', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    //login page text
    $name = 'theme_nebula/logintext';
    $title = get_string('logintext', 'theme_nebula');
    $description = "";
    $setting = new admin_setting_confightmleditor($name, $title, $description, '
        <h3>Welcome to Nebula Account</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    $settings->add($page);
    /*
    * ----------------------
    * Advanced settings tab
    * ----------------------
    */
    $page = new admin_settingpage('theme_nebula_advanced', get_string('advancedsettings', 'theme_nebula'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_nebula/scsspre',
        get_string('rawscsspre', 'theme_nebula'), get_string('rawscsspre_desc', 'theme_nebula'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_nebula/scss', get_string('rawscss', 'theme_nebula'),
        get_string('rawscss_desc', 'theme_nebula'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Google analytics block.
    $name = 'theme_nebula/googleanalytics';
    $title = get_string('googleanalytics', 'theme_nebula');
    $description = get_string('googleanalyticsdesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    /*
    * -----------------------
    * Frontpage settings tab
    * -----------------------
    */
    $page = new admin_settingpage('theme_nebula_frontpage', get_string('frontpagesettings', 'theme_nebula'));

    // Disable teachers from cards.
    $name = 'theme_nebula/disableteacherspic';
    $title = get_string('disableteacherspic', 'theme_nebula');
    $description = get_string('disableteacherspicdesc', 'theme_nebula');
    $default = 1;
    $choices = array(0 => get_string('no'), 1 => get_string('yes'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $page->add($setting);

    // Slideshow.
    $name = 'theme_nebula/slidercount';
    $title = get_string('slidercount', 'theme_nebula');
    $description = get_string('slidercountdesc', 'theme_nebula');
    $default = 1;
    $options = array();
    for ($i = 1; $i < 10; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // If we don't have an slide yet, default to the preset.
    $slidercount = get_config('theme_nebula', 'slidercount');

    if (!$slidercount) {
        $slidercount = 1;
    }

    for ($sliderindex = 1; $sliderindex <= $slidercount; $sliderindex++) {
        $fileid = 'sliderimage' . $sliderindex;
        $name = 'theme_nebula/sliderimage' . $sliderindex;
        $title = get_string('sliderimage', 'theme_nebula');
        $description = get_string('sliderimagedesc', 'theme_nebula');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, $fileid, 0, $opts);
        $page->add($setting);

        $name = "theme_nebula/slideheading" . $sliderindex;
        $title = get_string('slideheading', 'theme_nebula', $i . '');
        $default = '<h2>Moodle with Nebula <br> Just Fabulous!</h2>

        <p>The Nebula is dedicated only for Moodle 4.0 and later.</p>
        <p class="mt-3 small">Need help with theme customization?<br>Or you want to report a bug?</p>

        <div class="slide-btns">
            <a href="#" target="_blank" class="btn btn-lg btn-light">Get Nebula!</a>
            <a href="https://erudisiya.com/" target="_blank" class="btn btn-lg btn-dark">Contact Us</a>
        </div>';
        $setting = new admin_setting_confightmleditor($name, $title, '', $default);
        $page->add($setting);


    }

    $setting = new admin_setting_heading('slidercountseparator', '', '<hr>');
    $page->add($setting);

    $name = 'theme_nebula/displaymarketingbox';
    $title = get_string('displaymarketingboxes', 'theme_nebula');
    $description = get_string('displaymarketingboxesdesc', 'theme_nebula');
    $default = 1;
    $choices = array(0 => get_string('no'), 1 => get_string('yes'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $page->add($setting);

    $displaymarketingbox = get_config('theme_nebula', 'displaymarketingbox');

    if ($displaymarketingbox) {
        // Marketingheading.
        $name = 'theme_nebula/marketingheading';
        $title = get_string('marketingsectionheading', 'theme_nebula');
        $default = 'Trusted by 100+ customers';
        $setting = new admin_setting_configtext($name, $title, '', $default);
        $page->add($setting);

        // Marketingcontent.
        $name = 'theme_nebula/marketingcontent';
        $title = get_string('marketingsectioncontent', 'theme_nebula');
        $default = 'Read true reviews how New Learning help people build their Moodle sites.';
        $setting = new admin_setting_confightmleditor($name, $title, '', $default);
        $page->add($setting);

        for ($i = 1; $i < 5; $i++) {
            $filearea = "marketing{$i}icon";
            $name = "theme_nebula/$filearea";
            $title = get_string('marketingicon', 'theme_nebula', $i . '');
            $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
            $setting = new admin_setting_configstoredfile($name, $title, '', $filearea, 0, $opts);
            $page->add($setting);

            $name = "theme_nebula/marketing{$i}heading";
            $title = get_string('marketingheading', 'theme_nebula', $i . '');
            $default = 'Lorem';
            $setting = new admin_setting_configtext($name, $title, '', $default);
            $page->add($setting);

            $name = "theme_nebula/marketing{$i}content";
            $title = get_string('marketingcontent', 'theme_nebula', $i . '');
            $default = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.';
            $setting = new admin_setting_confightmleditor($name, $title, '', $default);
            $page->add($setting);
        }

        $setting = new admin_setting_heading('displaymarketingboxseparator', '', '<hr>');
        $page->add($setting);
    }

    // Enable or disable Numbers sections settings.
    $name = 'theme_nebula/numbersfrontpage';
    $title = get_string('numbersfrontpage', 'theme_nebula');
    $description = get_string('numbersfrontpagedesc', 'theme_nebula');
    $default = 1;
    $choices = array(0 => get_string('no'), 1 => get_string('yes'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $page->add($setting);

    $numbersfrontpage = get_config('theme_nebula', 'numbersfrontpage');

    if ($numbersfrontpage) {
        $name = 'theme_nebula/numbersfrontpagecontent';
        $title = get_string('numbersfrontpagecontent', 'theme_nebula');
        $description = get_string('numbersfrontpagecontentdesc', 'theme_nebula');
        $default = get_string('numbersfrontpagecontentdefault', 'theme_nebula');
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
        $page->add($setting);
    }

    // Enable FAQ.
    $name = 'theme_nebula/faqcount';
    $title = get_string('faqcount', 'theme_nebula');
    $description = get_string('faqcountdesc', 'theme_nebula');
    $default = 0;
    $options = array();
    for ($i = 0; $i < 11; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);

    $faqcount = get_config('theme_nebula', 'faqcount');

    if ($faqcount > 0) {
        for ($i = 1; $i <= $faqcount; $i++) {
            $name = "theme_nebula/faqquestion{$i}";
            $title = get_string('faqquestion', 'theme_nebula', $i . '');
            $setting = new admin_setting_configtext($name, $title, '', '');
            $page->add($setting);

            $name = "theme_nebula/faqanswer{$i}";
            $title = get_string('faqanswer', 'theme_nebula', $i . '');
            $setting = new admin_setting_confightmleditor($name, $title, '', '');
            $page->add($setting);
        }

        $setting = new admin_setting_heading('faqseparator', '', '<hr>');
        $page->add($setting);
    }

    $settings->add($page);

    /*
    * --------------------
    * Footer settings tab
    * --------------------
    */
    $page = new admin_settingpage('theme_nebula_footer', get_string('footersettings', 'theme_nebula'));

    // Website.
    $name = 'theme_nebula/website';
    $title = get_string('website', 'theme_nebula');
    $description = get_string('websitedesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // Mobile.
    $name = 'theme_nebula/mobile';
    $title = get_string('mobile', 'theme_nebula');
    $description = get_string('mobiledesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // Mail.
    $name = 'theme_nebula/mail';
    $title = get_string('mail', 'theme_nebula');
    $description = get_string('maildesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // Facebook url setting.
    $name = 'theme_nebula/facebook';
    $title = get_string('facebook', 'theme_nebula');
    $description = get_string('facebookdesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // Twitter url setting.
    $name = 'theme_nebula/twitter';
    $title = get_string('twitter', 'theme_nebula');
    $description = get_string('twitterdesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // Linkdin url setting.
    $name = 'theme_nebula/linkedin';
    $title = get_string('linkedin', 'theme_nebula');
    $description = get_string('linkedindesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // Youtube url setting.
    $name = 'theme_nebula/youtube';
    $title = get_string('youtube', 'theme_nebula');
    $description = get_string('youtubedesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // Instagram url setting.
    $name = 'theme_nebula/instagram';
    $title = get_string('instagram', 'theme_nebula');
    $description = get_string('instagramdesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // Whatsapp url setting.
    $name = 'theme_nebula/whatsapp';
    $title = get_string('whatsapp', 'theme_nebula');
    $description = get_string('whatsappdesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // Telegram url setting.
    $name = 'theme_nebula/telegram';
    $title = get_string('telegram', 'theme_nebula');
    $description = get_string('telegramdesc', 'theme_nebula');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);
    //Copyright
    $name = 'theme_nebula/copyright';
    $title = get_string('copyright', 'theme_nebula');
    $description = '';
    $setting = new admin_setting_configtext($name, $title, $description, get_string('themecopyright', 'theme_nebula'));
    $page->add($setting);
    //powered by
    $name = 'theme_nebula/poweredby';
    $title = get_string('poweredby', 'theme_nebula');
    $description = '';
    $setting = new admin_setting_configtext($name, $title, $description, get_string('themedevelopedby', 'theme_nebula'));
    $page->add($setting);
    $settings->add($page);
}
