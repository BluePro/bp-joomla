<?php
defined('_JEXEC') or die('Restricted access');

echo sprintf('<div class="box_links%s"><h2>%s</h2><ul>',
	$this->params->get('pageclass_sfx'), JText::_('More Articles...'));

foreach ($this->links as $link) {
	echo sprintf('<li><a href="%s">%s</a></li>',
		JRoute::_(ContentHelperRoute::getArticleRoute($link->slug, $link->catslug, $link->sectionid)), $this->escape($link->title));
}

echo '</ul></div>';
