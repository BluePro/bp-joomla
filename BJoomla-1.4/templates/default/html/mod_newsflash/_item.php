<?php
defined('_JEXEC') or die('Restricted access');

if ($params->get('item_title')) {
	if ($params->get('link_titles') && $item->linkOn != '')
		echo sprintf('<h3><a href="%s">%s</a></h3>', JRoute::_($linkOn), $item->title);
	else
		echo sprintf('<h3>%s</h3>', $item->title);
}

if (!$params->get('intro_only')) echo $item->afterDisplayTitle;

echo $item->beforeDisplayContent;
echo JFilterOutput::ampReplace($item->text);

if (isset($item->linkOn) && $item->readmore && $params->get('readmore'))
	echo sprintf('<div class="box_readmore%s"><a href="%s" title="%s">%s</a></div>',
		$params->get('moduleclass_sfx'), $item->linkOn, $item->title, JText::_('Read more...'));