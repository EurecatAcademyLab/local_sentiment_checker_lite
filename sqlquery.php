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
 * Auxiliary function.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/lib/formslib.php');
require_once("$CFG->dirroot/enrol/locallib.php");
require_login();

/**
 * Create an array with course.
 * @return Array .
 */
function get_courses_array() {

    $allcourses2 = array();
    $getcourse2 = get_courses();
    foreach ($getcourse2 as $courses) {
        $allcourses2[$courses->id] = $courses->fullname;
    }

    return $allcourses2;
}

/**
 * Get records.
 * @param Mixed $courseid .
 * @return Object .
 */
function get_post_from_course($courseid) {

    global $DB;

    $posts = [];
    $params = ['courseid' => $courseid];
    if (is_null($courseid) || $courseid == 0) {

        $posts = $DB->get_records_sql(
            "SELECT *
            FROM {local_sc_forumpost}
            ORDER BY modified DESC;"
        );

    } else {
        $sql = "SELECT c.*
        FROM {local_sc_forumpost} c
        JOIN {forum_discussions} fd ON fd.id = c.discussion
        WHERE fd.course = :courseid
        ORDER BY c.modified DESC";
        $posts = $DB->get_records_sql($sql, $params);
    }

    return $posts;
}

/**
 * Get post negative threshold.
 * @param Mixed $courseid .
 * @param Mixed $thresholdneg .
 * @return Object .
 */
function get_post_from_course_neg_threshold($courseid, $thresholdneg) {

    global $DB;

    $posts = [];
    $params = [
        'thresholdneg' => $thresholdneg,
        'courseid' => $courseid];

    if (is_null($courseid) || $courseid == 0) {
        $sql = "SELECT c.*
        FROM {local_sc_forumpost} c
        WHERE c.polarity < :thresholdneg
        ORDER BY c.modified DESC";
        $posts = $DB->get_records_sql($sql, $params);
    } else {
        $sql = "SELECT c.*
        FROM {local_sc_forumpost} c
        JOIN {forum_discussions} fd ON fd.id = c.discussion
        WHERE fd.course = :courseid AND c.polarity < :thresholdneg
        ORDER BY c.modified DESC";
        $posts = $DB->get_records_sql($sql, $params);
    }

    return $posts;

}
/**
 * Get name field from forum discussion.
 * @param Mixed $id .
 * @return Object .
 */
function get_name_discussion_by_id($id) {
    global  $DB;

    $params = ['id' => $id];
    $sql = "SELECT fd.name
    FROM {forum_discussions} fd
    WHERE fd.id = :id";
    return $DB->get_record_sql($sql, $params);
}

/**
 * Get record with average polarity.
 * @param Mixed $courseid .
 * @return Object .
 */
function get_mean_from_course($courseid) {
    global $DB;

    $mean = [];
    $params = ['courseid' => $courseid];
    if (is_null($courseid) || $courseid == 0) {
        $sql = "SELECT id, Avg(polarity) AS mean
        FROM {local_sc_forumpost}";
        $mean = $DB->get_record_sql($sql);
    } else {
        $courseid = intval($courseid);
        $sql = "SELECT fd.course, Avg(c.polarity) AS mean
        FROM {local_sc_forumpost} c
        JOIN {forum_discussions} fd ON fd.id = c.discussion
        WHERE fd.course = $courseid
        GROUP BY fd.id
        ";
        $mean = $DB->get_record_sql($sql);
    }

    return $mean;
}

/** Get record from user table.
 * @param Mixed $userid .
 * @return Object .
 */
function get_name_user_sentiment($userid) {
    global $DB;

    $sql = "SELECT lastname AS name FROM {user} WHERE id = :userid";
    $params = ['userid' => $userid];
    $name = $DB->get_record_sql($sql, $params);

    return $name;
}

/** Get record from course table.
 * @param Mixed $courseid .
 * @return Object .
 */
function get_name_course_sentiment($courseid) {
    global $DB;
    $sql = "SELECT c.fullname AS name FROM {course} c WHERE c.id = :courseid";
    $params = ['courseid' => $courseid];
    $name = $DB->get_record_sql($sql, $params);

    return $name;
}

