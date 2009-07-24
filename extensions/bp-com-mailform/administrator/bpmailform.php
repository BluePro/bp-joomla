<?php
defined('_JEXEC') or die('Restricted access');

require_once(JPATH_COMPONENT . DS . 'controller.php');

$controller = new BPMailformController();
$controller->execute(JRequest::getCmd('task', 'display'));
$controller->redirect();
