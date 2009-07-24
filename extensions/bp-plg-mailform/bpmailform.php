<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @plugin BP Mailform
 * @copyright Copyright (C) Ondřej Hlaváč 2009 http://ondrej.hlavacovi.net
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

class plgContentBPMailform extends JPlugin {

	function onPrepareContent(&$article, &$params, $limitstart) {
		$script = sprintf('
			function validateForm(form) {
				for (var i = 0; i < form.length; i++) {
					if (form[i].name && form[i].name.indexOf("mailform[#") == 0 && !form[i].value) {
						form[i].focus();
						alert("%s");
						return false;
					}
				}
				return true;
			}', JText::_('Nejsou vyplněny všechny povinné položky!'));

		
		$document = JFactory::getDocument();
		$document->addScriptDeclaration($script);
	}

}