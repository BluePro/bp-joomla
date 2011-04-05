<?php
defined('_JEXEC') or die('Restricted access');

function modChrome_header($module, &$params, &$attribs) {
	$header_level = empty($attribs['header_level']) ? 2 : intval($attribs['header_level']);
	if (!empty($module->content)) {
		if ($module->showtitle) echo sprintf('<h%d>%s</h%d>', $header_level, $module->title, $header_level);
		echo $module->content;
	}
}