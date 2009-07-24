<?php
defined('_JEXEC') or die('Restricted access');

$template = sprintf('<img src="%s" width="%d" height="%d" alt="%s" />',	$image->uri, $image->width, $image->height, $image->name);
if ($link) {
	$template = sprintf('<a href="%s">%s</a>', $link, $template);
}
$template = sprintf('<div class="mod_bplogo%s">%s</div>', $params->get('moduleclass_sfx'), $template);

echo $template;