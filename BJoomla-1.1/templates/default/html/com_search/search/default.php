<?php
defined('_JEXEC') or die('Restricted access');

if ($this->params->get('show_page_title'))
	sprintf('<h2 class="com_heading%s">%s</h2>',
		$this->params->get('pageclass_sfx'), $this->escape($this->params->get('page_title')));

if (!$this->error && count($this->results) > 0) echo $this->loadTemplate('results');
else echo $this->loadTemplate('error');

echo $this->loadTemplate('form');
?>