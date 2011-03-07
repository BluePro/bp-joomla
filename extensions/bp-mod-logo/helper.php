<?php
defined('_JEXEC') or die('Restricted access');

class modBPLogoHelper {

	function getImage(&$params) {
		jimport('joomla.filesystem.file');
		
		$base_path = JPATH_BASE . DS . 'images' . DS . 'stories' . DS;
		
		$image = new StdClass();
		$images = array();
		$image_path = null;
		$image_folder = null;
		
		$menu =& JSite::getMenu();
		$menu_item =& $menu->getActive();
		
		// Get menu image
		if ($menu_item) {
			$menu_params = new JParameter($menu_item->params);
			$image_path = $menu_params->get('menu_image');
			if ($image_path == -1 || !JFile::exists($base_path . $image_path)) {
				$image_path = null;
			} else {
				$images[] = $image_path;
			}
		}
		// Get default image
		if (!$image_path) {
			$image_path = $params->get('default_image', -1);
			if ($image_path == -1 || !JFile::exists($base_path . $image_path)) {
				$image_path = null;
			} else {
				$images[] = $image_path;
			}
		}
		// Get default folder and initiate images
		if (!$image_path) {
			$image_folder = $params->get('default_folder', -1);
			if ($image_folder != -1 && JFolder::exists($base_path . $image_folder)) {
				foreach (JFolder::files($base_path . $image_folder, '.', false, false, array('.htm, .html')) as $image_path) {
					$images[] = $image_folder . DS . $image_path;
				}
			}
		}
		
		if (!$images) return true;
		foreach ($images as $image_path) {
			$image->uri[] = JURI::base(true) . '/images/stories/' . str_replace(DS, '/', $image_path);
		}
		
		// Calculate maximal width and height
		$width = $params->get('width');
		$height = $params->get('height');
		$size = getimagesize($base_path . $images[0]);
		if (!$width && !$height) {
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

