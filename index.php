<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Index.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Include config.php.
require_once(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->libdir.'/gdlib.php');
require_once($CFG->dirroot.'/user/lib.php');
require_once('./forumposts.php');
require_once('./showpost.php');
require_once('./selectorforms.php');
require_once('./sqlquery.php');
require_once('./header.php');
require_once('./graphs.php');

require_once($CFG->dirroot. '/local/sentiment_checker/classes/form/premiumformsentiment.php');
require_once($CFG->dirroot. '/local/sentiment_checker/classes/form/noactivesentiment.php');
require_once($CFG->dirroot. '/local/sentiment_checker/classes/form/aboutsentiment.php');
require_once($CFG->dirroot. '/local/sentiment_checker/classes/connected/query.php');

require_login();


// Globals.
global $CFG, $OUTPUT, $USER, $SITE, $PAGE;

$PAGE->requires->js(new moodle_url('/local/sentiment_checker/amd/getpremium.js'));
$PAGE->requires->css( new moodle_url($CFG->wwwroot . '/local/sentiment_checker/css/style.css'));

// Include our function library.
$pluginname = 'sentiment_checker';

$homeurl = new moodle_url('/');
require_login();

if (!is_siteadmin() && $datos->teacher == 0) {
    redirect($homeurl, "This feature is only available for site administrators.", 5);
}

// URL Parameters.
// There are none.

// Heading.
// --------------------------------------------.

$title = get_string('pluginname', 'local_'.$pluginname);
$heading = get_string('pluginname', 'local_'.$pluginname) . " " . get_string('pluginnameextra', 'local_'.$pluginname);
$url = new moodle_url('/local/'.$pluginname.'/');
if ($CFG->version >= 2013051400) { // Moodle 2.5+.
    $context = context_system::instance();
} else {
    $context = get_system_context();
}

$PAGE->set_pagelayout('admin');
$PAGE->set_url($url);
$PAGE->set_context($context);
$PAGE->set_title($title);
$PAGE->set_heading($heading);

if (!$site = get_site()) {
    error("Site isn't defined!");
}

if (!empty($USER->newadminuser)) {
    ignore_user_abort(true);
    $PAGE->set_course($SITE);
    $PAGE->set_pagelayout('maintenance');
} else {
    $PAGE->set_context(context_system::instance());
    $PAGE->set_pagelayout('admin');
}

$renderer = $PAGE->get_renderer('core_enrol');
$allowpremium = has_capability('local/sentiment_checker:view', $context);

$dform = new select_course();
$premium = new si_premium_form();
$about = new si_about_form();
$noactivesurvey = new noactive_survey_form();

$privacysentiment = $DB->get_record('config_plugins', array('plugin' => 'local_sentiment_checker', 'name' => 'privacy'));
$apikeychecksentiment = $DB->get_record('config_plugins', array('plugin' => 'local_sentiment_checker', 'name' => 'apikey'));
$emailsentiment = $DB->get_record('config_plugins', array('plugin' => 'local_sentiment_checker', 'name' => 'email'));
$productsentiment = $DB->get_record('config_plugins', array('plugin' => 'local_sentiment_checker', 'name' => 'productid'));


if (empty($emailsentiment) || strlen($emailsentiment->value) == 0 ||
$emailsentiment->value == '' || $emailsentiment->value == null || !$emailsentiment) {
    redirect (new moodle_url('/admin/settings.php?section=managelocalsentiment_checker'));
}
if (!$productsentiment || $productsentiment->value != 200 ) {
    redirect (new moodle_url('/admin/settings.php?section=managelocalsentiment_checker'));
}
if (!$privacysentiment || $privacysentiment->value == false) {
    redirect (new moodle_url('/admin/settings.php?section=managelocalsentiment_checker'));
}
if ( !$apikeychecksentiment || $apikeychecksentiment->value != '82a56cb1632bf35d874d8e3b9c7c219df0f0ff83') {
    redirect (new moodle_url('/admin/settings.php?section=managelocalsentiment_checker'));
}

echo $OUTPUT->header();

$output = "";
call_woocomerce_status_sentiment();
$statussentiment = $DB->get_record('config_plugins', array('plugin' => 'local_sentiment_checker', 'name' => 'status'));

if ( $statussentiment->value == 1 ) {
    updatepost();

    $output .= html_writer::start_tag('div', ['id' => 'statussentiment', 'class' => 'mb-3']);
    $output .= html_writer::end_tag('div');

    $courseselected = null;
    $thresholdneg = -0.3;
    $thresholdpos = 0.3;
    $onlybad = 0;
    $translation = 0;

    if ($fromform = $dform->get_data()) {
        require_sesskey();
        $courseselected = $fromform->course;
        $onlybad = $fromform->only_bad;
        $translation = $fromform->show_en;
        $thresholdneg = $fromform->thresholdNeg;
        $thresholdpos = $fromform->thresholdPos;

        $dform->display();

    } else {
        $dform->display();
    }

    $output .= html_header($courseselected);

    $output .= html_writer::start_tag('div', ['class' => 'pt-2']);
        $output .= html_writer::start_tag('ul', ["class" => 'nav nav-tabs', 'role' => "tablist"]);

            $output .= html_writer::start_tag('li', ['class' => 'nav-item waves-effect waves-light']);
                $output .= html_writer::tag('a', get_string('Posts', 'local_sentiment_checker'), ['class' => 'nav-link active',
                'data-toggle' => "tab", 'href' => "#postsTab"]);
                $output .= html_writer::end_tag('li');

                $output .= html_writer::start_tag('li', ['class' => 'nav-item waves-effect waves-light']);
                $output .= html_writer::tag(
                    'a',
                    get_string('Analytics', 'local_sentiment_checker'),
                    ['class' => 'nav-link', 'data-toggle' => "tab", 'href' => "#si_graph"]);
                $output .= html_writer::end_tag('li');

                $output .= html_writer::start_tag('li', ['class' => 'nav-item waves-effect waves-light']);
                $output .= html_writer::tag(
                    'a',
                    get_string('about', 'local_sentiment_checker'),
                    ['class' => 'nav-link', 'data-toggle' => "tab", 'href' => "#si_about"]);
                $output .= html_writer::end_tag('li');

                $output .= html_writer::end_tag('ul');
                $output .= html_writer::end_tag('div');

                $output .= html_writer::start_tag('div', ['class' => 'tab-content']);

                $output .= html_writer::start_tag('div', ['class' => 'tab-pane fade show active', 'id' => 'postsTab']);
                $output .= html_writer::start_tag('div', ['class' => 'p-1']);
                    $post = new Post_view($thresholdneg, $thresholdpos, $courseselected, $onlybad, $translation);
                    $output .= utf8_decode($post->printar());
                $output .= html_writer::end_tag('div');

                $downloadformatselector = $OUTPUT->download_dataformat_selector(
                    get_string('userbulkdownload', 'admin'),
                    'downloadposts.php',
                    'download',
                    array(
                        'id' => 'downloadresult',
                        'thN' => $thresholdneg,
                        'curseSelected' => $courseselected,
                        'onlyB' => $onlybad,
                        'disablecontrols' => true
                    )
                );

                $downloadformatselector = str_replace('<button', '<button id="downloadresult" disabled', $downloadformatselector);
                $output .= $downloadformatselector;

                $img = html_writer::tag('img', '', array(
                    'alt' => get_string('premiumicon', 'local_sentiment_checker'), 'src' => "pix/premiumicon.png", 'height' => 30));
                    $output .= html_writer::start_tag('a',
                    array('href' => 'https://lab.eurecatacademy.org',
                    'target' => '_blank',
                    'style' => 'width: 20%;'));

                    $output .= html_writer::start_tag('div',
                    ['class' => 'btn rounded ',
                    'style' => 'height: 50px; width: 20%; margin-top:20px;
                    background-image: linear-gradient(to bottom left, #465f9b, #755794, #6d76ae); ']);
                        $output .= $img;
                        $output .= html_writer::tag('label', get_string('getpremium', 'local_sentiment_checker'),
                        ['style' => 'margin-top: 5px; margin-left: 5px;', 'class' => 'text-white']);
                        $output .= html_writer::end_tag('div');
                        $output .= html_writer::end_tag('a');

                $output .= html_writer::end_tag('div');


                $output .= html_writer::start_tag('div', ['class' => 'tab-pane fade', 'id' => 'si_graph']);

                $output .= html_writer::start_tag('div');
                $output .= $premium->definition();
                $output .= html_writer::end_tag('div');

                $output .= html_writer::start_tag('div', [
                    'class' => 'd-flex justify-content-center align-items-center overflow-hidden mt-6 border']);
                $output .= html_writer::empty_tag('img',
                array('src' => "pix/sapostgraph.png",
                'style' => 'width: 100%',
                'class' => 'd-flex justify-content-center align-items-center'));
                $output .= html_writer::end_tag('div');

                $output .= html_writer::end_tag('div');
                $output .= html_writer::end_tag('div');


                    $output .= html_writer::start_tag('div', ['class' => 'tab-pane fade', 'id' => 'si_about']);
                            $output .= $about->definition();
                    $output .= html_writer::end_tag('div');

                    $output .= html_writer::end_tag('div');
} else {
    $output .= html_writer::start_tag('div');
    $output .= $noactivesurvey->definition();
    $output .= html_writer::end_tag('div');
}
                echo $output;

                echo $OUTPUT->footer();


