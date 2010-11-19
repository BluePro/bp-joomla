<?php
defined('_JEXEC') or die('Restricted access');

echo sprintf('<div class="com_search%s">', $this->params->get('pageclass_sfx'));

if ($this->params->get('show_page_title', 1)) {
	sprintf('<h1>%s</h1>', $this->escape($this->params->get('page_title')));
}

echo $this->loadTemplate('form');

if (!$this->error && count($this->results) > 0) {
	echo $this->loadTemplate('results');
} else {
	echo $this->loadTemplate('error');
}

echo '</div>';