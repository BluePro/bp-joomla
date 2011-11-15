<?php
defined('_JEXEC') or die('Restricted access');

$cparams = JComponentHelper::getParams('com_media');

if ($this->params->get('show_page_title', 1)) {
	echo sprintf('<h1>%s</h1>', $this->escape($this->params->get('page_title')));
}

if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) {
	echo '<div>';
	
	if ($this->params->get('show_description_image') && $this->category->image) {
		echo sprintf('<img src="%s/%s/%s" class="content_%s" alt="%s" />',
			$this->baseurl, $cparams->get('image_path'), $this->category->image, $this->category->image_position, $this->params->get('page_title'));
	}
	
	if ($this->params->get('show_description') && $this->category->description) {
		echo $this->category->description;
	}
		
	if ($this->params->get('show_description_image') && $this->category->image) {
		echo '<div class="cleaner">&nbsp;</div>';
	}
	
	echo '</div>';
}

$this->items = $this->getItems();
echo $this->loadTemplate('items');

if ($this->access->canEdit || $this->access->canEditOwn) {
	echo JHTML::_('icon.create', $this->category, $this->params, $this->access);
}