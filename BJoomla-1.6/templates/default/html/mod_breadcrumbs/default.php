<?php
defined('_JEXEC') or die('Restricted access');

echo sprintf('<div class="mod_breadcrumbs%s">', $params->get('moduleclass_sfx'));
$output = array();

foreach ($list as $item) {
	if (empty($item->link)) {
		$output[] = $item->name;
	} else {
		$output[] = sprintf('<a href="%s">%s</a>', $item->link, $item->name);
	}
}

echo implode(' ' . $separator . ' ', $output);
?>
</div>