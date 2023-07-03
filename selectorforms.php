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
 * To download post information.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


require_once("$CFG->libdir/formslib.php");
require_once('./sqlquery.php');

/**
 * To select a course
 */
class select_course extends moodleform {
    /**
     * Define the fields in the form.
     */
    public function definition() {
        // A reference to the form is stored in $this->form.
        // A common convention is to store it in a variable, such as `$mform`.
        $mform = $this->_form; // Don't forget the underscore!

        // Add elements to your form.
        $mform->addElement('html',
        '<a href="https://lab.eurecatacademy.org" target="_blank" style="margin-bottom: 20px; margin-top: 20px; width: 100%;">');
            $mform->addElement('html',
            '<div class="btn d-flex align-items-center justify-content-center"
            style="height: 90px; margin-bottom: 20px; margin-top: 20px; width: 100%;
            background-image: linear-gradient(to bottom left, #465f9b, #755794, #6d76ae);">');
                $mform->addElement('html',
                '<img alt="'.get_string('premiumicon', 'local_sentiment_checker').'" src="pix/premiumicon.png" height="30"/>');
                $mform->addElement('html',
                '<label style="margin-top: 5px; margin-left: 5px;" class="text-white">'.
                get_string('getpremium', 'local_sentiment_checker').'</label>');
            $mform->addElement('html', '</div>');
        $mform->addElement('html', '</a>');

        $courses = get_courses_array();
        $courses[0] = get_string('All_courses', 'local_sentiment_checker');
        ksort($courses);

        $select = $mform->addElement('select', 'course', get_string('Select_courses', 'local_sentiment_checker'), $courses);

        // This will select the colour blue.
        $select->setSelected(get_string('All_courses',  'local_sentiment_checker'));

        $mform->setType('course', PARAM_INT);

        $mform->addElement('advcheckbox', 'only_bad',
        get_string('show_bad', 'local_sentiment_checker'),
        null,
        array('disabled' => 'disabled')
        );

        $mform->addElement('advcheckbox', 'show_en',
        get_string('show_en', 'local_sentiment_checker'),
        null,
        array('disabled' => 'disabled')
        );
        $mform->addHelpButton('show_en', 'show_en', 'local_sentiment_checker');

        $mform->addElement('float',
            'thresholdNeg',
            get_string('change_neg_threshold', 'local_sentiment_checker'),
            ['disabled' => 'disabled']
        );
        $mform->addHelpButton('thresholdNeg', 'threshold', 'local_sentiment_checker');
        $mform->getElement('thresholdNeg')->setValue(-0.3);

        $mform->addElement('float',
            'thresholdPos',
            get_string('change_pos_threshold', 'local_sentiment_checker'),
            ['disabled' => 'disabled']
        );
        $mform->addHelpButton('thresholdPos', 'threshold', 'local_sentiment_checker');
        $mform->getElement('thresholdPos')->setValue(0.3);

        $this->add_action_buttons(false, get_string('submit'));
    }

    /**
     * Validate the form data.
     * @param array $data
     * @param array $files
     * @return array|bool
     */
    public function validation($data, $files) {
        $errors = array();
        if ($data['thresholdNeg'] < -1 || $data['thresholdNeg'] >= $data['thresholdPos']) {
            $errors['thresholdNeg'] = get_string('error_neg_th', 'local_sentiment_checker');
        }
        if ($data['thresholdPos'] > 1 || $data['thresholdNeg'] >= $data['thresholdPos']) {
            $errors['thresholdPos'] = get_string('error_pos_th', 'local_sentiment_checker');
        }
        return $errors;
    }

    /**
     * To redirect to from page.
     * @return Void .
     */
    public function reset() {
        redirect(new moodle_url('/local/sentiment_checker'));
    }
}

