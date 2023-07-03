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
 * Settings.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot. '/local/sentiment_checker/classes/connected/query.php');
require_once($CFG->libdir.'/adminlib.php');

$hassiteconfig = true;

if ($hassiteconfig) {
    $ADMIN->add(
        'localplugins',
        new admin_category(
            'local_sentiment_checker_settings',
            new lang_string('pluginname', 'local_sentiment_checker')
        )
    );
    $settingspage = new admin_settingpage(
        'managelocalsentiment_checker',
        new lang_string('manage', 'local_sentiment_checker')
    );

    if ($ADMIN->fulltree) {

        // Show in navigation.
        $settingspage->add(new admin_setting_configcheckbox(
            'local_sentiment_checker/showinnavigation',
            new lang_string('showinnavigation', 'local_sentiment_checker'),
            new lang_string('showinnavigation_desc', 'local_sentiment_checker'),
            1
        ));

        // User name.
        $namesettingssentiment = new admin_setting_configtext(
            'local_sentiment_checker/name',
            new lang_string('name', 'local_sentiment_checker'),
            new lang_string('name_des', 'local_sentiment_checker'),
            null,
            PARAM_TEXT,
            null,
            [
                'pattern' => '/^\w([\w\.%+-]*@[\w.-]+\.[a-zA-Z]{2,}$)/',
                'required' => true
            ]
        );

        if (!$namesettingssentiment->get_setting()) {
            // Show error on settings page.
            $PAGE->navbar->add(get_string('manage', 'local_sentiment_checker'));
        }

        $settingspage->add($namesettingssentiment);

        // Email.
        $emailsettingssentiment = new admin_setting_configtext(
            'local_sentiment_checker/email',
            new lang_string('email', 'local_sentiment_checker'),
            new lang_string('email_des', 'local_sentiment_checker'),
            null,
            PARAM_EMAIL,
            null,
            [
                'pattern' => '/^\w([\w\.%+-]*@[\w.-]+\.[a-zA-Z]{2,}$)/',
                'required' => true
            ],
            new lang_string('placeholder_text', 'local_sentiment_checker')
        );

        if (!$emailsettingssentiment->get_setting()) {
            // Show error on settings page.
            $PAGE->navbar->add(get_string('manage', 'local_sentiment_checker'));
        }

        $settingspage->add($emailsettingssentiment);

        // Apikey Teams.
        $apikeysettingssentiment = new admin_setting_configtext(
            'local_sentiment_checker/apikey',
            new lang_string('apikey', 'local_sentiment_checker'),
            new lang_string('apikey_des', 'local_sentiment_checker'),
            '82a56cb1632bf35d874d8e3b9c7c219df0f0ff83',
            PARAM_TEXT,
            50,
            'maxlength="50"readonly'
        );

        $apikeysettingssentiment->set_updatedcallback(call_woocomerce_sentiment());
        $settingspage->add( $apikeysettingssentiment );

        // Product id.
        $productidsettingssentiment = new admin_setting_configtext(
        'local_sentiment_checker/productid',
        new lang_string('productid', 'local_sentiment_checker'),
        new lang_string('productid_des', 'local_sentiment_checker'),
        200,
        PARAM_INT);

        $settingspage->add($productidsettingssentiment);

        $privacyurl = new moodle_url('https://lab.eurecatacademy.org/privacy-policy-2');
        $privacylink = \html_writer::link($privacyurl, get_string('privacy_policy', 'local_sentiment_checker'));
        $settingspage->add(new admin_setting_configcheckbox(
            'local_sentiment_checker/privacy',
            new lang_string('privacy', 'local_sentiment_checker'),
            new lang_string('privacy_des', 'local_sentiment_checker') . ' ' . $privacylink,
            1
        ));
    }

    $ADMIN->add('localplugins', $settingspage);
}

