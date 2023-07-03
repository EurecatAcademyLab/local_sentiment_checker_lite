# sentiment_checker

Describe the plugin.

Text analysis tries to find the suggestiveness of a text. This process can be done from a suggestiveness dictionary, where each word is weighted as negative or positive; or from more complex machine learning practices.


More details.

In order to represent the analyzed Posts in a simple and graphical way, we have created a local Plugin that can be installed on any Moodle platform.
It automatically reads the database every time we use it, and displays the posts in order of modification/creation. At the moment, the module reads the posts from spring to spring to avoid overloads, in the future, it is expected to read automatically in a background process that will avoid the need to load the program to read the new posts.

This plugin consists of 3 parts: a form to modify parameters, a tab with the posts and one with analysis.

Posts
The posts will be displayed in 3 different colors, depending on whether their polarity is negative, neutral or positive according to our thresholds. Also the detected language, the polarity and a link to the original discussion of the post, for more context.

Selection menu
One of the objectives was to know the general sentiment of a course, therefore, we have also created a course selector to show only the posts of this one.
As many times we will want to see what has been detected as negative, we have put a checkbox to display only these posts in the tab.
As there can be problems at the time of translation, we can also make it show us this one.
As we have said, the polarization goes from [-1, 1] and the thresholds of negativity and positivity are -0.3 and 0.3 respectively. The colors shown are taking into account these parameters, but we wanted to incorporate the possibility of modifying them to be more or less restrictive.

Analysis
We have also incorporated an analysis tab, also linked to the selector menu, which shows the overall average sentiment of the platform, and in the case of selecting a specific course, the average sentiment in the course.
It also shows a pie chart of the number of charts in the different languages as well as the polarization result.

## Installing via uploaded ZIP file ##

1. Log in to your Moodle site as an admin and go to _Site administration >
   Plugins > Install plugins_.
2. Upload the ZIP file with the plugin code. You should only be prompted to add
   extra details if your plugin type is not automatically detected.
3. Check the plugin validation report and finish the installation.

## Installing manually ##

The plugin can be also installed by putting the contents of this directory to

    {your/moodle/dirroot}/local/sentiment_checker

Afterwards, log in to your Moodle site as an admin and go to _Site administration >
Notifications_ to complete the installation.

Alternatively, you can run

    $ php admin/cli/upgrade.php

to complete the installation from the command line.

## License ##

 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <https://www.gnu.org/licenses/>.
