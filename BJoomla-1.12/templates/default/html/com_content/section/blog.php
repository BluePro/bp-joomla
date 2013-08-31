<?php
defined('_JEXEC') or die('Restricted access');

$cparams = JComponentHelper::getParams('com_media');

echo sprintf('<div class="com_content%s">', $this->params->get('pageclass_sfx'));

// Section title
if ($this->params->get('show_page_title', 1)) {
	echo sprintf('<h1>%s</h1>', $this->escape($this->params->get('page_title')));
}

// Section description
if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) {
	echo sprintf('<div class="box_description%s">', $this->params->get('pageclass_sfx'));
	if ($this->params->get('show_description_image') && $this->section->image) {
		echo sprintf('<img src="%s/%s/%s" />', $this->baseurl, $cparams->get('image_path'), $this->section->image);
	}
	if ($this->params->get('show_description') && $this->section->description) {
		echo $this->section->description;
	}
	echo '</div>';
}

// Leading articles
for ($i = $this->pagination->limitstart, $j = 0; $i < $this->total && $j < $this->params->def('num_leading_articles', 1); $i++, $j++) {
	echo sprintf('<div class="box_leadingarticles%s">', $this->params->get('pageclass_sfx'));
	$this->item = $this->getItem($i, $this->params);
	echo $this->loadTemplate('item');
	echo '</div>';
}

// Intro texts
$introcount = $this->params->def('num_intro_articles', 4);
$columncount = $this->params->def('num_columns', 2);
if ($columncount < 1) $columncount = 1;
$rowcount = ceil($introcount / $columncount);

echo sprintf('<div class="box_introtexts%s">', $this->params->get('pageclass_sfx'));
while ($i < $this->total) {
	echo sprintf('<div class="box_column%s">', $this->params->get('pageclass_sfx'));
	for ($j = 0; $i < $this->total && $j < $rowcount; $i++, $j++) {
		$this->item = $this->getItem($i, $this->params);
		echo $this->loadTemplate('item');
	}
	echo '</div>';
}
echo '</div>';

// More links
$linkscount = $this->params->def('num_links', 4);
if ($linkscount && $i < $this->total) {
	$this->links = array_slice($this->items, $i - $this->pagination->limitstart, $i - $this->pagination->limitstart + $linkscount);
	echo $this->loadTemplate('links');
}

// Pagination
if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) {
	echo $this->pagination->getPagesLinks();
	if ($this->params->def('show_pagination_results', 1)) {
		echo $this->pagination->getPagesCounter();
	}
}

echo '</div>';