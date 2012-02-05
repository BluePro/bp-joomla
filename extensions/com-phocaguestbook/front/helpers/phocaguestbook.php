<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Guestbook
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

class PhocaguestbookHelper
{
	function setTinyMCEJS($enable_editor = 1)
	{
		if ($enable_editor == 2) {
			$js = "\t<script type=\"text/javascript\" src=\"".JURI::root()."plugins/editors/tinymce3/jscripts/tiny_mce/tiny_mce.js\"></script>\n";
		} else {
			$js = "\t<script type=\"text/javascript\" src=\"".JURI::root()."plugins/editors/tinymce/jscripts/tiny_mce/tiny_mce.js\"></script>\n";
		}
		return $js;
	}
	
	function setCaptchaReloadJS()
	{
	/*	$js = "\t". '<script type="text/javascript">function reloadCaptcha() {    var capObj = document.getElementById(\'phocacaptcha\');    if (capObj) {        capObj.src = capObj.src +            (capObj.src.indexOf(\'?\') > -1 ? \'&\' : \'?\') + Math.random();    }} </script>' . "\n";
		*/
		$js  = "\t". '<script type="text/javascript">'."\n".'var pcid = 0;'."\n"
		     . 'function reloadCaptcha() {' . "\n"
			 . 'now = new Date();' . "\n"
			 . 'var capObj = document.getElementById(\'phocacaptcha\');' . "\n"
			 . 'if (capObj) {' . "\n"
			 . 'capObj.src = capObj.src + (capObj.src.indexOf(\'?\') > -1 ? \'&amp;pcid[\'+ pcid +\']=\' : \'?pcid[\'+ pcid +\']=\') + Math.ceil(Math.random()*(now.getTime()));' . "\n"
			 . 'pcid++;' . "\n"
			 . ' }' . "\n"
			 . '}'. "\n"
			 . '</script>' . "\n";
			
			return $js;
	}
	
	
	function displaySimpleTinyMCEJS($displayPath = 0) {

		
	
		$js =	'<script type="text/javascript">' . "\n";
		$js .= 	 'tinyMCE.init({'. "\n"
					.'mode : "textareas",'. "\n"
					.'theme : "advanced",'. "\n"
					.'language : "en",'. "\n"
					.'plugins : "emotions",'. "\n"
					.'editor_selector : "mceEditor",'. "\n"					
					.'theme_advanced_buttons1 : "bold, italic, underline, separator, strikethrough, justifyleft, justifycenter, justifyright, justifyfull, bullist, numlist, undo, redo, link, unlink, separator, emotions",'. "\n"
					.'theme_advanced_buttons2 : "",'. "\n"
					.'theme_advanced_buttons3 : "",'. "\n"
					.'theme_advanced_toolbar_location : "top",'. "\n"
					.'theme_advanced_toolbar_align : "left",'. "\n";
		if ($displayPath == 1) {
			$js .= 'theme_advanced_path_location : "bottom",'. "\n";
		}
		$js .=		 'extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]"
});' . "\n";
		$js .=	'</script>';
		return $js;

	}
	
	function displayTextArea($name='content',$content='', $width=50, $height=50, $col=10, $row=10, $buttons = false)
	{
		if (is_numeric( $width )) {
			$width .= 'px';
		}
		if (is_numeric( $height )) {
			$height .= 'px';
		}
		$editor  = "<textarea id=\"$name\" name=\"$name\" cols=\"$col\" rows=\"$row\" style=\"width:{$width}; height:{$height};\" class=\"mceEditor\">$content</textarea>\n" . $buttons;

		return $editor;
	}
	
	function wordDelete($string,$length,$end) {
		if (JString::strlen($string) < $length || JString::strlen($string) == $length) {
			return $string;
		} else {
			return JString::substr($string, 0, $length) . $end;
		}
	}
	
	function getDateFormat($dateFormat) {
		switch ($dateFormat) {
			case 1:
			$dateFormat = '%d. %B %Y';
			break;
			case 2:
			$dateFormat = '%d/%m/%y';
			break;
			case 3:
			$dateFormat = '%d. %m. %Y';
			break;
		}
		return $dateFormat;
	}
	
	
	
	function isRegisteredUser($registeredUsersOnly = 1, $userId) {
		if ($registeredUsersOnly == 1) {
			if ( $userId > 0 ) {
				$registeredUsersOnly = 1;// display form - user is registered, registration required
			} else {
				$registeredUsersOnly = 0;// display no form - user is not registered, registration is required
			}
		} else {
			$registeredUsersOnly = 1;// user is not registered, registration is NOT required - care all as registered
		}
		return $registeredUsersOnly;
	}
	

	function isURLAddress($url) {
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}
	
	function getPGBI() {
		return '<div style="text-align: right; color:#d3d3d3;">Powe'
		.'red by <a href="http://www.pho'
		.'ca.cz" style="text-decoration: none;" target="_bl'
		.'ank" title="Phoca.cz">Pho'
		.'ca</a> <a href="http://www.phoc'
		.'a.cz/phocaguestbook" style="text-decoration: none;" target="_blank" title="Pho'
		.'ca Guestbook">Guestbook</a></div>';
	}
	
	function getRequiredSign($required = 0) {
		
		$paramsC 				= JComponentHelper::getParams('com_phocaguestbook') ;
		$display_required_sign	= $paramsC->get( 'display_required_sign', 1 );
		
		if ((int)$display_required_sign == 1) {
			if ($required == 2) {
				return '&nbsp;<b style="color:red">*</b>';
			}
			return '';
		} else {
			return ':';
		}
	}
	
	function getCaptchaId($captchaMethod) {
		
		
		switch ((int)$captchaMethod){
			case 20:
				$c = array(1,2,3,4);
				$r = mt_rand(0,3);
				return $c[$r];
			break;
			
			case 21:
				$c = array(1,2,4);
				$r = mt_rand(0,2);
				return $c[$r];
			break;
			
			case 22:
				$c = array(1,3,4);
				$r = mt_rand(0,2);
				return $c[$r];
			break;
			
			case 23:
				$c = array(2,3,4);
				$r = mt_rand(0,2);
				return $c[$r];
			break;
			
			case 24:
				$c = array(1,4);
				$r = mt_rand(0,1);
				return $c[$r];
			break;
			
			case 25:
				$c = array(2,4);
				$r = mt_rand(0,1);
				return $c[$r];
			break;
			
			case 26:
				$c = array(3,4);
				$r = mt_rand(0,1);
				return $c[$r];
			break;
			
			
			
			case 10:
				$c = array(1,2,3);
				$r = mt_rand(0,2);
				return $c[$r];
			break;
			
			case 11:
				$c = array(1,2);
				$r = mt_rand(0,1);
				return $c[$r];
			break;
			
			case 12:
				$c = array(1,3);
				$r = mt_rand(0,1);
				return $c[$r];
			break;
			
			case 13:
				$c = array(2,3);
				$r = mt_rand(0,1);
				return $c[$r];
			break;
			
			case 4:
				return 4;
			break;
			
			case 3:
				return 3;
			break;
			
			case 2:
				return 2;
			break;
			
			case 1:
			default:
				return 1;
			break;
		}
		
		return 1;
	}
	
	function checkSpecificId($image = 0) {
		$paramsC 		= JComponentHelper::getParams('com_phocaguestbook') ;
		$specificItemid = $paramsC->get( 'specific_itemid', '' );
		$itemids		= explode(',', $specificItemid);
		
		$sec = 0;
		if (!empty($itemids) && isset($itemids[0]) && (int)$itemids[0] > 0) {
			$itemid	= JRequest::getCmd('Itemid');
			if (!in_array($itemid, $itemids)) {
				$sec = 1;
			}
		}
		if ($sec == 0) {
			return true;
		} else {
			// Save server resources - no redirect, no information for spam bots
			if ($image == 0) {
				echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"'
				.' "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'
				.'<html xmlns="http://www.w3.org/1999/xhtml">'
				.'<head><title>404 - Error: 404</title></head>'
				.'<body><div>404 - Site not found</div></body></html>';
				exit;
			} else {
				echo '';
				exit;
			}
		}
	
	}
}
?>