<?php
defined('_JEXEC') or die('Restricted access');

$flashnum = rand(0, $items - 1);
$item = $list[$flashnum];

echo sprintf('<div class="mod_newsflash%s">', $params->get('moduleclass_sfx'));
modNewsFlashHelper::renderItem($item, $params, $access);
echo '</div>';