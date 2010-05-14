<?php
defined('_JEXEC') or die('Restricted access');

$cparams = JComponentHelper::getParams('com_media');

if ($this->params->get('show_page_title', 1)) {
	echo sprintf('<h1>%s</h1>', $this->escape($this->params->get('page_title')));
}

if (($this->params->def('show_description', 1) && $this->section->description) ||
	($this->params->def('show_description_image', 1) && $this->section->image)) {
	echo '<div>';
	
	if ($this->params->get('show_description_image') && $this->section->image) {
		echo sprintf('<img src="%s/%s/%s" class="content_%s" alt="%s" />',
			$this->baseurl, $cparams->get('image_path'), $this->section->image, $this->section->image_position, $this->params->get('page_title'));
	}
	
	if ($this->params->get('show_description') && $this->section->description) {
		echo $this->section->description;
	}
		
	if ($this->params->get('show_description_image') && $this->section->image) {
		echo '<div class="cleaner">&nbsp;</div>';
	}
	
	echo '</div>';
}

if ($this->params->get('show_categories', 1)) {
	echo '<ul>';
	
	foreach ($this->categories as $category) {
		if (!$this->params->get('show_empty_categories') && !$category->numitems) continue;
		echo sprintf('<li><a href="%s">%s</a>', $category->link, $this->escape($category->title));
		
		if ($this->params->get('show_cat_num_articles')) {
			echo sprintf('&nbsp;<span>(%d %s)</span>', $category->numitems, $category->numitems == 1 ? JText::_('item') : JText::_('items'));
		}
		
		if ($this->params->def('show_category_description', 1) && $category->description) {
			echo sprintf('<br />%s', $category->description);
		}
		
		echo '</li>';
	}
	
	echo '</ul>';
}