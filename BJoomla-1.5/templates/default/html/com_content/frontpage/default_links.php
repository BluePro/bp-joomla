<?php
defined('_JEXEC') or die('Restricted access');
echo sprintf('<div class="box_links%s">', $this->params->get('pageclass_sfx'));
echo sprintf('<strong>%s</strong>', JText::_('More Articles...'));
echo '<ul>';
foreach ($this->links as $link) {
	echo sprintf('<li><a href="%s">%s</a></li>',
		JRoute::_(ContentHelperRoute::getArticleRoute($link->slug, $link->catslug, $link->sectionid)), $link->title;);
}
?>
</ul>
</div>