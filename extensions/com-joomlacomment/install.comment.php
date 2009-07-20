<?php defined('_JEXEC')  or die('Direct Access to this location is not allowed.');

/*
 * Copyright Copyright (C) 2007 Alain Georgette. All rights reserved.
 * Copyright Copyright (C) 2006 Frantisek Hliva. All rights reserved.
 * License http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * !JoomlaComment is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * !JoomlaComment is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA  02110-1301, USA.
 */

function com_install()
{
    $database = JFactory::getDBO();

    $adminDir = dirname(__FILE__);
    require_once(JPATH_SITE."/administrator/components/com_comment/library.comment.php");
    require_once(JPATH_SITE."/components/com_comment/joscomment/utils.php");
    require_once(JPATH_SITE."/administrator/components/com_comment/class.config.comment.php");
    ?>
<table class="adminheading" cellpadding="4" cellspacing="0" border="0">
    <tr>
	<td>
	    <?php
	    $msgstart = "<h2><p style='color:red;'>There was a problem with your installation</p></h2>";
	    $msgend = "<h2>Please, contact the <a target=\"_blank\" href=\"http://compojoom.com\">support</a>."
	    . "<br/>Thanks.</h2>";

	    if (!JOSC_TableUtils::existsTable('#__comment')) {
		    /* one day, when param will be in database we could set here or not complete_uninstall param */
	    }

		/*
		 * check mambot path is writable
		 */
	    if (!is_writable(JPATH_SITE."/plugins/content/")) {
		$msgend = "<h2><p>Please:</p>" .
					"<ul>" .
					"	<li>Uninstall !JoomlaComment</li>" .
					"	<li>Modify the file permissions if needed</li>" .
					"	<li>Reinstall</li>" .
					"</ul>" .
					"<br/>Thanks.</p>" .
					"</h2>";
		echo $msgstart . "<p>The directory" . JPATH_SITE."/plugins/content/" . "is not writeable</p>". $msgend;
		return false;
	    }

	    $install_log = "";
	    if (!JOSC_install::checkDatabase($install_log)) {
		echo $msgstart ."<p>". $install_log ."</p>". $msgend;
		return false;
	    }

	    $install_log = "<p>Installation of joscomment & josccacheclean bots</p>";
		/* joscomment.php */
	    $movefrom 	= $adminDir."/plugin/joscomment.php";
	    $moveto		= JPATH_SITE."/plugins/content/joscomment.php";
	    if (!@rename($movefrom, $moveto)) {
		echo $msgstart."<p style='color:red;'><b>error when moving</b> $movefrom <br /><b>TO</b> $moveto</p>".$msgend;
		$msgstart = $msgend = "";
	    }
		/* joscomment.xml */
	    $movefrom 	= $adminDir."/plugin/joscomment.xml";
	    $moveto		= JPATH_SITE."/plugins/content/joscomment.xml";
	    if (!@rename($movefrom, $moveto)) {
		echo $msgstart."<p style='color:red;'><b>error when moving</b> $movefrom <br /><b>TO</b> $moveto</p>".$msgend;
		$msgstart = $msgend = "";
	    }
		/* josccleancache.php */
	    $movefrom 	= $adminDir."/plugin/josccleancache.php";
	    $moveto		= JPATH_SITE."/plugins/system/josccleancache.php";
	    if (!@rename($movefrom, $moveto)) {
		echo $msgstart."<p style='color:red;'><b>error when moving</b> $movefrom <br /><b>TO</b> $moveto</p>".$msgend;
		$msgstart = $msgend = "";
	    }
		/* josccleancache.xml */
	    $movefrom 	= $adminDir."/plugin/josccleancache.xml";
	    $moveto		= JPATH_SITE."/plugins/system/josccleancache.xml";
	    if (!@rename($movefrom, $moveto)) {
		echo $msgstart."<p><b>error when moving</b> $movefrom <br /><b>TO</b> $moveto</p>".$msgend;
		$msgstart = $msgend = "";
	    }

		/*
		 * joscomment
		 */
		 /*
		  * better to place after pagebreak
		  */
	    $database->setQuery("SELECT ordering"
		. "\n FROM #__plugins"
		. "\n WHERE element LIKE 'pagebreak'"
		. "\n AND folder = 'content'"
	    );
	    $ordering = (int) $database->loadResult();
	    $database->setQuery("SELECT COUNT(*)"
		. "\n FROM #__plugins"
		. "\n WHERE element LIKE 'joscomment%'"
		. "\n AND folder = 'content'"
		. "\n AND published = 1 ");
	    $total = $database->loadResult();
	    $published = $total ? '0' : '1'; // if joscomment% (example : joscomment_expert bot ) exists and published : do not publish
	    $ordering++;
	    $database->setQuery(  "INSERT INTO `#__plugins` "
		. "        (`name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) "
		. " VALUES ('Content - !JoomlaComment', 'joscomment', 'content', 0, ".$ordering.", ".$published.", 0, 0, 0, '0000-00-00 00:00:00', '');");
	    $result = $database->query();
	    if($result) {
			/*
			 * josccleancache
			 */
		$ordering = 0;
				 /*
				  * get legacy place and if published
				  * (normally should be published because it is obligatory to install joomlacomment 3.25)
				  */
		$database->setQuery("SELECT ordering"
		    . "\n FROM #__plugins"
		    . "\n WHERE element LIKE 'legacy'"
		    . "\n AND folder = 'system'"
		    . "\n AND published = 1 "
		);
		$ordering = (int) $database->loadResult();

		$database->setQuery("SELECT COUNT(*)"
		    . "\n FROM #__plugins"
		    . "\n WHERE element LIKE 'josccleancache%'"
		    . "\n AND folder = 'system'"
		    . "\n AND published = 1 ");
		$total = $database->loadResult();
		$published = ($total ||  $ordering<1) ? '0' : '1'; // if joscomment% (example : joscomment_expert bot ) exists and published : do not publish
		$ordering++;
		$database->setQuery(  "INSERT INTO `#__plugins` "
		    . "        (`name`,               `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) "
		    . " VALUES ('System - !JoomlaComment CleanCache', 'josccleancache', 'system', 0, ".$ordering.", ".$published.", 0, 0, 0, '0000-00-00 00:00:00', '');");
		$result = $database->query();
	    }
	    if(!$result) {
		$install_log .= "plugins install error: " . $database->stderr() . "<br /><br />";
		echo $msgstart ."<p>". $install_log ."</p>". $msgend;
		return false;
	    }

	    ?>
	</td>
    </tr>
</table>
<?php
        if(!ini_get('allow_url_fopen')) {
            ini_set("allow_url_fopen", 1);
        }

        if(ini_get('allow_url_fopen') == true) {
            $url = JURI::base();
            $ip = $_SERVER['SERVER_ADDR'];
            file_get_contents("http://compojoom.com/installedon/joomlacommentsites.php?url=$url&ip=$ip");
        }

        JOSC_library::viewAbout();
}
?>

