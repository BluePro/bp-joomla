<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @plugin BP TOC
 * @copyright Copyright (C) Ondřej Hlaváč 2009 http://ondrej.hlavacovi.net
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

class plgContentBPTOC extends JPlugin {

	private $_params = null;

	function __construct(&$subject, $params) {
		$plugin = JPluginHelper::getPlugin('content', 'bptoc');
		$this->_params = new JParameter($plugin->params);
		
		parent::__construct($subject, $params);
	}
	
	function onPrepareContent(&$article, &$params, $limitstart) {
		$level = $this->_params->get('level', 'h2');
		$replacement = array();
		$list = "<div class=\"toc\"><ul>\n";
		
		if (strpos($article->text, '{toc}') !== false) {
			if (preg_match_all(sprintf('~(<%s[^>]*>)([^<]+)(</%s>)~ui', $level, $level), $article->text, $matches, PREG_SET_ORDER)) {
				foreach ($matches as $index => $matchset) {
					$replacement[$matchset[0]] = sprintf('%s<a name="toc%d">%s</a>%s', $matchset[1], $index, $matchset[2], $matchset[3]);
					$list .= sprintf("<li><a href=\"#toc%d\">%s</a></li>\n", $index, $matchset[2]);
				}
				$list .= "</ul></div>\n";
				
				$article->text = strtr($article->text, $replacement);
				$article->text = str_replace('{toc}', $list, $article->text);
			} else {
				$article->text = str_replace('{toc}', '', $article->text);
			}
		}
	}

}