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
 * Language file.
 *
 * @package   theme_nebula
 * @copyright 2022 Erudisiya PVT LTD - https://erudisiya.com/
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Nebula';
$string['configtitle'] = 'Nebula';
$string['choosereadme'] = 'السديم هو موضوع حديث قابل للتخصيص بدرجة كبيرة. الغرض من هذا المظهر هو استخدامه مباشرة ، أو كقالب رئيسي عند إنشاء سمات جديدة باستخدام Bootstrap 4.
	<div>شكرا لاختيارك لنا.</div>';

$string['currentinparentheses'] = '(current)';
$string['region-side-pre'] = 'يمين';
$string['prev_section'] = 'القسم السابق';
$string['next_section'] = 'القسم التالي';
$string['themedevelopedby'] = 'تم تطوير هذا الموضوع من قبل';
$string['access'] = 'وصول';
$string['prev_activity'] = 'النشاط السابق';
$string['next_activity'] = 'النشاط التالي';
$string['donthaveanaccount'] = 'ليس لديك حساب؟';
$string['signinwith'] = 'تسجيل الدخول ب';
//Login settings tab
$string['loginsettings'] = 'تسجيل الدخول';
// General settings tab.
$string['generalsettings'] = 'عام';
$string['logo'] = 'شعار';
$string['logodesc'] = 'يتم عرض الشعار في الرأس. نسبة العرض إلى الارتفاع للصورة المفضلة 5: 1';
$string['favicon'] = 'رمز مفضل مخصص';
$string['favicondesc'] = 'قم بتحميل الأيقونة المفضلة الخاصة بك. يجب أن يكون ملف .png.';
$string['preset'] = 'الإعداد المسبق للموضوع';
$string['preset_desc'] = 'اختر إعدادًا مسبقًا لتغيير مظهر النسق على نطاق واسع.';
$string['presetfiles'] = 'ملفات موضوع إضافية محددة مسبقًا';
$string['presetfiles_desc'] = 'Preset files can be used to dramatically alter the appearance of the theme. See <a href="https://docs.moodle.org/dev/Boost_Presets">Boost presets</a> for information on creating and sharing your own preset files.';
$string['loginbgimg'] = 'خلفية صفحة تسجيل الدخول';
$string['loginbgimg_desc'] = 'قم بتحميل صورة الخلفية المخصصة لصفحة تسجيل الدخول.';
$string['brandcolor'] = 'لون العلامة التجارية';
$string['brandcolor_desc'] = 'لون التمييز.';
$string['secondarymenucolor'] = 'Secondary menu color';
$string['secondarymenucolor_desc'] = 'Secondary menu background color';
$string['navbarbg'] = 'Navbar color';
$string['navbarbg_desc'] = 'The left navbar color';
$string['navbarbghover'] = 'Navbar hover color';
$string['navbarbghover_desc'] = 'The left navbar hover color';
$string['fontsite'] = 'Site font';
$string['fontsite_desc'] = 'Default font site. You can try out the fonts on <a href="https://fonts.google.com">Google Fonts site</a>.';
$string['enablecourseindex'] = 'Enable course index';
$string['enablecourseindex_desc'] = 'You can show/hide course index navigation';

// Advanced settings tab.
$string['advancedsettings'] = 'Advanced';
$string['rawscsspre'] = 'Raw initial SCSS';
$string['rawscsspre_desc'] = 'In this field you can provide initialising SCSS code, it will be injected before everything else. Most of the time you will use this setting to define variables.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
$string['googleanalytics'] = 'Google Analytics V4 Code';
$string['googleanalyticsdesc'] = 'Please enter your Google Analytics V4 code to enable analytics on your website. The code format shold be like [G-XXXXXXXXXX]';

// Frontpage settings tab.
$string['frontpagesettings'] = 'Frontpage';
$string['displaymarketingboxes'] = 'Show front page marketing boxes';
$string['displaymarketingboxesdesc'] = 'If you want to see the boxes, select yes <strong>then click SAVE</strong> to load the input fields.';
$string['marketingsectionheading'] = 'Marketing section heading title';
$string['marketingsectioncontent'] = 'Marketing section content';
$string['marketingicon'] = 'Marketing Icon {$a}';
$string['marketingheading'] = 'Marketing Heading {$a}';
$string['marketingcontent'] = 'Marketing Content {$a}';

$string['disableteacherspic'] = 'Disable teachers picture';
$string['disableteacherspicdesc'] = 'This setting hides the teachers\' pictures from the course cards.';

$string['sliderfrontpageloggedin'] = 'Show slideshow in frontpage after login?';
$string['sliderfrontpageloggedindesc'] = 'If enabled, the slideshow will be showed in the frontpage page replacing the header image.';
$string['slidercount'] = 'Slider count';
$string['slidercountdesc'] = 'Select how many slides you want to add <strong>then click SAVE</strong> to load the input fields.';
$string['sliderimage'] = 'Slider picture';
$string['sliderimagedesc'] = 'Add an image for your slide. Recommended size is 1500px x 540px or higher.';
$string['slideheading'] = 'Slider text';

$string['numbersfrontpage'] = 'Show site numberss';
$string['numbersfrontpagedesc'] = 'If enabled, display the number of active users and courses in the frontpage.';
$string['numbersfrontpagecontent'] = 'Numbers section content';
$string['numbersfrontpagecontentdesc'] = 'You can add any text to the left side of the numbers section';
$string['numbersfrontpagecontentdefault'] = 'Trusted by 25,000+ happy customers.';
$string['numbersusers'] = 'Active users accessing our amazing resources';
$string['numberscourses'] = 'Courses made for your that you can trust!';

$string['faq'] = 'FAQ';
$string['faqcount'] = 'FAQ questions';
$string['faqcountdesc'] = 'Select how many questions you want to add <strong>then click SAVE</strong> to load the input fields.<br>If you don\'t want a FAQ, just select 0.';
$string['faqquestion'] = 'FAQ question {$a}';
$string['faqanswer'] = 'FAQ answer {$a}';

// Footer settings tab.
$string['footersettings'] = 'Footer';
$string['website'] = 'Website URL';
$string['websitedesc'] = 'Main company Website';
$string['mobile'] = 'Mobile';
$string['mobiledesc'] = 'Enter Mobile No. Ex: +99999999999';
$string['mail'] = 'E-Mail';
$string['maildesc'] = 'Company support e-mail';
$string['facebook'] = 'Facebook URL';
$string['facebookdesc'] = 'Enter the URL of your Facebook. (i.e http://www.facebook.com/)';
$string['twitter'] = 'Twitter URL';
$string['twitterdesc'] = 'Enter the URL of your twitter. (i.e http://www.twitter.com/)';
$string['linkedin'] = 'Linkedin URL';
$string['linkedindesc'] = 'Enter the URL of your Linkedin. (i.e http://www.linkedin.com/)';
$string['youtube'] = 'Youtube URL';
$string['youtubedesc'] = 'Enter the URL of your Youtube. (i.e https://www.youtube.com/user/)';
$string['instagram'] = 'Instagram URL';
$string['instagramdesc'] = 'Enter the URL of your Instagram. (i.e https://www.instagram.com/)';
$string['whatsapp'] = 'Whatsapp number';
$string['whatsappdesc'] = 'Enter your whatsapp number for contact.';
$string['telegram'] = 'Telegram';
$string['telegramdesc'] = 'Enter your Telegram contact or group link.';
$string['contactus'] = 'Contact us';
$string['followus'] = 'Follow us';

// Mypublic page.
$string['aboutme'] = 'About me';
$string['personalinformation'] = 'Personal information';
$string['addcontact'] = 'Add contact';
$string['removecontact'] = 'Remove contact';

// Theme settings.
$string['themesettings:accessibility'] = 'Accessibility';
$string['themesettings:fonttype'] = 'Font type';
$string['themesettings:defaultfont'] = 'Default font';
$string['themesettings:dyslexicfont'] = 'Dyslexic font';
$string['themesettings:enableaccessibilitytoolbar'] = 'Enable accessibility toolbar';
$string['themesettingg:successfullysaved'] = 'Accessibility settings successfully saved';

// Accessibility features.
$string['accessibility:fontsize'] = 'Font size';
$string['accessibility:decreasefont'] = 'Decrease font size';
$string['accessibility:resetfont'] = 'Reset font size';
$string['accessibility:increasefont'] = 'Increase font size';
$string['accessibility:sitecolor'] = 'Site color';
$string['accessibility:resetsitecolor'] = 'Reset site color';
$string['accessibility:sitecolor2'] = 'Low contrast 1';
$string['accessibility:sitecolor3'] = 'Low contrast 2';
$string['accessibility:sitecolor4'] = 'High contrast';

// Data privacy.
$string['privacy:metadata:preference:accessibilitystyles_fontsizeclass'] = 'The user\'s preference for font size.';
$string['privacy:metadata:preference:accessibilitystyles_sitecolorclass'] = 'The user\'s preference for site color.';
$string['privacy:metadata:preference:themenebulasettings_fonttype'] = 'The user\'s preference for font type.';
$string['privacy:metadata:preference:themenebulasettings_enableaccessibilitytoolbar'] = 'The user\'s preference for enable the accessibility toolbar.';

$string['privacy:accessibilitystyles_fontsizeclass'] = 'The current preference for the font size is: {$a}.';
$string['privacy:accessibilitystyles_sitecolorclass'] = 'The current preference for the site color is: {$a}.';
$string['privacy:themenebulasettings_fonttype'] = 'The current preference for the font type is: {$a}.';
$string['privacy:themenebulasettings_enableaccessibilitytoolbar'] = 'The current preference for enable accessibility toolbar is to show it.';
$string['logintext'] = 'Login page text';
$string['loginalignment'] = 'Login Box Position';
$string['loginalignmentdesc'] = 'You can display the login box on the left, right or center.';
$string['loginalignment-left'] = 'غادر';
$string['loginalignment-center'] = 'مركز';
$string['loginalignment-right'] = 'يمين';
$string['coursesenrolled'] = "الدورات المسجلين";
$string['coursescompleted'] = "الدورات المنجزة";
$string['activitiescompleted'] = "الأنشطة المنجزة";
$string['activitiesdue'] = "الأنشطة المستحقة";
$string['region-content'] = "Content";
$string['enablemoodewalletnav'] = "Enable Moodewallet Navigation";
$string['enablemoodewalletnav_desc'] = "Enable Wallet For Your Moodle plugin <a href = 'https://moodewallet.com/' target = '_blank'><b>Moodewallet</b></a> Navigation";
$string['cart'] = 'عربة التسوق';
$string["mywallet"] = 'محفظتى';
$string['shop'] = "متجر الدورة";