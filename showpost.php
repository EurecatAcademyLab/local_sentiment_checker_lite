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
 * Show post on table.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/lib/formslib.php');
require_once("$CFG->dirroot/enrol/locallib.php");
require_once('./sqlquery.php');
require_login();

/**
 * Post view.
 */
class Post_view {
    /**
     * @var Mixed $thresholdneg.
     */
    public $thresholdneg;
    /**
     * @var Mixed $thresholdpos.
     */
    public $thresholdpos;
    /**
     * @var Mixed $courseselected.
     */
    public $courseselected;
    /**
     * @var Mixed $onlybad.
     */
    public $onlybad;
    /**
     * @var Mixed $translate.
     */
    public $translate;


    /**
     * To create a construct.
     * @param Mixed $thresholdneg .
     * @param Mixed $thresholdpos .
     * @param Mixed $courseselected .
     * @param Mixed $onlybad .
     * @param Mixed $tranlate .
     * @return Void .
     */
    public function __construct($thresholdneg, $thresholdpos, $courseselected, $onlybad, $tranlate) {
        $this->thresholdneg = $thresholdneg;
        $this->thresholdpos = $thresholdpos;
        $this->courseselected = $courseselected;
        $this->onlybad = $onlybad;
        $this->translate = $tranlate;
    }

    /**
     * To print data.
     * @return String .
     */
    public function printar() {
        global $OUTPUT, $CFG;

        $sortida = '';

        if ($this->onlybad) {
            $posts = get_post_from_course_neg_threshold($this->courseselected, $this->thresholdneg);
        } else {
            $posts = get_post_from_course($this->courseselected);
        }

        $sortida .= $OUTPUT->container_start('', 'contenedor');

        $route = $CFG->wwwroot;

        $sortida .= html_writer::start_tag('div');
        $sortida .= html_writer::start_tag('table', ['class' => 'table']);
        $sortida .= html_writer::start_tag('thead');
        $sortida .= html_writer::start_tag('tr');
        $sortida .= html_writer::tag('th', '', ['class' => 'col-1']);
        $sortida .= html_writer::tag('th', get_string('name', 'local_sentiment_checker'), ['class' => 'col-3 pl-4']);
        $sortida .= html_writer::tag('th', get_string('discussion', 'local_sentiment_checker'), ['class' => 'col-4 pl-4']);
        $sortida .= html_writer::start_tag('th', ['class' => 'col-3 pl-4']);
        $sortida .= html_writer::tag('span', get_string('polarity', 'local_sentiment_checker').' / ');
        $sortida .= html_writer::tag('span', get_string('language', 'local_sentiment_checker'));

        $sortida .= html_writer::end_tag('th');
        $sortida .= html_writer::start_tag('th', ['class' => 'col-1 pl-4']);
        $htmlcontent = '<div class="no-overflow">
            <b>'.get_string('name', 'local_sentiment_checker').': </b>'.get_string('name_des', 'local_sentiment_checker').'<br>
            <b>'.get_string('discussion', 'local_sentiment_checker').
            ': </b>'.get_string('discussion_des', 'local_sentiment_checker').'<br>
            <b>'.get_string('polarity', 'local_sentiment_checker').
            ': </b>'.get_string('polarity_des', 'local_sentiment_checker').'<br>
            <b>'.get_string('language', 'local_sentiment_checker').
            ': </b>'.get_string('language_des', 'local_sentiment_checker').'<br>
            </div>';
        $sortida .= html_writer::start_tag('a', [
            'class' => 'btn btn-link p-0',
            'role' => "button",
            'data-container' => "body",
            'data-toggle' => "popover",
            'data-placement' => "right",
            "data-content" => $htmlcontent,
            'data-html' => "true",
            'tabindex' => "0",
            'data-trigger' => "focus"
        ]);
        $sortida .= html_writer::tag('i', "", ["class" => 'icon fa fa-question-circle text-info fa-fw', 'role' => "img"] );
        $sortida .= html_writer::end_tag('a');
        $sortida .= html_writer::end_tag('th');

        $sortida .= html_writer::end_tag('tr');
        $sortida .= html_writer::end_tag('thead');
        $sortida .= html_writer::end_tag('table');
        $sortida .= html_writer::end_tag('div');

        foreach ($posts as $key => $value) {
            $classpost = $this->getclasspostbynum((float)$value->polarity, $this->thresholdneg, $this->thresholdpos);

            $sortida .= html_writer::start_tag('div');

            $sortida .= html_writer::start_tag('div', [
                'class' => 'row '.$classpost,
                'role' => 'alert',
                'type' => "button",
                'data-toggle' => "collapse",
                'data-target' => "#collapse".$value->id,
                'aria-expanded' => "false"
            ]);

            $sortida .= html_writer::tag('i', '', ['class' => 'col-1 fa fa-chevron-right pull-right']);
            $sortida .= html_writer::tag('i', '', ['class' => 'col-1 fa fa-chevron-down pull-right']);

            // Name.
            $name = get_name_user_sentiment($value->userid);
            if (is_object($name)) {
                $sortida .= html_writer::tag('a', utf8_encode($name->name), [
                    'class' => 'col-3',
                    'href' => $route.'/user/profile.php?id='.$value->userid
                ]);
            } else {
                $sortida .= html_writer::tag('a', get_string('notFound', 'local_sentiment_checker'), ['class' => 'col-3' ]);
            }

            // Discuss.
            $num = intval($value->discussion);
            $namediscuss = get_name_discussion_by_id($value->discussion);
            $sortida .= html_writer::tag(
                'a',
                utf8_encode($namediscuss->name),
                [
                    'href' => $route.'/mod/forum/discuss.php?d='.$num,
                    'class' => 'col-4 font-weight-bold',
                    'target' => '_blank'
                ]
            );

            // Polarity and language.
            $sortida .= html_writer::tag('span',
            '<b>'.get_string('polarity', 'local_sentiment_checker').':</b>'.number_format((float)$value->polarity, 2, '.', '').
            '&emsp;<b>'.get_string('language', 'local_sentiment_checker').':</b>'.$value->language
            , ['class' => 'col-3']);

            $sortida .= html_writer::end_tag('div');

            // Inside.
            $sortida .= html_writer::start_tag('div', ['class' => 'collapse', 'id' => "collapse".$value->id]);

            $sortida .= html_writer::start_tag('div', ['class' => 'card-body']);

            if ($this->translate) {
                $sortida .= html_writer::tag(
                    'div',
                    "<b>Traslation: </b>".$value->translation,
                    ['class' => 'alert alert-light', 'role' => 'alert']);
            }

            $sortida .= html_writer::tag(
                'div',
                $this->addclass(utf8_decode($value->textpolarity),
                $this->thresholdneg, $this->thresholdpos));

            $sortida .= html_writer::end_tag('div');
            $sortida .= html_writer::end_tag('div');

            $sortida .= html_writer::end_tag('div');

        }

        $sortida .= $OUTPUT->container_end();
        return $sortida;

    }

    /**
     * To print table.
     * @param Mixed $string .
     * @param Mixed $thresholdneg .
     * @param Mixed $thresholdpos .
     * @return String | Bolean.
     */
    public function addclass($string, $thresholdneg, $thresholdpos) {

        $doc = new DOMDocument();
        $doc->loadHTML(($string), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $ps = $doc->getElementsByTagName('p');
        foreach ($ps as $p) {
            $num = (float)$p->getAttribute('data-value');
            $p->setAttribute('class', $this->getclassbynum($num, $thresholdneg, $thresholdpos).'Post');
        }
        return $doc->saveHTML();
    }

    /**
     * To get class by num.
     * @param Mixed $num .
     * @param Mixed $thresholdneg .
     * @param Mixed $thresholdpos .
     * @return String .
     */
    public function getclassbynum($num, $thresholdneg, $thresholdpos) {
        if ($num < $thresholdneg) {
            return "neg";
        } else if ($num > $thresholdpos) {
            return "pos";
        } else {
            return "neu";
        }
    }

    /**
     * To get class post by num.
     * @param Mixed $num .
     * @param Mixed $thresholdneg .
     * @param Mixed $thresholdpos .
     * @return String .
     */
    public function getclasspostbynum($num, $thresholdneg, $thresholdpos) {
        if ($num < $thresholdneg) {
            return "alert alert-danger";
        } else if ($num > $thresholdpos) {
            return "alert alert-success";
        } else {
            return "alert alert-light";
        }
    }
}

