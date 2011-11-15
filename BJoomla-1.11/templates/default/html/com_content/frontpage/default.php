<?php
defined('_JEXEC') or die('Restricted access');

echo sprintf('<div class="com_content%s">', $this->params->get('pageclass_sfx'));

if ($this->params->get('show_page_title', 0)) {
	echo sprintf('<h1>%s</h1>', $this->escape($this->params->get('page_title')));
}

if ($this->params->def('num_leading_articles', 1)) {
	for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')) && $i < $this->total; $i++) {
		$this->item = $this->getItem($i, $this->params);
		echo $this->loadTemplate('item');
	}
} else {
	$i = $this->pagination->limitstart;
}

$num_intro_articles = $this->params->get('num_intro_articles', 4);
$intro_articles = ($num_intro_articles < $this->total - $i) ? $num_intro_articles : $this->total - $i;
if ($intro_articles) {
	$columns = $this->params->def('num_columns', 2);
	if (!$columns) $columns = 1;
	$rows = ceil($intro_articles / $columns);
	for ($j = 0; $j < $columns && $i < $this->total; $j++) {
		echo sprintf('<div class="box_column%s">', $this->params->get('pageclass_sfx'));
		for ($k = 0; $k < $rows && $i < $this->total; $k++, $i++) {
			$this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('item');
		}
		echo '</div>';
	}
}

$links = $this->params->def('num_links', 4);
if ($links && $i < $this->total) {
	$this->links = array_slice($this->items, $i - $this->pagination->limitstart, $i - $this->pagination->limitstart + $links);
	echo $this->loadTemplate('links');
}

if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) {
	echo $this->pagination->getPagesLinks();
	if ($this->params->def('show_pagination_results', 1)) {
		echo $this->pagination->getPagesCounter();
	}
}
echo '</div>';