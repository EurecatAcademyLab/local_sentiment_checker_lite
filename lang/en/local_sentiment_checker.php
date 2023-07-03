<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin strings are defined here. English.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Sentiment checker';
$string['pluginnameextra'] = '(Beta)';

$string['Analysis'] = 'Analysis';
$string['Graphs'] = 'Graphs';
$string['Posts'] = 'Posts';

// Graph.
$string['Others'] = 'Others';
$string['Sentiment'] = 'Sentiment';
$string['Languages'] = 'Languages';

// Forms.
$string['course'] = "Course: ";
$string['All_courses'] = "All courses";
$string['Select_courses'] = "Select the course you want to check";
$string['show_bad'] = "Show only the post labeled as negative";
$string['change_neg_threshold'] = "Change the negative threshold. Values between [-1,1]. Recommended: -0.3";
$string['change_pos_threshold'] = "Change the positive threshold Values between [-1,1]. Recommended: 0.3";

$string['show_en'] = "Show the translation to English";
$string['show_en_help'] = "This algorithm translates the posts. If you want to check the translation, select this checkbox";

$string['threshold'] = "Change the threshold";
$string['threshold_help'] = "The most negative polarity is -1 and the most positive 1. We use the threshold to set a limit in negativity or positivity. The usual threshold is ±0.3.";

$string['error_neg_th'] = "Negative threshold must be in range [-1,thresholdPos)";
$string['error_pos_th'] = "Positive threshold must be in range (thresholdNeg, 1]";

$string['avg'] = "Average sentiment";
$string['avg_des'] = "Compare the average of all the courses to the course selected.";
$string['avg_course'] = "<b>The average of the course selected is: </b>";
$string['avg_all'] = "<b>The average of all the courses is: </b>";

$string['taskUpdate'] = "Updating the posts";

$string['name'] = 'Name';
$string['discussion'] = 'Discussion';
$string["polarity"] = "Polarity";
$string["language"] = "language";

$string['printAnalysis'] = "Screenshot analysis";

$string['message'] = 'message';
$string['message_trans'] = 'translated message';
$string['class_id'] = 'class id';
$string['class_name'] = 'class name';

$string['Analytics'] = 'Analytics';

$string['polarity_des'] = "The polarity is a number between [-1,1] which describes the sentiment, being -1 the most negative and 1 the most positive.";
$string['language_des'] = "Language detected.";
$string['name_des'] = "Click on the name to go to the perfile of the user.";
$string['discussion_des'] = "Click on the name of the discussion to check all the context.";

$string['notFound'] = "Not Found";

$string['pos'] = 'Positive';
$string['neg'] = 'Negative';
$string['neu'] = 'Neutral';
$string['err'] = 'Error';

$string['feedback'] = 'Feedback questionnaires';

// Pics.
$string['pixsatable'] = 'Table with result reference';
$string['pixsagraph'] = 'Graphs with results';
$string['premium'] = 'Premium';
$string['premiumpage'] = 'Premium';
$string['getpremium'] = 'Get Premium';
$string['premiumicon'] = 'Get Premium';

// Provider.
$string['privacy:metadata:message'] = 'Message pick up from discussion';
$string['privacy:metadata:created'] = 'Time created';
$string['privacy:metadata:modified'] = 'Time modified';
$string['privacy:metadata:userid'] = 'Id user';
$string['privacy:metadata:parent'] = 'Parent';
$string['privacy:metadata:polarity'] = 'Polarity values';
$string['privacy:metadata:textpolarity'] = 'Polarity of message';
$string['privacy:metadata:translation'] = 'In case to translate to english';
$string['privacy:metadata:idpost'] = 'Post by user';
$string['privacy:metadata:language'] = 'Language user detected';
$string['privacy:metadata:localsentiment_checkerforumpost'] = 'Saved information for user';
$string['privacy:metadata:anonymus'] = 'To display anonymous user';
$string['privacy:metadata:courseid'] = 'User course';
$string['privacy:metadata:value'] = 'Value';
$string['privacy:metadata:label'] = 'Label';
$string['privacy:metadata:feedbackname'] = '';
$string['privacy:metadata:localsentiment_checkerfeedback'] = 'Saved data from user';

// Settings.
$string['email'] = 'Email';
$string['email_des'] = 'Insert the Email';
$string['productid'] = 'Product id';
$string['productid_des'] = 'Your actual Product id';
$string['manage'] = 'Sentiment Checker';
$string['showinnavigation'] = 'Show navegation';
$string['showinnavigation_desc'] = 'When enabled, the site navegation will display a link to Sentiment Analysis';
$string['apikey'] = 'APIKey';
$string['apikey_des'] = 'Insert the APIKey';
$string['name'] = 'Last name';
$string['name_des'] = 'Insert your User name';
$string['privacy'] = 'Accept terms and conditions';
$string['privacy_des'] = 'Accept conditions';
$string['privacy_policy'] = 'Privacy policy';
$string['email_cannot_be_empty'] = 'The Email field cannot be empty';
$string['activate'] = 'Activate';
$string['placeholder_text'] = 'name@example.com';

// Description.
$string['Describ'] = "About this plugin";
$string['Describtion'] = "The plugin uses natural language processing (NLP) to extract the suggestiveness of open answers on quality forums. This allows more refined information distilled from user answers to open questions than the usual mean values calculated using quantitative inputs only.";

$string['more'] = "How it works";
$string['moreinfo'] = "In order to represent the analyzed Posts in a simple and graphical way, we have created a local Plugin that can be installed on any Moodle platform. It automatically reads the database every time we use it, and displays the posts in order of modification/creation. the module reads the posts  automatically in a background process that will avoid the need to load the program to read the new posts.";

$string['moreinfo1'] = "This plugin consists of 3 parts: a form to modify parameters, a tab with the posts and one with analysis.";

$string['moreinfo2'] = "Posts The posts will be displayed in 3 different colors, depending on whether their polarity is negative, neutral or positive according to our thresholds. Also it will show the detected language, the polarity and a link to the original discussion of the post, to give more context.";

$string['moreinfo3'] = "Selection menu One of the objectives was to know the general sentiment of a course, therefore, we have also created a course selector to show only the posts of this one. As many times we will want to see what has been detected as negative, we have put a checkbox to display only these posts in the tab. As there can be problems at the time of translation, we can also make it show us this one. As we have said, the polarization goes from [-1, 1] and the thresholds of negativity and positivity are -0.3 and 0.3 respectively. The colors shown are taking into account these parameters, but we wanted to incorporate the possibility of modifying them to be more or less restrictive.";
$string['moreinfo4'] = "Analysis: We have also incorporated an analysis tab, also linked to the selector menu, which shows the overall average sentiment of the platform, and in the case of selecting a specific course, the average sentiment in the course. It also shows a pie chart of the number of charts in the different languages as well as the polarization result.";

// Regarding.
$string['regard'] = "Regarding the AI approach";
$string['regarding'] = "This tool uses AI models to detect hate speech, such as language models like Moderation by OpenAI (";
$string['moderation'] = 'Moderation';
$string['guides'] = 'Guides overview';
$string['regarding1'] = ") and open ones. It is designed to be as ethical and responsible as possible. The tools using these models are developed with a strong emphasis on privacy and data protection, and are designed to ensure that user data is handled with the utmost care and respect.";
$string['regarding2'] = "The development team of the plugin is committed to continuously improving the ethical standards of their product. To achieve this, they are actively working on applying new ethical toolboxes and guidelines to their development process. These toolboxes and guidelines are designed to help the team identify and address ethical concerns and considerations throughout the entire product lifecycle, from conception to implementation.";
$string['regarding3'] = "The AI models selected to be used are typically trained on large datasets that have been carefully curated to ensure that they are representative and diverse. This means that the models are not biased towards any particular group or ideology, and that they are capable of identifying hate speech in all its forms, regardless of who is speaking or what they are saying. More information can be found here: ";
$string['regarding4'] = "It's important to note that tools with enhanced functionality provided by AI models are never perfect and should be used in conjunction with human moderation and oversight. This helps to ensure that any potential errors or biases are caught and corrected before they have a chance to cause harm. The overall design and user interface of this tool is intended to assist human forum moderators, with final decisions left to human judgment.";

// Academy.
$string['academytitle'] = "About Eurecat Academy";
$string['academy'] = "Eurecat is a research and technology center headquartered in Barcelona, Spain, that provides advanced technology, innovation, and training services to over 1,500 companies and organizations. Eurecat is considered one of the leading European research and technology centers, being the second largest private non-profit organisation in Southern Europe. Eurecat Academy collaborates with public and private organizations in a very broad business spectrum and has a specialized innovation group that focuses on improving knowledge transfer and evaluation processes through learning analytics, innovative ICT interfaces, adaptive and motivational methodologies, and personal training environments. Eurecat Academy innovation group also brings configurable professional learning environments, a cognition and perception laboratory, and a learning analytics group. Eurecat Academy team combines technological and pedagogical knowledge and experience to create high-performance training tools and resources and develop educational plans and training itineraries.aparecerá como";
$string['userprivate'] = 'Privacy Policy:';
$string['userprivate1'] = 'FUNDACIÓ EURECAT considers your personal information is very important. We therefore process it confidentially and securely. We are committed to ensuring the privacy of personal data at all times and not to collect unnecessary information.';
$string['userprivate2'] = 'You do not need to previously sign up in order to access our website. If you require any further information, you can contact us through the form available on our website, providing you agree with our privacy policy, which you must accept in order to record your express consent to the data processing for the specified purposes.';
$string['userprivate3'] = 'Pursuant to Regulation (EU) 2016/679 of 27 April 2016 on the protection of individuals with regard to the processing of personal data and on the free movement of such data and Act 3/2018 of 5 December on the protection of personal data and guarantee of digital rights, we provide you with information about the processing of your data through this Privacy Policy.';
$string['information'] = 'More information';
$string['adminprivate'] = "Although this plugin is a free version, our company will store some data for the proper functioning and maintenance of the plugin. These data will be user name, email and url of the platform where the plugin will be deployed.
The plugin's stay has a temporary duration, and by accepting the privacy settings you will be giving the opportunity to be sent information about the duration of the plugin, as well as other products of the company.  In no case the information will be destined to third parties or purposes that are not informative about this plugin or other plugins of the company.
If you have any questions, doubts or suggestions please do not hesitate to contact us.";

// About us.
$string['about'] = "About Us";
$string['aboutus'] = "At Eurecat Academy, we bring together a multidisciplinary team of experts with a passion for improving people's competencies. Our team's expertise ranges from instructional design to technical development to offer solutions that optimize our partners' training activities. Eurecat Academy is the training department of Eurecat Technology Centre";
$string['aboutus1'] = "Eurecat is a research and technology centre headquartered in Barcelona, Spain, that provides advanced technology, innovation, and training services to over 1,500 companies and organizations. Eurecat is considered one of the leading European research and technology centres, being the second largest private non-profit organisation in Southern Europe.";
$string['aboutus2'] = "Eurecat Academy collaborates with public and private training and labour organizations in a very broad business spectrum as a full-fledged training, content creation, and education consultancy services provider. Eurecat Academy boasts a specialized innovation group that focuses on improving knowledge transfer and evaluation processes through innovative ICT interfaces, adaptive and motivational methodologies, learning analytics and personal training environments. We combine technological and pedagogical knowledge and professional experience to create high-performance training activities, tools and resources, and to develop educational plans and training itineraries.";
$string['aboutus3'] = "Our overall purpose is to offer solutions with the ability to generate a positive impact on individuals and entities, providing them with effective tools to optimize their training activities. We aspire for everyone to unleash their maximum potential and contribute to personal and professional progress, for their own well-being and their contribution to social development.";

// No active.
$string['noactive'] = 'Thank you for choosing us and using our products. You have exceeded the time of the free version, if you wish to get the product in its premium version please contact us.';

// Eurecat.
$string['developed'] = "Devloped by:";
$string['eurecat'] = "Eurecat Academy";
$string['eurecatorg'] = "Eurecat.org";

// Premium.
$string['premium'] = '* Upgrade to Sentiment Checker - Premium';
$string['getpremium'] = '* Get Premium';
$string['premiumpage'] = 'Eurecat.Lab';
$string['keepquarentine'] = '* Add the posibility to change negative the threshold';
$string['removequarentine'] = '* Add the posibility to change positive the threshold';
$string['nopubli'] = '* No advertising';
$string['desblockanalytic'] = '* Unblocking the "Analytics" tab';
$string['exportdata'] = '* Export results';

