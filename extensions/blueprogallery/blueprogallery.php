<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @plugin BluePro Gallery
 * @copyright Copyright (C) Ondřej Hlaváč 2008 http://ondrej.hlavacovi.net
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgContentBlueProGallery extends JPlugin {

	var $_plugin = null;
	var $_params = null;

	function __construct(&$subject, $params) {
		$this->_plugin = JPluginHelper::getPlugin('content', 'blueprogallery');
		$this->_params = new JParameter($this->_plugin->params);
		
		parent::__construct($subject, $params);
	}
	
	function onPrepareContent(&$article, &$params, $limitstart) {
		$matches = array();
		$replace = array();
		
		$width = intval($this->_params->get('thumbnail_width', 120));
		$height	= intval($this->_params->get('thumbnail_height', 120));
		$quality = intval($this->_params->get('thumbnail_quality', 80));
		if ($width < 1 || $width > 1280) $width = 120;
		if ($height < 1 || $height > 1280) $height = 120;
		if ($quality < 1 || $quality > 100) $quality = 80;
		$baseurl = trim(JURI :: base(), DS);
		
		if (preg_match_all('~{gallery}(.*?){/gallery}~si', $article->text, $matches, PREG_SET_ORDER)) {
			
			$document = JFactory::getDocument();
			$document->addScript($baseurl . '/media/blueprogallery/js/mootools.js');
			$document->addScript($baseurl . '/media/blueprogallery/js/slimbox.js');
			$document->addStyleSheet($baseurl . '/media/blueprogallery/css/slimbox.css');
			
			foreach ($matches as $index => $matchset) {
				$path = JPath::clean(JPATH_SITE . DS . $this->_params->get('folder', 'images/gallery') . DS . $matchset[1] . DS);
				$images = glob($path . '*.jpg');
				if (!$images) continue;
				
				sort($images);
				$html = '<div class="plug_blueprogallery">';
				foreach ($images as $image) {
					$url = $baseurl . JPath::clean(DS . $this->_params->get('folder', 'images/gallery') . DS . $matchset[1] . DS . strrchr($image, DS));
					$html .= sprintf('<a href="%s" rel="lightbox[blueprogallery_%d]"><img src="%s/media/blueprogallery/thumbnail.php?img=%s&width=%d&height=%d&quality=%d" alt="Gallery" /></a>',
						$url, $index, $baseurl, urlencode($image), $width, $height, $quality);
				}
				$html .= '<div class="cleaner">&nbsp;</div></div>';
				
				$replace[$matchset[0]] = $html;
			}
			$article->text = strtr($article->text, $replace);
		} else return true;
	}
	
}
?>