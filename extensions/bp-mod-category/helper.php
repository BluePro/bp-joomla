<?php
/**
* @version		mod_category_content
* @package		Joomla
* @copyright	Copyright (C) 2008 Peter Breeze - pbreeze@clearsailing.net
* @license		GNU/GPL, see LICENSE.php
* created using source codes of mod_latestnews by the Joomla Development Team - thanks !
*
* File last changed February 25 2010
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once (JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');

class mod_category_contentHelper
{
	function getList(&$params)
	{
		global $mainframe;

		$db			=& JFactory::getDBO();
		$user		=& JFactory::getUser();
		$userId		= (int) $user->get('id');

		$catid		= trim( $params->get('catid') );
		$aid		= $user->get('aid', 0);
		$contentConfig = &JComponentHelper::getParams( 'com_content' );
		$access		= !$contentConfig->get('show_noauth');
		$nullDate	= $db->getNullDate();
		$date =& JFactory::getDate();
		$now = $date->toMySQL();

		$where		= 'a.state = 1'
			. ' AND ( a.publish_up = '.$db->Quote($nullDate).' OR a.publish_up <= '.$db->Quote($now).' )'
			. ' AND ( a.publish_down = '.$db->Quote($nullDate).' OR a.publish_down >= '.$db->Quote($now).' )'
			;

		// User Filter
		switch ($params->get( 'user_id' ))
		{
			case 'by_me':
				$where .= ' AND (created_by = ' . (int) $userId . ' OR modified_by = ' . (int) $userId . ')';
				break;
			case 'not_me':
				$where .= ' AND (created_by <> ' . (int) $userId . ' AND modified_by <> ' . (int) $userId . ')';
				break;
		}

				$ids = explode( ',',  $catid );
				JArrayHelper::toInteger( $ids );
				$catCondition = ' AND (cc.id=' . implode( ' OR cc.id=', $ids ) . ')';		

		// Content Items only
		$query = 'SELECT a.*, ' .
			' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'.
			' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(":", cc.id, cc.alias) ELSE cc.id END as catslug'.
			' FROM #__content AS a' .
			' INNER JOIN #__categories AS cc ON cc.id = a.catid' .

			' WHERE '. $where . ($access ? 
								 ' AND a.access <= ' .(int) $aid. 
								 ' AND cc.access <= ' .(int) $aid.(int) $aid : '').
			($catid ? $catCondition : '').
			' AND cc.published = 1' .
			' ORDER BY a.ordering ASC';
		$db->setQuery($query);
		$rows = $db->loadObjectList();

		$i		= 0;
		$lists	= array();
		foreach ( $rows as $row )
		{
			if($row->access <= $aid)
			{
				$lists[$i]->link = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catslug, $row->sectionid));
			} else {
				$lists[$i]->link = JRoute::_('index.php?option=com_user&view=login');
			}
			$lists[$i]->text = htmlspecialchars( $row->title );
			$i++;
		}

		return $lists;
	}
}
