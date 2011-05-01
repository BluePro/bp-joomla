<?php
defined('_JEXEC') or die('Restricted access');

require_once (dirname(__FILE__). DS . 'helper.php');

$list = modCategoryHelper::getList($params);
require(JModuleHelper::getLayoutPath('mod_category'));