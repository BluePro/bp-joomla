<?php
defined('_JEXEC') or die('Restricted access');

class modBPLogoHelper {

	function getImage(&$params) {
		jimport('joomla.filesystem.file');
		
		$image = new StdClass();
		$menu_image = null;
		
		$menu =& JSite::getMenu();
		$menu_item = &$menu->getActive();
		
		// Get menu image or try default
		if ($menu_item) {
			$menu_params = new JParameter($menu_item->params);
			$menu_image = $menu_params->get('menu_image');
			if ($menu_image == -1 || !JFile::exists(JPATH_BASE . DS . 'images' . DS . 'stories' . DS . $menu_image)) {
				$menu_image = null;
			}
		}
		if (!$menu_image) {
			$menu_image = $params->get('default_image', '');
			if ($menu_image && !JFile::exists(JPATH_BASE . DS . 'images' . DS . 'stories' . DS . $menu_image)) {
				$menu_image = null;
			}
		}
		if (!$menu_image) return false;
		
		$image->name = $menu_image;
		$image->uri = JURI::base(true) . '/images/stories/' . $menu_image;
		$image->path = JPATH_BASE . DS . 'images' . DS . 'stories' . DS . $menu_image;
		
		// Calculate maximal width and height
		$width = $params->get('width');
		$height = $params->get('height');
		$size = getimagesize($image->path);
		if (!($width && $height)) {
			$image->width = $size[0];
			$image->height = $size[1];
		} else {
			if (!$width || $size[0] < $width) {
				$width = $size[0];
			}
			if (!$height || $size[1] < $height) {
				$height = $size[1];
			}
			$coef = $size[0] / $size[1];
			$image->height = min($height, (int) ($width / $coef));
			$image->width = (int) ($image->height * $coef);
		}
		
		return $image;
	}
}

