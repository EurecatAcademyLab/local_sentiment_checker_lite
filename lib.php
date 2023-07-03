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
 * Lib and auxiliar functions.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


/**
 * Insert a link to index.php on the site front page navigation menu.
 * @param navigation_node $frontpage Node representing the front page in the navigation tree.
 */
function local_sentiment_checker_extend_navigation_frontpage(navigation_node $frontpage) {
    if (is_siteadmin()) {
        if (!isguestuser() && isloggedin()) {
            $frontpage->add(
                get_string('pluginname', 'local_sentiment_checker'),
                new moodle_url('/local/sentiment_checker/index.php')
            );
        }
    }
}

/**
 * Insert a link to index.php on the site front page navigation menu.
 * @param navigation_node $frontpage Node representing the front page in the navigation tree.
 */
function local_sentiment_checker_extend_navigation_user(navigation_node $frontpage) {
    if (is_siteadmin()) {
        if (!isguestuser() && isloggedin()) {
            $frontpage->add(
                get_string('pluginname', 'local_sentiment_checker'),
                new moodle_url('/local/sentiment_checker/index.php'),
                navigation_node::TYPE_CUSTOM,
                null,
                null,
                new pix_icon('t/message', '')
            );
        }
    }
}

/**
 * Add link to index.php into navigation drawer.
 * Admin decide if show it or not.
 * @param global_navigation $root Node representing the global navigation tree.
 */
function local_sentiment_checker_extend_navigation(global_navigation $root) {
    if (is_siteadmin()) {
        if (get_config('local_sentiment_checker', 'showinnavigation') && !isguestuser() && isloggedin()) {
            $node = navigation_node::create(
                get_string('pluginname', 'local_sentiment_checker'),
                new moodle_url('/local/sentiment_checker/index.php'),
                navigation_node::TYPE_CUSTOM,
                null,
                null,
                new pix_icon('t/message', '')
            );
            $node->showinflatnavigation = true;

            $root->add_node($node);
        }
    }
}
