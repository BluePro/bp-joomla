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
jimport('joomla.application.component.model');

class PhocaGuestbookModelPhocaGuestbook extends JModel
{
	var $_id 			= null;
	var $_data 			= null;
	var $_total 		= null;
	var $_context 		= 'com_phocaguestbook.posts';

	function __construct(){
		global $mainframe;
		parent::__construct();
		
		$config 			= JFactory::getConfig();		
		$paramsC 			= JComponentHelper::getParams('com_phocaguestbook') ;
		$default_pagination	= $paramsC->get( 'default_pagination', '20' );
		$context			= $this->_context.'.';
	
		// Get the pagination request variables
		$this->setState('limit', $mainframe->getUserStateFromRequest($context .'limit', 'limit', $default_pagination, 'int'));
		$this->setState('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));
		// In case limit has been changed, adjust limitstart accordingly
		$this->setState('limitstart', ($this->getState('limit') != 0 ? (floor($this->getState('limitstart') / $this->getState('limit')) * $this->getState('limit')) : 0));
		// Get the filter request variables
		$this->setState('filter_order', JRequest::getCmd('filter_order', 'ordering'));
		$this->setState('filter_order_dir', JRequest::getCmd('filter_order_Dir', 'ASC'));

		$id = JRequest::getVar('id', 0, '', 'int');
		$this->setId((int)$id);
	}

	function store(&$postNew) {	
	
		$user 		= &JFactory::getUser();
		$db 		= &JFactory::getDBO();
		$uri 		= &JFactory::getURI();
		$app 		= JFactory::getApplication();
		$token		= JUtility::getToken();
		$params		= JComponentHelper::getParams('com_phocaguestbook');
		$tmpl		= array();
		
		
		// Security
		$sec = 0;
		$tmpl['specific_itemid'] 	= $params->get( 'specific_itemid', '' );
		$itemids					= explode(',', $tmpl['specific_itemid']);

		if (!empty($itemids) && isset($itemids[0]) && (int)$itemids[0] > 0) {
			$itemid	= JRequest::getCmd('Itemid');
			if (!in_array($itemid, $itemids)) {
				$sec = 1;
			}
		}
		
		if (!JRequest::getInt( $token, 0, 'post' )) {
			$sec = 1;
		}
		if (JRequest::getCmd('view') != 'phocaguestbook') {
			$sec = 1;
		}
		if (JRequest::getCmd('option') != 'com_phocaguestbook') {
			$sec = 1;
		}
		if (JRequest::getCmd('task') != 'submit') {
			$sec = 1;
		}
		if ((int)$sec == 1) {
			$app->redirect(JRoute::_('index.php', false), JText::_("Form data is not valid"));
			exit;
		}
		
		
		// - - - - - - - - - - 
		//Some POST data can be required or not, If yes, set message if there is POST data == ''
		//Get the params, e.g. if we define in params, that e.g. title can be "", we will not check it
		//if params doesn't exist it will be required, if exists and is required (1) it is required
		$tmpl['session_suffix']		= $params->get('session_suffix');
		//Get Session Data (we have saved new session, because we want to check captcha
		$session 					=& JFactory::getSession();
		$phoca_guestbook_session 	= $session->get('pgbsess'.$tmpl['session_suffix']);
		
		$tmpl['display_title_form'] 	= $params->get( 'display_title_form', 2 );
		$tmpl['display_name_form'] 		= $params->get( 'display_name_form', 2 );
		$tmpl['display_email_form']	 	= $params->get( 'display_email_form', 1 );
		$tmpl['display_website_form'] 	= $params->get( 'display_website_form', 0 );
		$tmpl['display_content_form'] 	= $params->get( 'display_content_form', 2 );
		$tmpl['max_char'] 				= $params->get( 'max_char', 2000 );
		$tmpl['send_mail'] 				= $params->get( 'send_mail', 0 );
		$tmpl['registered_users_only'] 	= $params->get( 'registered_users_only', 0 );
		$tmpl['enable_captcha']	 		= $params->get( 'enable_captcha', 1 );
		$tmpl['enable_captcha_users']	= $params->get( 'enable_captcha_users', 0 );
		$tmpl['enable_akismet'] 	    = $params->get( 'enable_akismet', 0 );
		$tmpl['akismet_api_key'] 	    = $params->get( 'akismet_api_key', "" );
		$tmpl['akismet_block_spam'] 	= $params->get( 'akismet_block_spam', 0 );
		$tmpl['akismet_url'] 		    = $params->get( 'akismet_url', 0 );
		$tmpl['username_or_name'] 		= $params->get( 'username_or_name', 0 );
		$tmpl['predefined_name'] 		= $params->get( 'predefined_name', '' );
		$tmpl['disable_user_check'] 	= $params->get( 'disable_user_check', 0 );
		$tmpl['enable_html_purifier'] 	= $params->get( 'enable_html_purifier', 1 );
		
		//Get POST Data - - - - - - - - - 
		$post				= JRequest::get('post');
		$post2['content']	= JRequest::getVar( 'pgbcontent', '', 'post', 'string', JREQUEST_ALLOWRAW );
		$post2['captcha']	= JRequest::getVar( 'captcha', '', 'post', 'string' );
		$post2['title']		= JRequest::getVar( 'title', '', 'post', 'string' );
		$post2['pgusername']= JRequest::getVar( 'pgusername', '', 'post', 'string' );
		$post2['email']		= JRequest::getVar( 'email', '', 'post', 'string' );
		$post2['website']	= JRequest::getVar( 'website', '', 'post', 'string' );
		$post2['task']		= JRequest::getVar( 'task', '', 'post', 'string' );
		$post2['save']		= JRequest::getVar( 'save', '', 'post', 'string' );
		
		if (!isset($post2['captcha']) || (isset($post2['captcha']) && $post2['captcha'] == '')) {
			$post2['captcha'] = '';
		}
        // - + title, name, email, website, content ( == 0) 
		// HTML Purifier - - - - - - - - - - 
		if ($tmpl['enable_html_purifier'] == 0) {
			$filterTags		= '';//preg_split( '#[,\s]+#', trim( ) ); // black list method is used
			$filterAttrs	= '';//preg_split( '#[,\s]+#', trim( ) ); // black list method is used
			$filter	= new JFilterInput( $filterTags, $filterAttrs, 1, 1, 1 );
			$post2['content']	= $filter->clean( $post2['content'] );
		} else {		
			require_once( JPATH_COMPONENT.DS.'assets'.DS.'library'.DS.'HTMLPurifier.auto.php' );
			$configP = HTMLPurifier_Config::createDefault();
			$configP->set('Core', 'TidyFormat', !empty($_REQUEST['tidy']));
			$configP->set('Core', 'DefinitionCache', null);
			$configP->set('HTML', 'Allowed', 'strong,em,p[style],span[style],img[src|width|height|alt|title],li,ul,ol,a[href],u,strike,br');
			$purifier = new HTMLPurifier($configP);
			$post2['content'] = $purifier->purify($post2['content']);
		}
		
		$cid					= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$post2['catid'] 		= (int) $cid[0];
		$post2['published'] 	= (int) 1;
		
		if ($params->get( 'review_item' ) != '') {
			$post2['published'] = (int)$params->get( 'review_item' );
		}
		$post2['ip']			= $_SERVER["REMOTE_ADDR"];
		
		
		if (!isset($post2['pgusername'])) {
			$post2['username']	= '';
		} else {
			$post2['username']	= $post2['pgusername'];
		}
		
		if (!isset($post2['email'])) {
			$post2['email']	= '';
		}
		if (!isset($post2['website'])) {
			$post2['website']	= '';
		}
		
		// Maximum of character, they will be saved in database
		$post2['content']	= substr($post2['content'], 0, $tmpl['max_char']);

		// Title Check
		if ($tmpl['display_title_form'] == 2) {
			if ( $post2['title'] && trim($post2['title']) !='' ) {
				$title = 1;// there is a value in title ... OK
			} else {
				$title = 0;
				JRequest::setVar( 'title-msg-1', 1, 'get',true );// there is no value in title ... FALSE
			}
		} else if ($tmpl['display_title_form'] == 0) {
			if ( $post2['title'] && trim($post2['title']) !='' ) { 
				$app->redirect(JRoute::_('index.php', false), JText::_("Possible spam detected"));
				exit;
			}
			$title = 1;
		} else {
			$title = 1;//there is a value or there is no value but it is not required, so it is OK
		}
		
		if ($title != 0 && preg_match("~[<|>]~",$post2['title'])) {
			$title = 0;
			JRequest::setVar( 'title-msg-2', 	1, 'get',true );
		}
		
		// Username or name check
		//$post2 is the same for both (name or username)
		//$tmpl['username'] is the same for both (name or username)
		if ($tmpl['username_or_name'] == 1) {
			if ($tmpl['display_name_form'] == 2) {
				if ( $post2['username'] && trim($post2['username']) !='' ) {
					$username = 1;
				} else {
					$username = 0;
					JRequest::setVar( 'username-msg-1', 	1, 'get',true );
				}
			} else if ($tmpl['display_name_form'] == 0) {
				if ( $post2['username'] && trim($post2['username']) !='' ) { 
					$app->redirect(JRoute::_('index.php', false), JText::_("Possible spam detected"));
					exit;
				}
				$username = 1;
			} else {
				$username = 1;
			}
			
			if ($username != 0 && preg_match("~[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+]~",$post2['username'])) {
				$username = 0;
				JRequest::setVar( 'username-msg-2', 	1, 'get',true );
			}
			
			if ($tmpl['disable_user_check'] == 0) {
				// Check for existing username
				$query = 'SELECT id'
				. ' FROM #__users '
				. ' WHERE username = ' . $db->Quote($post2['username'])
				. ' OR name = ' . $db->Quote($post2['username'])
				. ' AND id != '. (int) $user->id;
				$db->setQuery( $query );
				$xid = intval( $db->loadResult() );
				if ($xid && $xid != intval( $user->id )) {
					$username = 0;
					JRequest::setVar( 'username-msg-3', 	1, 'get',true );
				}
			}
		} else {
			if ($tmpl['display_name_form'] == 2) {
				if ( $post2['username'] && trim($post2['username']) !='' ) {
					$username = 1;
				} else {
					$username = 0;
					JRequest::setVar( 'username-msg-1', 	1, 'get',true );
				}
			} else if ($tmpl['display_name_form'] == 0) {
				if ( $post2['username'] && trim($post2['username']) !='' ) { 
					$app->redirect(JRoute::_('index.php', false), JText::_("Possible spam detected"));
					exit;
				}
				$username = 1;
			} else {
				$username = 1;
			}
			
			if ($username != 0 && preg_match("~[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+]~",$post2['username'])) {
				$username = 0;
				JRequest::setVar( 'username-msg-2', 	1, 'get',true );
			}
			
			if ($tmpl['disable_user_check'] == 0) {
				// Check for existing username
				$query = 'SELECT id'
				. ' FROM #__users '
				. ' WHERE username = ' . $db->Quote($post2['username'])
				. ' OR name = ' . $db->Quote($post2['username'])
				. ' AND id != '. (int) $user->id;
				$db->setQuery( $query );
				$xid = intval( $db->loadResult() );
				if ($xid && $xid != intval( $user->id )) {
					$username = 0; JRequest::setVar( 'username-msg-3', 	1, 'get',true );
				}
			}
		}
		
		// Email Check
		if ($tmpl['display_email_form'] == 2) {
			if ($post2['email'] && trim($post2['email']) !='' ) {
				$email = 1;
			} else {
				$email = 0;
				JRequest::setVar( 'email-msg-1', 	1, 'get',true );
			}
			
			if ($email != 0 && ! JMailHelper::isEmailAddress($post2['email']) ) {
				$email = 0;
				JRequest::setVar( 'email-msg-2', 1, 'get',true );
			}	
		} else if ($tmpl['display_email_form'] == 0) {
				if ( $post2['email'] && trim($post2['email']) !='' ) { 
					$app->redirect(JRoute::_('index.php', false), JText::_("Possible spam detected"));
					exit;
				}
				$email = 1;
		} else {
			$email = 1;
			
			if ($email != 0 && $post2['email'] != '' && ! JMailHelper::isEmailAddress($post2['email']) ) {
				$email = 0;
				JRequest::setVar( 'email-msg-2', 1, 'get',true );
			}
		}

		if ($tmpl['disable_user_check'] == 0) {
			// check for existing email
			$query = 'SELECT id'
				. ' FROM #__users '
				. ' WHERE email = '. $db->Quote($post2['email'])
				. ' AND id != '. (int) $user->id;
			$db->setQuery( $query );
			$xid = intval( $db->loadResult() );
			if ($xid && $xid != intval( $user->id )) {
				$email = 0; JRequest::setVar( 'email-msg-3', 1, 'get',true );
			}
		}
		// Website Check
		if ($tmpl['display_website_form'] == 2) {
			if ($post2['website'] && trim($post2['website']) !='' ) {
				$website = 1;
			} else {
				$website = 0; JRequest::setVar( 'website-msg-1', 	1, 'get',true );
			}
			
			if ($website != 0 && !PhocaguestbookHelper::isURLAddress($post2['website']) ) {
				$website = 0;
				JRequest::setVar( 'website-msg-2', 1, 'get',true );
			}
			
		} else if ($tmpl['display_website_form'] == 0) {
				if ( $post2['website'] && trim($post2['website']) !='' ) { 
					$app->redirect(JRoute::_('index.php', false), JText::_("Possible spam detected"));
					exit;
				}
				$website = 1;
		} else {
			$website = 1;
			if ($website != 0 && $post2['website'] != '' && !PhocaguestbookHelper::isURLAddress($post2['website']) ) {
				$website = 0;
				JRequest::setVar( 'website-msg-2', 1, 'get',true );
			}
		}
		
		// Content Check
		if ($tmpl['display_content_form'] == 2) {
			if ($post2['content'] && trim($post2['content']) !='' ) {
				$content = 1;
			} else {
				$content = 0; JRequest::setVar( 'content-msg-1', 	1, 'get',true );
			}
		} else if ($tmpl['display_content_form'] == 0) {
				if ( $post2['content'] && trim($post2['content']) !='' ) { 
					$app->redirect(JRoute::_('index.php', false), JText::_("Possible spam detected"));
					exit;
				}
				$content = 1;
		} else {
			$content = 1;
		}
		
		// IP BAN Check
		$ip_ban			= trim( $params->get( 'ip_ban' ) );
		$ip_ban_array	= explode( ',', $ip_ban );
		$tmpl['ipa'] 			= 1;//display
		if (is_array($ip_ban_array)) {
			foreach ($ip_ban_array as $valueIp) {
				//if ($post2['ip'] == trim($value)) {
				if ($valueIp != '') {
					if (strstr($post2['ip'], trim($valueIp)) && strpos($post2['ip'], trim($valueIp))==0) {
						$tmpl['ipa'] = 0;
						JRequest::setVar( 'ip-msg-1', 	1, 'get',true );
						break;
					}
				}
			}
		}
		
		// Not allowed URLs
		$tmpl['deny_url_words'] = $params->get( 'deny_url_words', '' );
		if (!empty($tmpl['deny_url_words'])) {
			$tmpl['deny_url_words'] = explode(',',$params->get( 'deny_url_words', '' ));
		}

		if (!empty($tmpl['deny_url_words']) && $content == 1) {
			$deny_url = 1;
			foreach ($tmpl['deny_url_words'] as $word) {
				if ($word != '') {
					if ((strpos($post2['content'], $word) !== false)
					   || (strpos($post2['title'], $word) !== false)
					   || (strpos($post2['username'], $word) !== false)) {
						$deny_url = 0;
						JRequest::setVar( 'denyurl-msg-1', 	1, 'get',true );
					}
				}
			}
		} else {
			$deny_url = 1;
		}
		
		
		// Registered user Check
		if ($tmpl['registered_users_only'] == 1) {
			if ( $user->id > 0 ) {
				$reguser = 1;
			} else {
				$reguser = 0; JRequest::setVar( 'reguser-msg-1', 	1, 'get',true );
			}
		} else {
			$reguser = 1;
		}
		
		// Captcha not for registered
		if ((int)$tmpl['enable_captcha_users'] == 1) {
			if ((int)$user->id > 0) {
				$tmpl['enable_captcha'] = 0;
			}
		}
		
		// Enable or disable Captcha
		if ($tmpl['enable_captcha'] < 1) {
			// is disabled
			$phoca_guestbook_session 	= 1;
			$post2['captcha'] 			= 1;
		}
		
		/*
		if ($content != 0 && eregi( "[\<|\>]", $post2['content'])) {
			$content = 0; JRequest::setVar( 'content-msg-2', 	1, 'get',true );
		}*/
		
		// SAVING DATA - - - - - - - - - - 
		//the captcha picture code is the same as captcha input code, we can save the data
		//and other post data are OK
		
		if ($phoca_guestbook_session == '') {
			
			// Maybe it is used a reCAPTCHA - we don't know but, because of security reason
			// no information about which method is used is sent through the form
			// So try to get reCAPTCHA
			require_once( JPATH_COMPONENT.DS.'helpers'.DS.'recaptchalib.php' );
			
			$resp = PhocaGuestbookHelperReCaptcha::recaptcha_check_answer ($params->get('recaptcha_privatekey', ''),
                    $_SERVER["REMOTE_ADDR"],
					JRequest::getVar( 'recaptcha_challenge_field', '', 'post', 'string' ),
                    JRequest::getVar( 'recaptcha_response_field', '', 'post', 'string' ));
					
			if (!$resp->is_valid) {
				$phoca_guestbook_session 	= '';
				$post2['captcha'] 			= '';
			} else {
				$phoca_guestbook_session 	= 1;
				$post2['captcha'] 			= 1;
			}
		}

		if ($phoca_guestbook_session && $phoca_guestbook_session != '' &&
			isset($post2['captcha']) && $post2['captcha'] != '' &&  // -
			$phoca_guestbook_session == $post2['captcha'] && 
			$title == 1 && 
			$username == 1 && 
			$email==1 && 
			$content == 1 &&
			$website == 1 &&
			$tmpl['ipa'] == 1 &&
			$deny_url == 1 &&
			$reguser == 1 && 
			isset($post2['task']) && 
			$post2['task'] == 'submit' &&
			isset($post2['save']) && 
			isset($post2['published'])) {
						
			$post2['homesite']	= $post2['website'];
			
			
			
			/* Akismet 
			 * after checking, that everything is valid and the captcha is good,
			 * we ask the akismet Service if this post is a spam,
			 * given that akismet check is enabled in the config
			 */
			//optimistic Default values, might be overriden
			/** If this is true, the content will be posted, either as a published or unpublished post*/
			$akismetIsGood = true;
			/** If this is true, the content will be unpublished (or not posted, see above)*/
			$akismetSuspectSpam = false;
				
			if ($tmpl['enable_akismet'] == 1){
				$msgA = '';

					
				$akismetSuspectSpam = PhocaguestbookAkismetHelper::checkSpam(
					$tmpl['akismet_api_key'] ,
					$tmpl['akismet_url'],
					$post2['username'],
					$post2['email'],
					$post2['website'],
					$post2['content'], $msgA);

					
				// Error while setting Akismet
				if ($msgA != '') {
					$postNew['displayformerror'] 	= 0;
					$postNew['akismeterror'] 		= JText::_( 'Phoca Guestbook Akismet not correctly set' );
					return false;
				}
				if ($akismetSuspectSpam && $tmpl['akismet_block_spam'] == 1){
					$akismetIsGood = false;
				}
			}

			//If akismet decides this is a spam post, and settings state, that spam gets blocked completly, return with false
			if (!$akismetIsGood){
				$postNew['displayformerror'] 	= 0;
				$postNew['akismeterror'] 		= JText::_( 'Phoca Guestbook Spam Blocked' );
				return false;
			}
			
			//Akismet decides this is a spam post, the settings state, that spam posts get submitted but unpublished.
			if ($akismetSuspectSpam){
				//unpublish
				$post2['published'] = 0;
			}
			
			$data				= $post2;
			// TRUE MODEL
			$row =& $this->getTable();

			// Bind the form fields to the table
			if (!$row->bind($data)) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
			
			// First check: no category
			if ((int)$row->catid < 1) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
			
			// Second check: not existing category
			$categoryExists = $this->_checkGuestbook((int)$row->catid);
			if (!$categoryExists) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
			// Create the timestamp for the date
			$row->date = gmdate('Y-m-d H:i:s');

			// if new item, order last in appropriate group
			if (!$row->id) {
				$where = 'catid = ' . (int) $row->catid ;
				$row->ordering = $row->getNextOrder( $where );
			}

			// Make sure the table is valid
			if (!$row->check()) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}

			// Store the Phoca gallery table to the database
			if (!$row->store()) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
			
			// Everything OK
			if ((int)$tmpl['send_mail'] > 0) {
				PhocaGuestbookModelPhocaGuestbook::sendPhocaGuestbookMail((int)$tmpl['send_mail'], $data, $uri->toString(), $tmpl);
			}

			$postNew = $post2;
			return true;
		
		} else {// captcha image code is not the same as captcha input field (don't redirect because we need post data)
			if ($post2['captcha'] == '')						{JRequest::setVar( 'captcha-msg', 1, 'get',true );}
			if (!$post2['captcha'])								{JRequest::setVar( 'captcha-msg', 1, 'get',true );}
			if ($phoca_guestbook_session != $post2['captcha'])	{JRequest::setVar( 'captcha-msg', 1, 'get',true );}
			$post2['displayformerror'] = 1;
			$postNew = $post2;
			return false;
		}
	}
	
	function setId($id) {
		// Set category ID and wipe data
		$this->_id			= $id;
		$this->_category	= null;
	}

	function getData(){
		if (empty($this->_data)) {	
			$query = $this->_buildQuery();

			$this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
		}
		return $this->_data;
	}

	function getTotal() {
		if (empty($this->_total)) {
			$query = $this->_buildQuery();
			$this->_total = $this->_getListCount($query);
		}
		return $this->_total;
	}
	
	function getPagination() {
		if (empty($this->_pagination)) {
			jimport('joomla.html.pagination');
			$this->_pagination = new PhocaGuestbookPagination( $this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
		}
		return $this->_pagination;
	}


	function _buildQuery() {
		// We need to get a list of all items in the given category
		$query = 'SELECT *' .
			' FROM #__phocaguestbook_items' .
			' WHERE catid = '.(int) $this->_id.
			' AND published = 1' .
			' ORDER BY ordering DESC';
		return $query;
	}
	
	function getGuestbook() {
		// Load the Category data
		if ($this->_loadGuestbook()) {
			// Initialize some variables
			$user = &JFactory::getUser();

			// Make sure the category is published
			if (!$this->_guestbook->published) {
				JError::raiseError(404, JText::_("Resource Not Found"));
				return false;
			}
			// check whether category access level allows access
			if ($this->_guestbook->access > $user->get('aid', 0)) {
				JError::raiseError(403, JText::_("ALERTNOTAUTH"));
				return false;
			}
		}
		return $this->_guestbook;
	}
	
	function _loadGuestbook() {
		if (empty($this->_guestbook)) {
			// current category info
			$query = 'SELECT c.*,' .
				' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(\':\', c.id, c.alias) ELSE c.id END as slug '.
				' FROM #__phocaguestbook_books AS c' .
				' WHERE c.id = '. (int) $this->_id ;
				//' AND c.section = "com_phocaguestbook"';
			$this->_db->setQuery($query, 0, 1);
			$this->_guestbook = $this->_db->loadObject();
		}
		return true;
	}
	
	function delete($cid = 0) {
		$query = 'DELETE FROM #__phocaguestbook_items'
			. ' WHERE id = '.(int)$cid ;
		$this->_db->setQuery( $query );
		if(!$this->_db->query()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		return true;
	}
	
	function publish($cid = 0, $publish = 1) {
		$query = 'UPDATE #__phocaguestbook_items'
			. ' SET published = '.(int) $publish
			. ' WHERE id = '.(int)$cid
		;
		$this->_db->setQuery( $query );
		if (!$this->_db->query()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		return true;
	}
	
	function countItem($id = 0) {
		$query = 'SELECT COUNT(id) FROM #__phocaguestbook_items'
			. ' WHERE published = 1'
			. ' AND catid = '.(int)$id;
		;
		$this->_db->setQuery( $query );
		if (!$this->_db->query()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		return $this->_db->loadRow();
	}
	
	function _checkGuestbook($id) {
		
		$query = 'SELECT c.id' .
			' FROM #__phocaguestbook_books AS c' .
			' WHERE c.id = '. (int) $id ;
		$this->_db->setQuery($query, 0, 1);
		$guestbookExists = $this->_db->loadObject();
		if (isset($guestbookExists->id)) {
			return true;
		}
		return false;
	}
	
	function sendPhocaGuestbookMail ($id, $post2, $url, $tmpl) {
		$app 		= JFactory::getApplication();
		$db 		= JFactory::getDBO();
		$sitename 	= $app->getCfg( 'sitename' );
		
		//get all super administrator
		$query = 'SELECT name, email, sendEmail' .
		' FROM #__users' .
		' WHERE id = '.(int)$id;
		$db->setQuery( $query );
		$rows = $db->loadObjectList();
		
		if (isset($post2['title']) && $post2['title'] != '') {
			$subject = $sitename .' ('.JText::_( 'New Phoca Guestbook Item' ). '): '.PhocaguestbookHelper::wordDelete($post2['title'], 25,'...');
			$title = $post2['title'];
		} else {
			$subject = $sitename ." (".JText::_( 'New Phoca Guestbook Item' ).')';
			$title = $post2['title'];
		}
		
		if (isset($post2['username']) && $post2['username'] != '') {
			$fromname = $post2['username'];
		} else {
			$fromname = $tmpl['predefined_name'];
		}
		
		if (isset($post2['email']) && $post2['email'] != '') {
			$mailfrom = $post2['email'];
		} else {
			$mailfrom = $rows[0]->email;
		}
		
		if (isset($post2['content']) && $post2['content'] != '') {
			$content = $post2['content'];
		} else {
			$content = "...";
		}
		
		$email = $rows[0]->email;
		
		$post2['content'] = str_replace("</p>", "\n", $post2['content'] );
		$post2['content'] = strip_tags($post2['content']);
		
		$message = JText::_( 'New Phoca Guestbook item saved' ) . "\n\n"
							. JText::_( 'Website' ) . ': '. $sitename . "\n"
							. JText::_( 'From' ) . ': '. $fromname . "\n"
							. JText::_( 'Date' ) . ': '. JHTML::_('date',  gmdate('Y-m-d H:i:s'), JText::_( 'DATE_FORMAT_LC2' )) . "\n\n"
							. JText::_( 'Title' ) . ': '.$title."\n"
							. JText::_( 'Message' ) . ': '."\n"
							. "\n\n"
							.PhocaguestbookHelper::wordDelete($post2['content'],400,'...')."\n\n"
							. "\n\n"
							. JText::_( 'Click the link' ) ."\n"
							. $url."\n\n"
							. JText::_( 'Regards' ) .", \n"
							. $sitename ."\n";
					
		$subject = html_entity_decode($subject, ENT_QUOTES);
		$message = html_entity_decode($message, ENT_QUOTES);
		
		JUtility::sendMail($mailfrom, $fromname, $email, $subject, $message);	
		return true;
	}
}
?>
