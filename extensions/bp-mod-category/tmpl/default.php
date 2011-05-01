<?php
defined('_JEXEC') or die('Restricted access');
echo sprintf('<div class="%s">', $params->get('moduleclass_sfx'));
?>
<ul>
<?php
foreach ($list as $item) {
	echo sprintf('<li><a href="%s">%s</a></li>', $item->link, $item->text);
}
?>
</ul>
</div>