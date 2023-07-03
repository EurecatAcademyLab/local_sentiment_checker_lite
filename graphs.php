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
 * To show the graph result.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once('./sqlquery.php');
require_login();

/**
 * To create a html graph post.
 * @param Mixed $thresholdneg .
 * @param Mixed $thresholdpos .
 * @param Mixed $courseid .
 * @return String .
 */
function graphposts($thresholdneg, $thresholdpos, $courseid) {

    $output = "";
    global $OUTPUT, $CFG;

    // Mean.
    $output .= html_writer::start_tag('div', ['class' => ' m-5 border-bottom']);
    $output .= html_writer::start_tag('h3');
    $output .= html_writer::tag('span',  get_string('avg', 'local_sentiment_checker'));
    $htmlcontent = '<div class="no-overflow">
        <b>'.get_string('avg', 'local_sentiment_checker').': </b>'.get_string('avg_des', 'local_sentiment_checker').'<br>
        </div>';
    $output .= html_writer::start_tag('a',
    ['class' => 'btn btn-link p-0 m-3',
    'role' => "button",
    'data-container' => "body",
    'data-toggle' => "popover",
    'data-placement' => "right",
    "data-content" => $htmlcontent,
    'data-html' => "true",
    'tabindex' => "0",
    'data-trigger' => "focus"]);
    $output .= html_writer::tag('i', "", ["class" => 'icon fa fa-question-circle text-info fa-fw', 'role' => "img"] );
    $output .= html_writer::end_tag('a');
    $output .= html_writer::end_tag('h3');
    $output .= html_writer::end_tag('div');

    $output .= html_writer::start_tag('div', ['class' => 'row p-5 m-3']);

    $meanall = get_mean_from_course(0);
    $output .= html_writer::tag('div',
    get_string('avg_all', 'local_sentiment_checker') . substr($meanall->mean, 0, 7),
    ['class' => 'h5 col-6']);

    if (!is_null($courseid) || $courseid != 0) {
        $meanall = get_mean_from_course($courseid);
        if (!is_null($meanall->mean)) {
            $output .= html_writer::tag('div',
            get_string('avg_course', 'local_sentiment_checker') . substr($meanall->mean, 0, 7),
            ['class' => 'h5 col-6']);
        }
    }

    $output .= html_writer::end_tag('div');

    // Gràfiques.

    $output .= html_writer::tag('div', get_string('Graphs', 'local_sentiment_checker'), ['class' => 'h3 m-5 border-bottom ']);

    $rd = get_post_from_course($courseid);

    $llengues = array('ca' => 0, 'es' => 0, 'en' => 0, get_string('Others', 'local_sentiment_checker') => 0);
    $sentiment = array('pos' => 0, 'neu' => 0, 'neg' => 0, 'error' => 0);
    foreach ($rd as $key => $value) {
        $llengues[(array_key_exists($value->language, $llengues))
        ? $value->language
        : get_string('Others', 'local_sentiment_checker')] += 1;
        $num = $value->polarity;
        $sentiment[getclassbynum($num, $thresholdneg, $thresholdpos)] += 1;
    }

    $output .= '<div class="row"><div class="col">';
    $chart = new \core\chart_pie();
    $leng = new core\chart_series(get_string('Languages', 'local_sentiment_checker'), array_values($llengues));
    $chart->set_title(get_string('Languages', 'local_sentiment_checker'));
    $chart->add_series($leng); // On pie charts we just need to set one series.
    $chart->set_labels(array_keys($llengues));
    $output .= $OUTPUT->render($chart);

    $CFG->chart_colorset = ['lightgreen', 'lightblue', 'indianred', 'lightgray'];
    $output .= '</div><div class="col">';
    $chart = new \core\chart_pie();
    $sen = new core\chart_series(get_string('Sentiment', 'local_sentiment_checker'), array_values($sentiment));
    $chart->set_title(get_string('Sentiment', 'local_sentiment_checker'));
    $chart->add_series($sen); // On pie charts we just need to set one series.
    $chart->set_labels([get_string('pos', 'local_sentiment_checker'), get_string('neu', 'local_sentiment_checker'),
        get_string('neg', 'local_sentiment_checker'), get_string('err', 'local_sentiment_checker')]);
    $output .= $OUTPUT->render($chart);

    $output .= '</div></div>';
    return $output;
}

/**
 * To create a html graph post.
 * @param Mixed $num .
 * @param Mixed $thresholdneg .
 * @param Mixed $thresholdpos .
 * @return String .
 */
function getclassbynum($num, $thresholdneg, $thresholdpos) {
    if ($num < $thresholdneg) {
        return "neg";
    } else if ($num > $thresholdpos) {
        return "pos";
    } else if ($num >= $thresholdneg && $num <= $thresholdpos) {
        return "neu";
    } else {
        return "error";
    }
}
