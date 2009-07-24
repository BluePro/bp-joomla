<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class BPMailFormController extends JController {
	
	function save()	{
		$data = JRequest::getVar('mailform', array());
		$params = JComponentHelper::getParams('com_bpmailform');
		$message = $params->get('prefix');
		$error = '';
		
		// Compose mail and check values
		if (!count($data)) {
			$error = JText::_('Formulář neobsahuje žádná data!');
		} else {
			foreach ($data as $item_name => $item) {
				if (!$item && strpos($item_name, '#') === 0) {
					$error = JText::_('Nejsou vyplněny všechny povinné položky!');
					break;
				} else {
					$message .= sprintf("%s: %s\n", htmlspecialchars($item_name), htmlspecialchars($item));
				}
			}
		}
		
		// Send mail
		if (!$error && !JUtility::sendMail($params->get('mailfrom'), '', $params->get('mailto'), $params->get('subject'), $message)) {
			$error = JText::_('Formulář se nepodařilo odeslat!');
		}
		
		// Solve errors
		if ($error) {
			$return = @$_SERVER['HTTP_REFERER'];
			if (empty($return) || !JURI::isInternal($return)) {
				$return = JURI::base();
			}
			$this->setRedirect($return, $error, 'error');
		} else {
			$this->setRedirect($params->get('confirmation'));
		}
	}

}
