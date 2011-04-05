<?php
defined('_JEXEC') or die('Restricted access');

echo sprintf('<div class="mod_banners%s">', $params->get('moduleclass_sfx'));

if ($headerText) {
	echo sprintf('<p>%s</p>', $headerText);
}

foreach($list as $item) {
	echo sprintf('<div class="item%s">%s</div>',
		$params->get('moduleclass_sfx'), modBannersHelper::renderBanner($params, $item));
}

if ($footerText) {
	echo sprintf('<p>%s</p>', $footerText);
}
?>
</div>