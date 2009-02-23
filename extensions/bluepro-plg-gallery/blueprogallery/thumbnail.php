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

if (empty($_GET['img']) || empty($_GET['width']) || empty($_GET['height']) || empty($_GET['quality'])) die( 'Restricted access' );

$image = urldecode($_GET['img']);
$width = intval($_GET['width']);
$height= intval($_GET['height']);
$quality = intval($_GET['quality']);

if ($width < 1 || $width > 1280) $width = 120;
if ($height < 1 || $height > 1280) $height = 120;
if ($quality < 1 || $quality > 100) $quality = 80;

if (!file_exists($image)) die('Invalid filename');

$thumbnail = dirname(__FILE__) . '/cache/' . md5($image . $width . $height . $quality) . '.jpg';
$ethumb = file_exists($thumbnail);

if ($ethumb && (filemtime($image) > filemtime($thumbnail))) {
	unlink($thumbnail);
	$ethumb = false;
}
if (!$ethumb) {
	$info = getimagesize($image);
	if (!$info || $info[2] != IMAGETYPE_JPEG) die('Invalid image format!');
	$ratio = $info[0] / $info[1];
	if ($width / $height > $ratio) {
		$width = $height * $ratio;
	} else {
		$height = $width / $ratio;
	}
	
	$destimg = imagecreatetruecolor($width, $height);
	$srcimg = imagecreatefromjpeg($image);
	imagecopyresampled($destimg, $srcimg, 0, 0, 0, 0, $width, $height, $info[0], $info[1]);
	$result = imagejpeg($destimg, $thumbnail, $quality);
	if (!$result) {
		header("Content-type: image/jpeg");
		imagejpeg($destimg, null, $quality);
		exit;
	}
}

$data = file_get_contents($thumbnail);
header("Content-type: image/jpeg");
echo $data;
?>
