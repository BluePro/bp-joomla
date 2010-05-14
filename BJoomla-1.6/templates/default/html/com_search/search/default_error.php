<?php
defined('_JEXEC') or die('Restricted access');
echo sprintf('<div class="error%s">%s</div>',
	$this->params->get('pageclass_sfx'), $this->escape($this->error));