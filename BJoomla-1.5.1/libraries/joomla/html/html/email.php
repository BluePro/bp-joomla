<?php
/**
* @version		$Id: email.php 13341 2009-10-27 03:03:54Z ian $
* @package		Joomla.Framework
* @subpackage	HTML
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('JPATH_BASE') or die();
/**
 * Utility class for cloaking email adresses
 *
 * @static
 * @package 	Joomla.Framework
 * @subpackage	HTML
 * @since		1.5
 */
class JHTMLEmail
{
	/**
	* Simple Javascript email Cloaker
	*
 	* By default replaces an email with a mailto link with email cloacked
	*/
	function cloak( $mail, $mailto=1, $text='', $email=1, $prefix='mailto:', $suffix='', $attribs='' )
	{
		$replacement = '';
		$rand			= rand( 1, 100000 );
		
		$mail 			= JHTMLEmail::_convertEncoding( $mail );
		$mail			= explode( '@', $mail );
		if ( $mailto ) {
			$replacement = sprintf( '<a href="%s%s&#64;%s"%s>', $prefix, @$mail[0], $mail[1], $attribs );
			if ( $text ) {
				if ( $email ){
					$text = JHTMLEmail::_convertEncoding( $text );
					$text = explode( '@', $text );
					$replacement .= sprintf( '%s&#64;<!-- %d -->%s', @$text[0], $rand, $text[1] );
				} else {
					$replacement .= $text;
				}
			} else {
				$replacement .= sprintf( '%s&#64;<!-- %d -->%s', @$mail[0], $rand, $mail[1] );
			}
			$replacement .= '</a>';
		} else {
			$replacement = sprintf( '%s&#64;<!-- %d -->%s', @$mail[0], $rand, $mail[1] );
		}
		return $replacement;
	}

	function _convertEncoding( $text, $table = array( 'a' => '&#97;', 'e' => '&#101;', 'i' => '&#105;', 'o' => '&#111;', 'u' => '&#117;' ) )
	{
		// replace vowels with character encoding
		$text 	= strtr( $text, $table );
		
		return $text;
	}
}