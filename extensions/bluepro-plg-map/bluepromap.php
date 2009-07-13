<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @plugin BluePro Map
 * @copyright Copyright (C) Ondřej Hlaváč 2008 http://ondrej.hlavacovi.net
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

class plgContentBlueProMap extends JPlugin {

	var $_plugin = null;
	var $_params = null;

	function __construct(&$subject, $params) {
		$this->_plugin = JPluginHelper::getPlugin('content', 'bluepromap');
		$this->_params = new JParameter($this->_plugin->params);
		
		parent::__construct($subject, $params);
	}
	
	function onPrepareContent(&$article, &$params, $limitstart) {
		$matches = array();
		$replace = array();
		$script = '';
		$trim_chars = " \t\n\r\0\x0B\"";
		
		// Initialize params
		$api_key = $this->_params->get('api_key', '');
		
		if (!$api_key) return false;
		
		// {map zoom="14"}[x;y][x;y]{/map}
		if (preg_match_all('~{map\s*(.*?)}(([^{]*){/map})*~si', $article->text, $matches, PREG_SET_ORDER)) {
			$document = JFactory::getDocument();
			$document->addScript('http://maps.google.com/maps?file=api&amp;v=2&amp;key=' . $api_key);
			$script = "function mapInitialize() {\n if (GBrowserIsCompatible()) {\n";
			
			foreach ($matches as $index => $matchset) {
				
				// Setting user params
				$user_params = array();
				$user_params['latitude'] = floatval($this->_params->get('latitude', ''));
				$user_params['longitude'] = floatval($this->_params->get('longitude', ''));
				$user_params['zoom'] = intval($this->_params->get('zoom', '14'));
				$user_params['type'] = $this->_params->get('type', 'G_NORMAL_MAP');
				$user_params['type_control'] = (bool) $this->_params->get('type_control', '1');
				$user_params['controll'] = $this->_params->get('controll', 'small');
				$user_params['marker'] = (bool) $this->_params->get('marker', '1');
				$user_params['draging'] = (bool) $this->_params->get('draging', '1');
				$user_params['mousewheel'] = (bool) $this->_params->get('mousewheel', '1');
				$user_params['width'] = $this->_params->get('width', '');
				$user_params['height'] = $this->_params->get('height', '300px');

				if (!empty($matchset[1])) {
					$article_params = explode('" ', $matchset[1]);
					foreach ($article_params as $param) {
						list($name, $value) = explode('="', $param);
						switch (trim($name, $trim_chars)) {
							case 'latitude':
								$user_params['latitude'] = floatval($value);
								break;
							case 'longitude':
								$user_params['longitude'] = floatval($value);
								break;
							case 'zoom':
								$user_params['zoom'] = intval($value);
								break;
							case 'type':
								$user_params['type'] = trim($value, $trim_chars);
								break;
							case 'type_control':
								$user_params['type_control'] = (bool) $value;
								break;
							case 'controll':
								$user_params['controll'] = trim($value, $trim_chars);
								break;
							case 'marker':
								$user_params['marker'] = (bool) $value;
								break;
							case 'draging':
								$user_params['draging'] = (bool) $value;
								break;
							case 'mousewheel':
								$user_params['mousewheel'] = (bool) $value;
								break;
							case 'width':
								$user_params['width'] = $value;
								break;
							case 'height':
								$user_params['height'] = $value;
								break;
						}
					}
				}
				
				// Building init script
				$script .= sprintf("var map_%d = new GMap2(document.getElementById('map_%d'));\n", $index, $index);
				if ($user_params['latitude'] && $user_params['longitude']) {
					$script .= sprintf("var latlng = new GLatLng(%f, %f);\n map_%d.setCenter(latlng, %d);\n",
						$user_params['latitude'], $user_params['longitude'], $index, $user_params['zoom']);
					if ($user_params['marker']) {
						$script .= sprintf("map_%d.addOverlay(new GMarker(latlng));", $index);
					}
				}
				$script .= sprintf("map_%d.setMapType(%s);\n", $index, $user_params['type']);
				if ($user_params['type_control']) {
					$script .= sprintf("map_%d.addControl(new GMapTypeControl());\n", $index);
				}
				switch ($user_params['controll']) {
					case 'small':
						$script .= sprintf("map_%d.addControl(new GSmallMapControl());\n", $index);
						break;
					case 'large':
						$script .= sprintf("map_%d.addControl(new GLargeMapControl());\n", $index);
						break;
				}
				if ($user_params['draging']) {
					$script .= sprintf("map_%d.enableDragging();\n", $index);
				} else {
					$script .= sprintf("map_%d.disableDragging();\n", $index);
				}
				if ($user_params['mousewheel']) {
					$script .= sprintf("map_%d.enableScrollWheelZoom();\n", $index);
				} else {
					$script .= sprintf("map_%d.disableScrollWheelZoom();\n", $index);
				}
				// Add markers
				if (!empty($matchset[3])) {
					$markers = explode('][', $matchset[3]);
					foreach ($markers as $marker) {
						$marker = trim($marker, '[]');
						list($latitude, $longitude) = explode(';', $marker);
						$script .= sprintf("map_%d.addOverlay(new GMarker(new GLatLng(%f, %f)));\n", $index, $latitude, $longitude);
					}
				}
				
				// Building replacement
				$style = '';
				if ($user_params['width']) {
					$style = sprintf('width: %s;', $user_params['width']);
				}
				if ($user_params['height']) {
					$style .= sprintf('height: %s;', $user_params['height']);
				}
				if ($style) {
					$style = sprintf(' style="%s"', $style);
				}
				
				$replace[$matchset[0]] = sprintf('<div class="plug_bluepromap" id="map_%d"%s></div>',
					$index, $style);
			}
			
			$script .= "}}
				if (window.addEventListener)
						window.addEventListener('load', mapInitialize, false);
				else if (window.attachEvent)
					window.attachEvent('onload', mapInitialize);";
			$document->addScriptDeclaration($script);
			$article->text = strtr($article->text, $replace);
		}
	}

}