<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Guestbook
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @author Carsten Hoffmann
 */

class PhocaguestbookAkismetHelper
{
    function checkSpam($api,$blogUrl,$name,$email,$url, $comment, &$msgA){
        require_once( JPATH_COMPONENT.DS.'assets'.DS.'akismet'.DS.'Akismet.class.php' );
	        $akismet = new Akismet($blogUrl, $api);
	        $akismet->setCommentAuthor($name);
	        $akismet->setCommentAuthorEmail($email);
	        $akismet->setCommentAuthorURL($url);
	        $akismet->setCommentContent($comment);
			
			if($akismet->isKeyValid()) {} 
			else {
				$msgA = 'Akismet: Key is invalid';
			}
			
	        //trigger_error("Akismet: ".$akismet->isCommentSpam(),E_USER_WARNING);
	        return $akismet->isCommentSpam();        
    }
    
}
?>