<?php

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

/*
 * Copyright Copyright (C) 2007 Alain Georgette. All rights reserved.
 * License http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * Mod_comments of !JoomlaComment is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Mod_comments of !JoomlaComment is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA  02110-1301, USA.
 */


if (!file_exists(JPATH_SITE."/administrator/components/com_comment/class.config.comment.php")) {
  		echo ("<font color='red'>Please install the joomlacomment component first.</font>");
  		
} else {
		
	global $option;
	require_once(JPATH_SITE."/modules/mod_comments/mod_comments/mod_comments.class.php");
	
	$mod_comments = new JOSC_mod_comments($params, $module); 

	$html = '';
	switch ($mod_comments->_orderby) {
	    /* M O S T   C O M M E N T E D */
	    case 'mostcommented':
			$html = $mod_comments->mod_commentsGetMostCommented($params);   	
			break;
			
		/* O T H E R S   C O M M E N T S */
	    default :
			$html = $mod_comments->mod_commentsGetOthers($params);  
			break;
	}

	if ($mod_comments->_overlay) {
			$mod_comments->loadOverlib();
	}

?>
	<div class="mod_comments<?php echo $mod_comments->_moduleclass_sfx; ?>" <?php echo $mod_comments->_overflow;?> > <!-- style="overflow: hidden; width: 100%"> -->
		<?php echo $html; ?> 
	</div>
<?php
	unset($mod_comments);
}

?>


