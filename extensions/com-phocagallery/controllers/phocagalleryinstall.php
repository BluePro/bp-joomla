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
defined('_JEXEC') or die();

class PhocaGalleryCpControllerPhocaGalleryinstall extends PhocaGalleryCpController
{
	function __construct() {
		parent::__construct();
		$this->registerTask( 'install'  , 'install' );
		$this->registerTask( 'upgrade'  , 'upgrade' );		
	}

	function install() {		
		$db			= &JFactory::getDBO();
		$dbPref 	= $db->getPrefix();
		$msgSQL 	= $msgFile = $msgError = '';		
		
		// ------------------------------------------
		// PHOCAGALLERY
		// ------------------------------------------
		$query =' DROP TABLE IF EXISTS `'.$dbPref.'phocagallery`;';
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		$query =' CREATE TABLE `'.$dbPref.'phocagallery`('."\n";
		$query.=' `id` int(11) unsigned NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default \'0\','."\n";
		$query.=' `sid` int(11) NOT NULL default \'0\','."\n";
		$query.=' `title` varchar(250) NOT NULL default \'\','."\n";
		$query.=' `alias` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `filename` varchar(250) NOT NULL default \'\','."\n";
		$query.=' `description` text,'."\n";
		$query.=' `date` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `hits` int(11) NOT NULL default \'0\','."\n";
		$query.=' `latitude` varchar(20) NOT NULL default \'\','."\n";
		$query.=' `longitude` varchar(20) NOT NULL default \'\','."\n";
		$query.=' `zoom` int(3) NOT NULL default \'0\','."\n";
		$query.=' `geotitle` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `videocode` text,'."\n";
		$query.=' `vmproductid` int(11) NOT NULL default \'0\','."\n";
		$query.=' `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `checked_out` int(11) NOT NULL default \'0\','."\n";
		$query.=' `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.=' `params` text,'."\n";
		$query.=' `extlink1` text,'."\n";
		$query.=' `extlink2` text,'."\n";
		$query.=' PRIMARY KEY  (`id`),'."\n";
		$query.=' KEY `catid` (`catid`,`published`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		$query.=''."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY CATEGORIES
		// ------------------------------------------
		$query=' DROP TABLE IF EXISTS `'.$dbPref.'phocagallery_categories`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		$query=' CREATE TABLE `'.$dbPref.'phocagallery_categories` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `parent_id` int(11) NOT NULL default 0,'."\n";
		$query.=' `title` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `name` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `alias` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `image` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `section` varchar(50) NOT NULL default \'\','."\n";
		$query.=' `image_position` varchar(30) NOT NULL default \'\','."\n";
		$query.=' `description` text,'."\n";
		$query.=' `date` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `checked_out` int(11) unsigned NOT NULL default \'0\','."\n";
		$query.=' `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `editor` varchar(50) default NULL,'."\n";
		$query.=' `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.=' `access` tinyint(3) unsigned NOT NULL default \'0\','."\n";
		$query.=' `count` int(11) NOT NULL default \'0\','."\n";
		$query.=' `hits` int(11) NOT NULL default \'0\','."\n";
		$query.=' `accessuserid` text,'."\n";
		$query.=' `uploaduserid` text,'."\n";
		$query.=' `deleteuserid` text,'."\n";
		$query.=' `userfolder` text,'."\n";
		$query.=' `latitude` varchar(20) NOT NULL default \'\','."\n";
		$query.=' `longitude` varchar(20) NOT NULL default \'\','."\n";
		$query.=' `zoom` int(3) NOT NULL default \'0\','."\n";
		$query.=' `geotitle` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `params` text,'."\n";
		$query.=' PRIMARY KEY  (`id`),'."\n";
		$query.=' KEY `cat_idx` (`section`,`published`,`access`),'."\n";
		$query.=' KEY `idx_access` (`access`),'."\n";
		$query.=' KEY `idx_checkout` (`checked_out`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;';
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY VOTES
		// ------------------------------------------
		$query ='DROP TABLE IF EXISTS `'.$dbPref.'phocagallery_votes`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		$query =' CREATE TABLE `'.$dbPref.'phocagallery_votes` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default 0,'."\n";
		$query.=' `userid` int(11) NOT NULL default 0,'."\n";
		$query.=' `date` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `rating` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `checked_out` int(11) unsigned NOT NULL default \'0\','."\n";
		$query.=' `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.=' `params` text,'."\n";
		$query.=' PRIMARY KEY  (`id`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY COMMENTS
		// ------------------------------------------
		$query ='DROP TABLE IF EXISTS `'.$dbPref.'phocagallery_comments`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		$query =' CREATE TABLE `'.$dbPref.'phocagallery_comments` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default 0,'."\n";
		$query.=' `userid` int(11) NOT NULL default 0,'."\n";
		$query.=' `date` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `title` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `comment` text,'."\n";
		$query.=' `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `checked_out` int(11) unsigned NOT NULL default \'0\','."\n";
		$query.=' `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.=' `params` text,'."\n";
		$query.=' PRIMARY KEY  (`id`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY VOTES STATISTICS
		// ------------------------------------------
		$query ='DROP TABLE IF EXISTS `'.$dbPref.'phocagallery_votes_statistics`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}

		$query =' CREATE TABLE `'.$dbPref.'phocagallery_votes_statistics` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default 0,'."\n";
		$query.=' `count` tinyint(11) NOT NULL default \'0\','."\n";
		$query.=' `average` float(8,6) NOT NULL default \'0\','."\n";
		$query.=' PRIMARY KEY  (`id`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY USER CATEGORY
		// ------------------------------------------
		$query ='DROP TABLE IF EXISTS `'.$dbPref.'phocagallery_user_category`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
	
		$query =' CREATE TABLE `'.$dbPref.'phocagallery_user_category` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default 0,'."\n";
		$query.=' `userid` int(11) NOT NULL default 0,'."\n";
		$query.=' PRIMARY KEY  (`id`),'."\n";
		$query.=' KEY `catid` (`catid`,`userid`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY IMAGE VOTES (2.5.0)
		// ------------------------------------------
		$query ='DROP TABLE IF EXISTS `'.$dbPref.'phocagallery_img_votes`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
	
		$query =' CREATE TABLE `'.$dbPref.'phocagallery_img_votes` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `imgid` int(11) NOT NULL default 0,'."\n";
		$query.=' `userid` int(11) NOT NULL default 0,'."\n";
		$query.=' `date` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `rating` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `checked_out` int(11) unsigned NOT NULL default \'0\','."\n";
		$query.=' `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.=' `params` text,'."\n";
		$query.=' PRIMARY KEY  (`id`)'."\n";
		$query.=') TYPE=MyISAM DEFAULT CHARSET=utf8;';
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY IMAGE VOTES STATISTICS (2.5.0)
		// ------------------------------------------
		$query ='DROP TABLE IF EXISTS `'.$dbPref.'phocagallery_img_votes_statistics`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}

		$query =' CREATE TABLE `'.$dbPref.'phocagallery_img_votes_statistics` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `imgid` int(11) NOT NULL default 0,'."\n";
		$query.=' `count` tinyint(11) NOT NULL default \'0\','."\n";
		$query.=' `average` float(8,6) NOT NULL default \'0\','."\n";
		$query.=' PRIMARY KEY  (`id`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		
		// Error
		if ($msgSQL !='') {
			$msgError .= '<br />' . $msgSQL;
		}
		/*if ($msgFile !='') {
			$msgError .= '<br />' . $msgFile;
		}*/
		
		// End Message
		if ($msgError !='') {
			$msg = JText::_( 'Phoca Gallery not successfully installed' ) . ': ' . $msgError;
		} else {
			$msg = JText::_( 'Phoca Gallery successfully installed' );
		}
		
		$link = 'index.php?option=com_phocagallery';
		$this->setRedirect($link, $msg);
	}
	
	function upgrade() {
		
		$db			=& JFactory::getDBO();
		$dbPref 	= $db->getPrefix();
		$msgSQL 	= $msgFile = $msgError = '';
		
		// UPGRADE PHOCA GALLERY 2 VERSION
		// ------------------------------------------
		// PHOCAGALLERY CATEGORIES
		// ------------------------------------------
		$updateHit 	= false;
		$errorMsg	= '';
		$updateHit = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery_categories", "hits", "INT( 11 ) NOT NULL DEFAULT '0'", "count" );
		if (!$updateHit) {
			$msgSQL .= 'Error while updating HITS column';
		}
		
		// ------------------------------------------
		// PHOCAGALLERY VOTES
		// ------------------------------------------		
		$query =' CREATE TABLE IF NOT EXISTS `'.$dbPref.'phocagallery_votes` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default 0,'."\n";
		$query.=' `userid` int(11) NOT NULL default 0,'."\n";
		$query.=' `date` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `rating` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `checked_out` int(11) unsigned NOT NULL default \'0\','."\n";
		$query.=' `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.=' `params` text,'."\n";
		$query.=' PRIMARY KEY  (`id`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY COMMENTS
		// ------------------------------------------
		$query =' CREATE TABLE IF NOT EXISTS `'.$dbPref.'phocagallery_comments` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default 0,'."\n";
		$query.=' `userid` int(11) NOT NULL default 0,'."\n";
		$query.=' `date` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `title` varchar(255) NOT NULL default \'\','."\n";
		$query.=' `comment` text,'."\n";
		$query.=' `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `checked_out` int(11) unsigned NOT NULL default \'0\','."\n";
		$query.=' `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.=' `params` text,'."\n";
		$query.=' PRIMARY KEY  (`id`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY VOTES STATISTICS
		// ------------------------------------------
		$query =' CREATE TABLE IF NOT EXISTS `'.$dbPref.'phocagallery_votes_statistics` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default 0,'."\n";
		$query.=' `count` tinyint(11) NOT NULL default \'0\','."\n";
		$query.=' `average` float(8,6) NOT NULL default \'0\','."\n";
		$query.=' PRIMARY KEY  (`id`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY USER CATEGORY
		// ------------------------------------------
		$query =' CREATE TABLE IF NOT EXISTS `'.$dbPref.'phocagallery_user_category` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default 0,'."\n";
		$query.=' `userid` int(11) NOT NULL default 0,'."\n";
		$query.=' PRIMARY KEY  (`id`),'."\n";
		$query.=' KEY `catid` (`catid`,`userid`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// UPGRADE PHOCA GALLERY 2.2 VERSION
		// ------------------------------------------
		// PHOCAGALLERY
		// ------------------------------------------
		$updateExtl1 	= false;
		$errorMsg		= '';
		$updateExtl1 = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery", "extlink1", "text", "params" );
		if (!$updateExtl1) {
			$msgSQL .= 'Error while updating Extlink1 column';
		}
		$updateExtl2 = false;
		$errorMsg	= '';
		$updateExtl2 = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery", "extlink2", "text", "extlink1" );
		if (!$updateExtl2) {
			$msgSQL .= 'Error while updating Extlink2 column';
		}
		
		// UPGRADE PHOCA GALLERY 2.2.2 VERSION
		// ------------------------------------------
		// PHOCAGALLERY CATEGORIES
		// ------------------------------------------
		$updateDate = false;
		$errorMsg	= '';
		$updateDate = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery_categories", "date", "datetime NOT NULL default '0000-00-00 00:00:00'", "description" );
		if (!$updateDate) {
			$msgSQL .= 'Error while updating Date column';
		}
		
		// UPGRADE PHOCA GALLERY 2.5 VERSION
		// ------------------------------------------
		// New COLUMNS CATEGORY
		// ------------------------------------------
	
		// UPGRADE DATA SCRIPT NEEDS TO BE RUN
		$updateGeoT = false;
		$errorMsg	= '';
		$convertDataNeeded['cat-geotitle'] = 0;
		$updateGeoT = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery_categories", "geotitle", "varchar(255) NOT NULL default ''", "hits" );
		if (!$updateGeoT) {
			$msgSQL .= 'Error while updating Geotitle (Category) column';
		} else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['cat-geotitle'] = 1;
			}
		}
		
		$updateZoom = false;
		$errorMsg	= '';
		$convertDataNeeded['cat-zoom'] = 0;
		$updateZoom = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery_categories", "zoom", "int(3) NOT NULL default '0'", "hits" );
		if (!$updateZoom) {
			$msgSQL .= 'Error while updating Zoom (Category) column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['cat-zoom'] = 1;
			}
		}
		
		$updateLng = false;
		$errorMsg	= '';
		$convertDataNeeded['cat-longitude'] = 0;
		$updateLng = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery_categories", "longitude", "varchar(20) NOT NULL default ''", "hits" );
		if (!$updateLng) {
			$msgSQL .= 'Error while updating Longitude (Category) column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['cat-longitude'] = 1;
			}
		}
		
		$updateLat = false;
		$errorMsg	= '';
		$convertDataNeeded['cat-latitude'] = 0;
		$updateLat = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery_categories", "latitude", "varchar(20) NOT NULL default ''", "hits" );
		if (!$updateLat) {
			$msgSQL .= 'Error while updating Latitude (Category) column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['cat-latitude'] = 1;
			}
		}
		
		$updateUF = false;
		$errorMsg	= '';
		$convertDataNeeded['cat-userfolder'] = 0;
		$updateUF = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery_categories", "userfolder", "text", "hits" );
		if (!$updateUF) {
			$msgSQL .= 'Error while updating Userfolder column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['cat-userfolder'] = 1;
			}
		}
		
		$updateDuid = false;
		$errorMsg	= '';
		$convertDataNeeded['cat-deleteuserid'] = 0;
		$updateDuid = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery_categories", "deleteuserid", "text", "hits" );
		if (!$updateDuid) {
			$msgSQL .= 'Error while updating Deleteuserid column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['cat-deleteuserid'] = 1;
			}
		}
		
		$updateUuid = false;
		$errorMsg	= '';
		$convertDataNeeded['cat-uploaduserid'] = 0;
		$updateUuid = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery_categories", "uploaduserid", "text", "hits" );
		if (!$updateUuid) {
			$msgSQL .= 'Error while updating Uploaduserid column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['cat-uploaduserid'] = 1;
			}
		}
		
		$updateAuid = false;
		$errorMsg	= '';
		$convertDataNeeded['cat-accessuserid'] = 0;
		$updateAuid = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery_categories", "accessuserid", "text", "hits" );
		if (!$updateAuid) {
			$msgSQL .= 'Error while updating Accessuserid column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['cat-accessuserid'] = 1;
			}
		}
		
		// ------------------------------------------
		// New COLUMNS IMAGES
		// ------------------------------------------
		$updateGeoT = false;
		$errorMsg	= '';
		$convertDataNeeded['img-geotitle'] = 0;
		$updateGeoT = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery", "geotitle", "varchar(255) NOT NULL default ''", "hits" );
		if (!$updateGeoT) {
			$msgSQL .= 'Error while updating Geotitle column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['img-geotitle'] = 1;
			}
		}
		
		$updateZoom = false;
		$errorMsg	= '';
		$convertDataNeeded['img-zoom'] = 0;
		$updateZoom = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery", "zoom", "int(3) NOT NULL default '0'", "hits" );
		if (!$updateZoom) {
			$msgSQL .= 'Error while updating Zoom column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['img-zoom'] = 1;
			}
		}
		
		$updateLng = false;
		$errorMsg	= '';
		$convertDataNeeded['img-longitude'] = 0;
		$updateLng = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery", "longitude", "varchar(20) NOT NULL default ''", "hits" );
		if (!$updateLng) {
			$msgSQL .= 'Error while updating Longitude column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['img-longitude'] = 1;
			}
		}
		
		$updateLat = false;
		$errorMsg	= '';
		$convertDataNeeded['img-latitude'] = 0;
		$updateLat = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery", "latitude", "varchar(20) NOT NULL default ''", "hits" );
		if (!$updateLat) {
			$msgSQL .= 'Error while updating Latitude column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['img-latitude'] = 1;
			}
		}
		
		$updateVC = false;
		$errorMsg	= '';
		$convertDataNeeded['img-videocode'] = 0;
		$updateVC = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery", "videocode", "text", "hits" );
		if (!$updateVC) {
			$msgSQL .= 'Error while updating Video Code column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['img-videocode'] = 1;
			}
		}
		
		$updateVMPiD = false;
		$errorMsg	= '';
		$convertDataNeeded['img-vmproductid'] = 0;
		$updateVMPiD = $this->AddColumnIfNotExists( $errorMsg, "".$dbPref."phocagallery", "vmproductid", "int(11) NOT NULL default '0'", "hits" );
		if (!$updateVMPiD) {
			$msgSQL .= 'Error while updating VirtueMart Product ID column';
		}else {
			if ($errorMsg == 'notexistcreated') {
				$convertDataNeeded['img-vmproductid'] = 1;
			}
		}
		
		// END UPGRADE DATA SCRIPT NEEDS TO BE RUN - - - 
		
		// ------------------------------------------
		// PHOCAGALLERY IMG VOTES
		// ------------------------------------------		
		$query =' CREATE TABLE IF NOT EXISTS `'.$dbPref.'phocagallery_img_votes` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `imgid` int(11) NOT NULL default 0,'."\n";
		$query.=' `userid` int(11) NOT NULL default 0,'."\n";
		$query.=' `date` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `rating` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.=' `checked_out` int(11) unsigned NOT NULL default \'0\','."\n";
		$query.=' `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.=' `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.=' `params` text,'."\n";
		$query.=' PRIMARY KEY  (`id`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// ------------------------------------------
		// PHOCAGALLERY IMG VOTES STATISTICS
		// ------------------------------------------
		$query =' CREATE TABLE IF NOT EXISTS `'.$dbPref.'phocagallery_img_votes_statistics` ('."\n";
		$query.=' `id` int(11) NOT NULL auto_increment,'."\n";
		$query.=' `imgid` int(11) NOT NULL default 0,'."\n";
		$query.=' `count` tinyint(11) NOT NULL default \'0\','."\n";
		$query.=' `average` float(8,6) NOT NULL default \'0\','."\n";
		$query.=' PRIMARY KEY  (`id`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msgSQL .= $db->stderr() . '<br />';}
		
		// CHECK TABLES
		$query =' SELECT * FROM `'.$dbPref.'phocagallery` LIMIT 1;';
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum()) {
			$msgSQL .= $db->getErrorMsg(). '<br />';
		}
		
		$query=' SELECT * FROM `'.$dbPref.'phocagallery_categories` LIMIT 1;'."\n";
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum()) {
			$msgSQL .= $db->getErrorMsg(). '<br />';
		}
		
		$query=' SELECT * FROM `'.$dbPref.'phocagallery_votes` LIMIT 1;'."\n";
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum()) {
			$msgSQL .= $db->getErrorMsg(). '<br />';
		}
		
		$query=' SELECT * FROM `'.$dbPref.'phocagallery_comments` LIMIT 1;'."\n";
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum()) {
			$msgSQL .= $db->getErrorMsg(). '<br />';
		}
		
		$query=' SELECT * FROM `'.$dbPref.'phocagallery_votes_statistics` LIMIT 1;'."\n";
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum()) {
			$msgSQL .= $db->getErrorMsg(). '<br />';
		}
		
		$query=' SELECT * FROM `'.$dbPref.'phocagallery_user_category` LIMIT 1;'."\n";
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum()) {
			$msgSQL .= $db->getErrorMsg(). '<br />';
		}
		
		$query=' SELECT * FROM `'.$dbPref.'phocagallery_img_votes` LIMIT 1;'."\n";
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum()) {
			$msgSQL .= $db->getErrorMsg(). '<br />';
		}
		
		$query=' SELECT * FROM `'.$dbPref.'phocagallery_img_votes_statistics` LIMIT 1;'."\n";
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum()) {
			$msgSQL .= $db->getErrorMsg(). '<br />';
		}

		// Error
		if ($msgSQL !='') {
			$msgError .= '<br />' . $msgSQL;
		}
		/*if ($msgFile !='') {
			$msgError .= '<br />' . $msgFile;
		}*/	
		// End Message
		if ($msgError !='') {
			$msg = JText::_( 'Phoca Gallery not successfully upgraded' ) . ': ' . $msgError;
		} else {
			$msg = JText::_( 'Phoca Gallery successfully upgraded' );
		}
		
		$linkUpgrade = '';
		foreach ($convertDataNeeded as $key => $value) {
			if ($value == 1) {
				$linkUpgrade .= '&'.$key.'=1';
			}
		}
		if ($linkUpgrade != '') {
			$link = 'index.php?option=com_phocagallery&view=phocagalleryupgrade'.$linkUpgrade;
		} else {
			$link = 'index.php?option=com_phocagallery';
		}
		$this->setRedirect($link, $msg);
	}
	
	
	function AddColumnIfNotExists(&$errorMsg, $table, $column, $attributes = "INT( 11 ) NOT NULL DEFAULT '0'", $after = '' ) {
		
		global $mainframe;
		$db				=& JFactory::getDBO();
		$columnExists 	= false;

		$query = 'SHOW COLUMNS FROM '.$table;
		$db->setQuery( $query );
		if (!$result = $db->query()){return false;}
		$columnData = $db->loadObjectList();
		
		foreach ($columnData as $valueColumn) {
			if ($valueColumn->Field == $column) {
				$columnExists = true;
				break;
			}
		}
		
		if (!$columnExists) {
			if ($after != '') {
				$query = "ALTER TABLE `".$table."` ADD `".$column."` ".$attributes." AFTER `".$after."`";
			} else {
				$query = "ALTER TABLE `".$table."` ADD `".$column."` ".$attributes."";
			}
			$db->setQuery( $query );
			if (!$result = $db->query()){return false;}
			$errorMsg = 'notexistcreated';
		}
		
		return true;
	}
}
// utf-8 test: ä,ö,ü,ř,ž
?>