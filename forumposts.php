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
 * To Save records.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$table = 'forum_posts';

/**
 * To get record from forum post
 * @param Mixed $lastmodified .
 * @param Mixed $maxnum .
 * @return Bolean .
 */
function getposts($lastmodified, $maxnum) {
    global $DB;
    $sql = "SELECT *
        FROM {forum_posts}
        WHERE modified > $lastmodified
        ORDER BY modified ASC
        LIMIT $maxnum";
    $rd = $DB->get_records_sql($sql);
    if (!empty($rd)) {
        $posts = [];
        foreach ($rd as $key => $value) {
            $posts[$value->id] = new \stdClass();
            $posts[$value->id]->message = $value->message;
            $posts[$value->id]->created = $value->created;
            $posts[$value->id]->parent = $value->parent;
            $posts[$value->id]->discussion = $value->discussion;
            $posts[$value->id]->userid = $value->userid;
            $posts[$value->id]->modified = $value->modified;
            $posts[$value->id]->idpost = $value->id;
        }

        $polarityresults = processposts(array_filter($posts));
        call_user_func_array("addtodb", array((array) $posts, $polarityresults));
        return true;
    }
    return false;
}

/**
 * To get record from forum post and conect to Api
 * @param Mixed $postsarr .
 * @return Mixed .
 */
function processposts($postsarr) {
    $inputapi = [];
    foreach ($postsarr as $posts) {
        $m = strip_tags($posts->message);
        $inputapi[$posts->idpost] = htmlentities($m);
    }

    // API.
    $makecall = callapi('POST', 'https://d75rw7c769oxjm63lab.online/sentiment', json_encode($inputapi, true));
    $response = json_decode($makecall, true);

    return $response;
}

/**
 * To update or insert record in sentiment_checker table.
 * @param Mixed $postsarr .
 * @param Mixed $polarityresults .
 * @return Void .
 */
function addtodb($postsarr, $polarityresults) {
    global $DB;
    $table = "local_sc_forumpost";
    foreach ($postsarr as $post) {
        $post->polarity = $polarityresults[$post->idpost]["polarity"];
        $post->language = $polarityresults[$post->idpost]["language"];
        $post->textpolarity = $polarityresults[$post->idpost]["text"];
        $post->translation = $polarityresults[$post->idpost]["translation"];

        if ($DB->record_exists($table, ['idpost' => $post->idpost])) {
            $post->id = $DB->get_field($table, 'id', ['idpost' => $post->idpost]);
            $DB->update_record($table, $post);
        } else {
            $DB->insert_record($table, $post);
        }
    }
}

/**
 * To delete record in sentiment_checker table.
 * @return Void .
 */
function deleteerrors() {
    global $DB;
    $conditions = ['polarity' => null];
    $table = "local_sc_forumpost";
    $DB->delete_records($table, $conditions);
}

/**
 * To delete all records in sentiment_checker table.
 * @return Void .
 */
function deleteall() {
    global $DB;
    $conditions = null;
    $table = "local_sc_forumpost";
    $DB->delete_records($table, $conditions);
}

/**
 * To set or reset a last modified.
 * @return Bolean .
 */
function updatepost() {
    global $DB;
    $lastmodified = $DB->get_records_sql("SELECT MAX(modified) AS lastModified FROM {local_sc_forumpost}");
    if (reset($lastmodified)->lastmodified == null) {
        $lastmodified = 0;
    } else {
        $lastmodified = reset($lastmodified)->lastmodified;
    }
    return getposts((int)$lastmodified, 10);
}

/**
 * to check erros.
 * @return Array .
 */
function checkerrors() {
    global $DB;
    $repes = array_fill(0, 500, 0);
    $rd = $DB->get_recordset('local_sc_forumpost',
    null, $sort = 'modified', $fields = '*', $limitfrom = 0, $limitnum = 0);
    $k = 0;
    foreach ($rd as $key => $value) {
        $repes[(int)$value->idpost] += 1;
        $k += 1;
    }
    var_dump($repes);
}

/**
 * Call api
 * @param Mixed $method .
 * @param Mixed $url .
 * @param Mixed $data .
 * @return (String | Bolean) .
 */
function callapi($method, $url, $data) {
    $curl = curl_init();
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
            }
          break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
            }
          break;
        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
    }
    // OPTIONS.
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'APIKEY: '.get_config('local_sentiment_checker', 'apikey'),
       'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE.
    $result = curl_exec($curl);
    if (!$result) {
        die("Connection Failure");
    }
    curl_close($curl);
    return $result;
}

