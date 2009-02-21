<?php
defined('_JEXEC') or die('Restricted access');

echo sprintf('<div class="mod_bluepromap%s" id="map_%d"></div>', $params->get('moduleclass_sfx'), $map_id);