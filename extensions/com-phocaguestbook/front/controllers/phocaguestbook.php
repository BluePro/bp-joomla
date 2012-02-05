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
defined('_JEXEC') or die();
jimport('joomla.mail.helper');

class PhocaGuestbookControllerPhocaGuestbook extends PhocaGuestbookController
{
	function __construct() {
		parent::__construct();
		$this->registerTask('submit', 'submit');
		$this->registerTask('delete', 'remove');
		$this->registerTask('unpublish', 'unpublish');
	}
	
	function display() {
		parent::display();
	}

	function submit() {
		
		$uri 		= &JFactory::getURI();
		$app 		= JFactory::getApplication();
		
		//All security settings moved to model
		$postNew	= array();
		$model		= $this->getModel( 'phocaguestbook' );
		if ($model->store($postNew)) {
			if ($postNew['published'] == 0) {
				$msg = JText::_( 'Phoca Guestbook Item Saved' ). ", " .JText::_( 'Review Message' );
			} else {
				$msg = JText::_( 'Phoca Guestbook Item Saved' );
			}
			$this->setRedirect($uri->toString(),$msg );
		} else {
			if (isset($postNew['displayformerror']) && $postNew['displayformerror'] == 1 ) {
				$this->display();
			} else if (isset($postNew['akismeterror']) && $postNew['akismeterror'] != '' ) {
				$msg = $postNew['akismeterror'];
				$this->setRedirect($uri->toString(),$msg );
			} else {
				$msg = JText::_( 'Error Saving Phoca Guestbook Item' );
				$this->setRedirect($uri->toString(),$msg );
			}
		}
		
		// Set Itemid id for redirect, exists this link in Menu?
		/*	$menu 	= &JSite::getMenu();
			$items	= $menu->getItems('link', 'index.php?option=com_phocaguestbook&view=phocaguestbook&id='.(int) $cid[0]);

			if(isset($items[0])) {
				$itemid = $items[0]->id;
				$alias 	= $items[0]->alias;
			}		*/	
			// No JRoute - there are some problems
			// $this->setRedirect(JRoute::_('index.php?option=com_phocaguestbook&view=phocaguestbook&id='. (int) $cid[0].'&Itemid='.$itemid),$msg );
			
	}
	
	function remove() {
		$app 		= JFactory::getApplication();
		$user 		= &JFactory::getUser();
		$cid 		= JRequest::getVar( 'mid', null, '', 'int' );
		$id 		= JRequest::getVar( 'id', null, '', 'int' );
		$itemid 	= JRequest::getVar( 'Itemid', null, '', 'int' );
		$limitstart = JRequest::getVar( 'limitstart', null, '', 'int' );
		$model 		= $this->getModel( 'phocaguestbook' );
	
		if (strtolower($user->usertype) == strtolower('super administrator') || strtolower($user->usertype) == strtolower('administrator')) {

			if (count( $cid ) < 1) {
				JError::raiseError(500, JText::_( 'Select an item to delete' ) );
			}
			if(!$model->delete($cid)) {
				echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
				$msg = JText::_( 'Error Deleting Phoca Guestbook Item' );
			} else {
				$msg = JText::_( 'Phoca Guestbook Item Deleted' );
			}
		} else {
			$msg = JText::_( 'You are not authorized to delete selected item' );
		}
		// Limitstart (if we delete the last item from last pagination, this pagination will be lost, we must change limitstart)
		$countItem = $model->countItem($id);
		if ((int)$countItem[0] == $limitstart) {
			$limitstart = 0;
		}

		// Redirect
		$link	= 'index.php?option=com_phocaguestbook&view=phocaguestbook&id='.$id.'&Itemid='.$itemid.'&limitstart='.$limitstart;
		$link	= JRoute::_($link, false);
		$this->setRedirect( $link, $msg );
	}
	
	function unpublish() {
		$app 		= JFactory::getApplication();
		$user 		=& JFactory::getUser();
		$cid 		= JRequest::getVar( 'mid', null, '', 'int' );
		$id 		= JRequest::getVar( 'id', null, '', 'int' );
		$itemid 	= JRequest::getVar( 'Itemid', null, '', 'int' );
		$limitstart = JRequest::getVar( 'limitstart', null, '', 'int' );
		$model 		= $this->getModel( 'phocaguestbook' );
		
		if (strtolower($user->usertype) == strtolower('super administrator') || strtolower($user->usertype) == strtolower('administrator')) {
			
			if (count( $cid ) < 1) {
				JError::raiseError(500, JText::_( 'Select an item to unpublish' ) );
			}
			if(!$model->publish($cid, 0)) {
				echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
				$msg = JText::_( 'Error Unpublishing Phoca Guestbook Item' );
			}
			else {
				$msg = JText::_( 'Phoca Guestbook Item unpublished' );
			}
		} else {
			$msg = JText::_( 'You are not authorized to unpublish selected item' );
		}
		
		// Limitstart (if we delete the last item from last pagination, this pagination will be lost, we must change limitstart)
		$countItem = $model->countItem($id);

		if ((int)$countItem[0] == $limitstart) {
			$limitstart = 0;
		}
		
		// Redirect
		$link	= 'index.php?option=com_phocaguestbook&view=phocaguestbook&id='.$id.'&Itemid='.$itemid.'&limitstart='.$limitstart;
		$link	= JRoute::_($link, false);
		$this->setRedirect( $link, $msg );
	}
	
}
?>
