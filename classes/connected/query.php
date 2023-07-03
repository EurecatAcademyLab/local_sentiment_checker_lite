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
 * Connected before plugins.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$page = new moodle_page();
$page->requires->js('/local/sentiment_checker/amd/woocomercesentiment.js');

/**
 * This function get data from config settings and connect with js function.
 * @return Void.
 */
function call_woocomerce_sentiment() {

    $apikey = get_config('local_sentiment_checker', 'apikey');
    $productid = get_config('local_sentiment_checker', 'productid');
    $email = get_config('local_sentiment_checker', 'email');

    $data = array("apikey" => $apikey, "productid" => $productid, 'email' => $email);
    global $PAGE;
    $PAGE->requires->js('/local/sentiment_checker/amd/woocomercesentiment.js');
    $PAGE->requires->js_init_call('woocommerce_api_active_sentiment', $data);
    call_woocomerce_status_sentiment();
    call_woocomerce_status_sentiment();
}

/**
 * This function get data from config settings and confirm the status.
 * @return Void.
 */
function call_woocomerce_status_sentiment() {
    global $DB;

    $apikey = get_config('local_sentiment_checker', 'apikey');
    $productid = get_config('local_sentiment_checker', 'productid');
    $email = get_config('local_sentiment_checker', 'email');
    $privacysentiment = $DB->get_record('config_plugins', array('plugin' => 'local_sentiment_checker', 'name' => 'privacy'));

    $plugin = 'sentiment_checker';

    $data = array(
        "apikey" => $apikey,
        "productid" => $productid,
        'email' => $email,
        'plugin' => $plugin,
        'privacy' => $privacysentiment
    );
    global $PAGE;
    $PAGE->requires->js('/local/sentiment_checker/amd/woocomercesentiment.js');
    $PAGE->requires->js_init_call('woocommerce_api_status_sentiment', $data);
}

/**
 * This function get data the table config plugins and get some values
 * @return Array $data with most of the get config data.
 */
function get_headers_call_sentiment() {
    return   $data = [
        'name' => get_config('local_sentiment_checker', 'name'),
        'email' => get_config('local_sentiment_checker', 'email'),
        'apikey' => get_config('local_sentiment_checker', 'apikey'),
        'productid' => get_config('local_sentiment_checker', 'productid'),
        'privacy' => get_config('local_sentiment_checker', 'privacy'),
        'hash' => get_config('local_sentiment_checker', 'hash'),
        'url' => get_config('local_sentiment_checker', 'url'),
        'status' => get_config('local_sentiment_checker', 'status'),
        'plugin' => 'sentiment_checker',
    ];
}

