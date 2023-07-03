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
 * Privacy Provider.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core_completion\privacy;

defined('MOODLE_INTERNAL') || die();

use core_privacy\local\metadata\collection;
use core_privacy\local\request\approved_userlist;
use core_privacy\local\request\contextlist;
use core_privacy\local\request\transform;
use core_privacy\local\request\userlist;
use context;
use context_module;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\writer;

require_once($CFG->dirroot . '/comment/lib.php');

/**
 * Privacy class for requesting user data.
 *
 */
class provider implements
        \core_privacy\local\metadata\provider,
        \core_privacy\local\request\subsystem\plugin_provider,
        \core_privacy\local\request\shared_userlist_provider {

    /**
     * Returns meta data about this system.
     *
     * @param   collection $collection The initialised collection to add items to.
     * @return  collection A listing of user data stored through this system.
     */
    public static function get_metadata(collection $collection) : collection {
        $collection->add_database_table('local_si_forumpost', [
                'message' => 'privacy:metadata:message',
                'created' => 'privacy:metadata:created',
                'modified' => 'privacy:metadata:modified',
                'userid' => 'privacy:metadata:userid',
                'parent' => 'privacy:metadata:parent',
                'polarity' => 'privacy:metadata:polarity',
                'textpolarity' => 'privacy:metadata:textpolarity',
                'translation' => 'privacy:metadata:translation',
                'idpost' => 'privacy:metadata:idpost',
                'language' => 'privacy:metadata:language',
            ], 'privacy:metadata:localsentiment_checkerforumpost');
        $collection->add_database_table('local_si_feedback', [
            'message' => 'privacy:metadata:message',
            'modified' => 'privacy:metadata:modified',
            'userid' => 'privacy:metadata:userid',
            'anonymus' => 'privacy:metadata:anonymus',
            'courseid' => 'privacy:metadata:courseid',
            'value' => 'privacy:metadata:value',
            'label' => 'privacy:metadata:label',
            'feedback_name' => 'privacy:metadata:feedbackname',
            ], 'privacy:metadata:localsentiment_checkerfeedback');
        return $collection;
    }


    /**
     * Get the list of contexts that contain user information for the specified user.
     *
     * @param   int $userid   The user to search.
     * @param   int $courseid   The user to search.
     * @return  contextlist   $contextlist  The contextlist containing the list of contexts used in this plugin.
     */
    public static function get_contexts_for_userid(int $userid, int $courseid) : \core_privacy\local\request\contextlist {
        $contextlist = new \core_privacy\local\request\contextlist();

        $contextlist = new contextlist();

        // Discution.
        $params = [
            'contextlevel' => CONTEXT_COURSE,
            'iduser' => $userid,
            'idcourse' => $courseid,
        ];

        $sql = "SELECT ctx.id
        FROM  {context} ctx
        JOIN {course} c ON c.id = ctx.instanceid AND ctx.contextlevel = :contextlevel
        JOIN {forum_discussions} fd ON c.id = fd.course
        JOIN {local_si_forumpost} tf ON fd.id = tf.discussion
        JOIN {user} u on u.id = tf.userid
        WHERE u.id = :iduser AND c.id = :idcourse";

        $contextlist->add_from_sql($sql, $params);
        return $contextlist;
    }


    /**
     * Get the list of users who have data within a context.
     *
     * @param   userlist  $userlist The userlist containing the list of users who have data in this context/plugin combination.
     */
    public static function get_users_in_context(userlist $userlist) {
        $context = $userlist->get_context();

        if ($context->contextlevel != CONTEXT_SYSTEM) {
            return;
        }

        $params = [
            'instanceid' => $context->instanceid,
        ];

        $sql = "SELECT tf.userid
            FROM {local_si_forumpost} tf";

        $userlist->add_from_sql('userid', $sql, $params);

        $sql = "SELECT tf.userid
            FROM {local_si_feedback} tf";

        $userlist->add_from_sql('userid', $sql, $params);

    }

    /**
     * Delete completion information for users.
     *
     * @param \stdClass $userid The user. If provided will delete completion information for just this user. Else all users.
     */
    public static function delete_completion_group_generator(\stdClass $userid = null) {
        global $DB;

            $params = ['userid' => $userid];
            $DB->delete_records('local_si_forumpost', $params);
            return;
    }

    /**
     * Delete completion information for users.
     *
     * @param \stdClass $userid The user. If provided will delete completion information for just this user. Else all users.
     */
    public static function delete_completion_filter(\stdClass $userid = null) {
        global $DB;

            $params = ['userid' => $userid];
            $DB->delete_records('local_si_feedback', $params);
            return;
    }
}

