<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$map_api_key = trim($params->get('api_key', ''));
if (!$map_api_key) return false;

// Setting user params
$map_id = rand();
$map_latitude = floatval($params->get('latitude', ''));
$map_longitude = floatval($params->get('longitude', ''));
$map_zoom = intval($params->get('zoom', '14'));
$map_type = $params->get('type', 'G_NORMAL_MAP');
$map_type_control = (bool) $params->get('type_control', '1');
$map_controll = $params->get('controll', 'small');
$map_marker = (bool) $params->get('marker', '1');
$map_draging = (bool) $params->get('draging', '1');
$map_mousewheel = (bool) $params->get('mousewheel', '1');

// Building init script
$script = sprintf("function mapInitialize%d() {\n if (GBrowserIsCompatible()) {\nvar map = new GMap2(document.getElementById('map_%d'));\n",
	$map_id, $map_id);
if ($map_latitude && $map_longitude) {
	$script .= sprintf("var latlng = new GLatLng(%f, %f);\n map.setCenter(latlng, %d);\n",
		$map_latitude, $map_longitude, $map_zoom);
	if ($map_marker) {
		$script .= "map.addOverlay(new GMarker(latlng));\n";
	}
}
$script .= sprintf("map.setMapType(%s);\n", $map_type);
if ($map_type_control) {
	$script .= "map.addControl(new GMapTypeControl());\n";
}
switch ($map_controll) {
	case 'small':
		$script .= "map.addControl(new GSmallMapControl());\n";
		break;
	case 'large':
		$script .= "map.addControl(new GLargeMapControl());\n";
		break;
}
if ($map_draging) {
	$script .= "map.enableDragging();\n";
} else {
	$script .= "map.disableDragging();\n";
}
if ($map_mousewheel) {
	$script .= "map.enableScrollWheelZoom();\n";
} else {
	$script .= "map.disableScrollWheelZoom();\n";
}
$script .= sprintf("
	}}\nif (window.addEventListener) window.addEventListener('load', mapInitialize%d, false);
	else if (window.attachEvent) window.attachEvent('onload', mapInitialize%d);",
	$map_id, $map_id);

		
$document = JFactory::getDocument();
$document->addScript('http://maps.google.com/maps?file=api&amp;v=2&amp;key=' . $map_api_key);
$document->addScriptDeclaration($script);

require(JModuleHelper::getLayoutPath('mod_bluepromap'));