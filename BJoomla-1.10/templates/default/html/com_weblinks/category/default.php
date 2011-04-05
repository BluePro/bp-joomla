<?php
defined('_JEXEC') or die('Restricted access');

if ($this->params->def('show_page_title', 1)) {
	echo sprintf('<h1>%s</h1>', $this->escape($this->params->get('page_title')));
} 

if (!empty($this->category->image) || !empty($this->category->description)) {
	echo sprintf('<div class="box_intro%s">%s%s</div>',
		$this->params->get('pageclass_sfx'), empty($this->category->image) ? '' : $this->category->image, $this->category->description);
}

echo $this->loadTemplate('items');

if ($this->params->get('show_other_cats', 1)) {
	echo sprintf('<ul class="box_content%s">', $this->params->get('pageclass_sfx'));
	foreach ($this->categories as $category) {
		echo sprintf('<li><a href="%s">%s</a>&nbsp;<span>(%s)</span></li>',
			$category->link, $this->escape($category->title), $category->numlinks);
	}
	echo '</ul>';
}
