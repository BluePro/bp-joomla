<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Component
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die();
jimport('joomla.application.component.model');

class PhocaGalleryModelMap extends JModel
{
		

	function __construct() {
		parent::__construct();
		$id 	= JRequest::getVar('id', 0, '', 'int');
		$this->setId((int)$id);
		$catid	= JRequest::getVar('catid', 0, '', 'int');
		$this->setCatid((int)$catid);
		$post	= JRequest::get('get');
	}
	
	function setId($id){
		$this->_id				= $id;
		$this->_data			= null;
		$this->_data_category	= null;
	}
	
	function setCatid($catid) {
		if ($catid == 0) { //SEF
			$query = 'SELECT c.catid' .
				' FROM #__phocagallery AS c' .
				' WHERE c.id = '. (int) $this->_id;
			$this->_db->setQuery($query, 0, 1);
			$catid 			= $this->_db->loadObject();
			$this->_catid	= $catid->catid;
		} else {
			$this->_catid	= $catid;
		}
		$this->_data			= null;
		$this->_data_category	= null;
	}

	
	function &getData() {
		if (!$this->_loadData()) {
			$this->_initData();
		}
		return $this->_data;
	}
	
	function _loadData() {
		global $mainframe;

		if (empty($this->_data)) {
			$query = 'SELECT a.title, a.filename, a.description, a.latitude, a.longitude, a.zoom, a.geotitle'
				.' FROM #__phocagallery AS a'
				.' WHERE a.id = '. (int) $this->_id;
			$this->_db->setQuery($query, 0, 1);
			$this->_data	= $this->_db->loadObject();
			
			return (boolean) $this->_data;	
		}
		return true;
	}
	
	
	function _initData() {
		if (empty($this->_data)) {
			$this->_data	= '';
			return (boolean) $this->_data;
		}
		return true;
	}
	
	/*
	 * Category
	 */
	function &getDataCategory() {
		if (!$this->_loadDataCategory()) {
			$this->_initDataCategory();
		}
		return $this->_data_category;
	}
	
	function _loadDataCategory() {
		$query = 'SELECT c.title, c.description, c.latitude, c.longitude, c.zoom, c.geotitle'
				.' FROM #__phocagallery_categories AS c'
				.' WHERE c.id = '. (int) $this->_catid;
		$this->_db->setQuery($query, 0, 1);
		$this->_data_category	= $this->_db->loadObject();
		return (boolean) $this->_data_category;
	}
	
	function _initDataCategory() {
		if (empty($this->_data_category)) {
			$this->_data_category	= '';
			return (boolean) $this->_data_category;
		}
		return true;
	}

}
?>