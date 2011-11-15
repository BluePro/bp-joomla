<?php
defined('_JEXEC') or die('Restricted access');

if ($this->params->def('show_page_title', 1)) {
	echo sprintf('<h1>%s</h1>', $this->escape($this->params->get('page_title')));
} 

if (($this->params->def('image', -1) != -1) || $this->params->def('show_comp_description', 1)) {
	echo sprintf('<div class="box_intro%s">%s%s</div>',
		$this->params->get('pageclass_sfx'), empty($this->image) ? '' : $this->image, $this->params->get('comp_description'));
}

echo sprintf('<ul class="box_content%s">', $this->params->get('pageclass_sfx'));
foreach ($this->categories as $category) {
	echo sprintf('<li><a href="%s">%s</a>&nbsp;<span>(%s)</span></li>',
		$category->link, $this->escape($category->title), $category->numlinks);
}
echo '</ul>';