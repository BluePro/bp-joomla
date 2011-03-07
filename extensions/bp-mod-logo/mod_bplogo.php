<?php
defined('_JEXEC') or die('Restricted access');

require_once(dirname(__FILE__). DS . 'helper.php');

$link = $params->get('link');
$timeout = $params->get('timeout', 4);
$image = modBPLogoHelper::getImage($params);

if (!$image) {
	return false;
}

require(JModuleHelper::getLayoutPath('mod_bplogo'));