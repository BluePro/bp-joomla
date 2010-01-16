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

class PhocaGalleryAccess
{
	/*
	 * Get info about access in only one category
	 */
	
	function getCategoryAccess($id) {
		
		$output = array();
		$db 	= &JFactory::getDBO();
		$query 	= 'SELECT c.access, c.accessuserid, c.uploaduserid, c.deleteuserid, c.userfolder' .
				' FROM #__phocagallery_categories AS c' .
				' WHERE c.id = '. (int) $id;
		$db->setQuery($query, 0, 1);
		$output = $db->loadObject();
		return $output;
	}
	
	
	/**
	 * Method to check if the user have access to category
	 * Display or hide the not accessible categories - subcat folder will be not displayed
	 * Check whether category access level allows access
	 *
	 * E.g.: Should the link to Subcategory or to Parentcategory be displayed
	 * E.g.: Should the delete button displayed, should be the upload button displayed
	 *
	 * @param string $params rightType: accessuserid, uploaduserid, deleteuserid - access, upload, delete right
	 * @param int $params rightUsers - All selected users which should have the "rightType" right
	 * @param int $params rightGroup - All selected Groups of users(public, registered or special ) which should have the "rT" right
	 * @param int $params userAID - Specific group of user who display the category in front (public, special, registerd)
	 * @param int $params userId - Specific id of user who display the category in front (1,2,3,...)
	 * @param int $params Additional param - e.g. $display_access_category (Should be unaccessed category displayed)
	 * @return boolean 1 or 0
	 */
	
	function getUserRight($rightType = 'accessuserid', $rightUsers, $rightGroup = 0, $userAID = 0, $userId = 0 , $additionalParam = 0 ) {	
		
		$rightUsersIdArray = array();
		if (!empty($rightUsers)) {
			$rightUsersIdArray = explode( ',', trim( $rightUsers ) );
		} else {
			$rightUsersIdArray = array();
		}

		$rightDisplay = 1;
		if ($additionalParam == 0) { // We want not to display unaccessable categories ($display_access_category)
			if ($rightGroup != 0) {
			
				if ($rightGroup > $userAID) {
					$rightDisplay  = 0;
				} else { // Access level only for one registered user
					if (!empty($rightUsersIdArray)) {
						// Check if the user is contained in selected array
						$userIsContained = 0;
						foreach ($rightUsersIdArray as $key => $value) {
							if ($userId == $value) {
								$userIsContained = 1;// check if the user id is selected in multiple box
								break;// don't search again
							}
							// for access (-1 not selected - all registered, 0 all users)
							if ($value == -1) {
								$userIsContained = 1;// in multiple select box is selected - All registered users
								break;// don't search again
							}
						}

						if ($userIsContained == 0) {
							$rightDisplay = 0;
						}
					} else {
						
						// Access rights (default open for all)
						// Upload and Delete rights (default closed for all)
						switch ($rightType) {
							case 'accessuserid':
								$rightDisplay = 1;
							break;
							
							default:
								$rightDisplay = 0;
							break;
						}
					}
				}	
			}
		}
		return $rightDisplay;
	}
	
	/**
	 * Method to display multiple select box
	 * @param string $name Name (id, name parameters)
	 * @param array $active Array of items which will be selected
	 * @param int $nouser Select no user
	 * @param string $javascript Add javascript to the select box
	 * @param string $order Ordering of items
	 * @param int $reg Only registered users
	 * @return array of id
	 */
	
	function usersList( $name, $active, $nouser = 0, $javascript = NULL, $order = 'name', $reg = 1 ) {
		
		$db		= &JFactory::getDBO();
		$and	= '';
		if ( $reg ) {
			// does not include registered users in the list
			$and = ' AND gid > 18';
		}

		$query = 'SELECT id AS value, name AS text'
		. ' FROM #__users'
		. ' WHERE block = 0'
		. $and
		. ' ORDER BY '. $order
		;
		$db->setQuery( $query );
		if ( $nouser ) {
			
			// Access rights (default open for all)
			// Upload and Delete rights (default closed for all)
			switch ($name) {
				case 'accessuserid[]':
					$idInput1 	= -1;
					$idText1	= JText::_( 'All Registered Users' );
					$idInput2 	= -2;
					$idText2	= JText::_( 'Nobody' );
				break;
				
				default:
					$idInput1 	= -2;
					$idText1	= JText::_( 'Nobody' );
					$idInput2 	= -1;
					$idText2	= JText::_( 'All Registered Users' );
				break;
			}
			
			$users[] = JHTML::_('select.option',  $idInput1, '- '. $idText1 .' -' );
			$users[] = JHTML::_('select.option',  $idInput2, '- '. $idText2 .' -' );
			
			$users = array_merge( $users, $db->loadObjectList() );
		} else {
			$users = $db->loadObjectList();
		}

		$users = JHTML::_('select.genericlist',   $users, $name, 'class="inputbox" size="4" multiple="multiple"'. $javascript, 'value', 'text', $active );

		return $users;
	}
	
	
	function usersListAuthor( $name, $active, $nouser = 0, $javascript = NULL, $order = 'name', $reg = 1 ) {
		
		$db 	= &JFactory::getDBO();
		$and 	= '';
		
		if ( $reg ) {
			// does not include registered users in the list
			$and = ' AND gid > 18';
		}

		$query = 'SELECT id AS value, name AS text'
		. ' FROM #__users'
		. ' WHERE block = 0'
		. $and
		. ' ORDER BY '. $order;
		
		$db->setQuery( $query );
		if ( $nouser ) {
			
			$idInput1 	= -1;
			$idText1	= JText::_( 'Nobody' );
			$users[] = JHTML::_('select.option',  -1, '- '. $idText1 .' -' );
			
			$users = array_merge( $users, $db->loadObjectList() );
		} else {
			$users = $db->loadObjectList();
		}

		$users = JHTML::_('select.genericlist',   $users, $name, 'class="inputbox" size="4" '. $javascript, 'value', 'text', $active );

		return $users;
	}
	
	/**
	 * Method to get the array of values for one parameters saved in param array
	 * @param string $params
	 * @param string $param param: e.g. accessuserid, uploaduserid, deleteuserid, userfolder
	 * @return array of values from one param in params array which is saved in db table in 'params' column
	 */
	/*///
	function getParamsArray($params='', $param='accessuserid')  {	
		// All params from category / params for userid only
		if ($params != '') {
			$paramsArray	= trim ($params);
			$paramsArray	= explode( ';', $params );
								
			if (is_array($paramsArray))
			{
				foreach ($paramsArray as $value)
				{
					$find = '/'.$param.'=/i';
					$replace = $param.'=';
					
					$idParam = preg_match( "".$find."" , $value );
					if ($idParam) {
						$paramsId = str_replace($replace, '', $value);
						if ($paramsId != '') {
							$paramsIdArray	= trim ($paramsId);
							$paramsIdArray	= explode( ',', $paramsId );
							// Unset empty keys
							foreach ($paramsIdArray as $key2 => $value2)
							{
								if ($value2 == '') {
									unset($paramsIdArray[$key2]);
								}
							}
							
							return $paramsIdArray;
						}
					}
				}
			}
		}
		return array();
	}*/
}
?>