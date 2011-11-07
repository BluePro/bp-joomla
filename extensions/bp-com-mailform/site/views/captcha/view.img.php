<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class BPMailFormViewCaptcha extends JView {

	function display($tpl = null) {
		global $mainframe;
		
		$text = $this->_getCaptcha();
		$mainframe->setUserState('bpmailform', array('captcha', $text));
		
		$document = JFactory::getDocument();
		$document->setMimeEncoding('application/pdf');
	}
	
	function _getCaptcha() {
		return rand(10000, 99999);
	}

}