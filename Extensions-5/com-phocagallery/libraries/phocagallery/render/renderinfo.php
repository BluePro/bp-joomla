<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Gallery
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

class PhocaGalleryRenderInfo
{	
	/**
	 * Method to get Phoca Version
	 * @return string Version of Phoca Gallery
	 */
	function getPhocaVersion() {
		$folder = JPATH_ADMINISTRATOR .DS. 'components'.DS.'com_phocagallery';
		if (JFolder::exists($folder)) {
			$xmlFilesInDir = JFolder::files($folder, '.xml$');
		} else {
			$folder = JPATH_SITE .DS. 'components'.DS.'com_phocagallery';
			if (JFolder::exists($folder)) {
				$xmlFilesInDir = JFolder::files($folder, '.xml$');
			} else {
				$xmlFilesInDir = null;
			}
		}

		$xml_items = '';
		if (count($xmlFilesInDir))
		{
			foreach ($xmlFilesInDir as $xmlfile)
			{
				if ($data = JApplicationHelper::parseXMLInstallFile($folder.DS.$xmlfile)) {
					foreach($data as $key => $value) {
						$xml_items[$key] = $value;
					}
				}
			}
		}
		
		if (isset($xml_items['version']) && $xml_items['version'] != '' ) {
			return $xml_items['version'];
		} else {
			return '';
		}
	}
	
	function getPhocaIc($ic){
		$v	= PhocaGalleryRenderInfo::getPhocaVersion();
		$i	= str_replace('.', '',substr($v, 0, 3));
		$n	= '<p>&nbsp;</p>';
		$l	= 'h'.'t'.'t'.'p'.':'.'/'.'/'.'w'.'w'.'w'.'.'.'p'.'h'.'o'.'c'.'a'.'.'.'c'.'z'.'/';
		$p	= 'P'.'h'.'o'.'c'.'a'.' '.'G'.'a'.'l'.'l'.'e'.'r'.'y';
		$im = 'i'.'c'.'o'.'n'.'-'.'p'.'h'.'o'.'c'.'a'.'-'.'l'.'o'.'g'.'o'.'-'.'s'.'m'.'a'.'l'.'l'.'.'.'p'.'n'.'g';
		$s	= 's'.'t'.'y'.'l'.'e'.'='.'"'.'t'.'e'.'x'.'t'.'-'.'d'.'e'.'c'.'o'.'r'.'a'.'t'.'i'.'o'.'n'.':'.'n'.'o'.'n'.'e'.'"';
		$b	= 't'.'a'.'r'.'g'.'e'.'t'.'='.'"'.'_'.'b'.'l'.'a'.'n'.'k'.'"';
		$im2 = 'i'.'c'.'o'.'n'.'-'.'p'.'h'.'o'.'c'.'a'.'-'.'l'.'o'.'g'.'o'.'-'.'s'.'e'.'a'.'l'.'.'.'p'.'n'.'g';
		$i	= (int)$i * (int)$i;
		$output	= '';
		if ($ic != $i) {
			$output		.= $n;
			$output		.= '<div style="text-align:center">';
		}
		if ($ic == 1) {
			$output	.= '<a href="'.$l.'" '.$s.' '.$b.' title="'.$p.'">'. JHTML::_('image', 'components/com_phocagallery/assets/images/'.$im, $p). '</a>';
			$output	.= ' <a href="http://www.phoca.cz/" '.$s.' '.$b.' title="'.$p.'">'. $v .'</a>';
		} else if ($ic == 2 || $ic == 3) {
			$output	.= '<a  href="'.$l.'" '.$s.' '.$b.' title="'.$p.'">'. JHTML::_('image', 'components/com_phocagallery/assets/images/'.$im, $p). '</a>';
		} else if ($ic == 4) {
			$output	.= ' <a href="'.$l.'" '.$s.' '.$b.' title="'.$p.'">Phoca Gallery</a>';
		} else if ($ic == 5) {
			$output	.= ' <a href="'.$l.'" '.$s.' '.$s.' '.$b.' title="'.$p.'">'.$p.' '.$v.'</a>';
		} else if ($ic == 6) {
			$output	.= ' <a href="'.$l.'" '.$s.' '.$b.' title="'.$p.'">'. JHTML::_('image', 'components/com_phocagallery/assets/images/'.$im2, $p). '</a>';
		} else if ($ic == $i) {
			$output	.= '<!-- <a href="'.$l.'">site: www.phoca.cz | version: '.$v.'</a> -->';
		} else {
			$output	.= '<a href="'.$l.'" '.$s.' '.$b.' title="'.$p.'">'. JHTML::_('image', 'components/com_phocagallery/assets/images/'.$im, $p). '</a>';
			$output	.= ' <a href="http://www.phoca.cz/" '.$s.' '.$b.' title="'.$p.'">'. $v .'</a>';
		}
		if ($ic != $i) {
			$output		.= '</div>' . $n;
		}
		return $output;
	}
}
?>