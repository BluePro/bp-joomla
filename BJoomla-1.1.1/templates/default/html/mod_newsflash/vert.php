<?php
defined('_JEXEC') or die('Restricted access');

echo sprintf('<div class="mod_newsflash%s">', $params->get('moduleclass_sfx'));
for ($i = 0, $n = count($list); $i < $n; $i ++) {
	modNewsFlashHelper::renderItem($list[$i], $params, $access);
	if ($n > 1 && (($i < $n - 1) || $params->get('showLastSeparator')))
		echo sprintf('<div class="article_separator%s">&nbsp;</div>', $params->get('moduleclass_sfx'));
}
echo '</div>';
?>