<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

class plgContentBPHighlight extends JPlugin {

	private $_counter = 0;
	
	public function onPrepareContent(&$article, &$params, $page = 0) {
		$tag_name = $this->params->get('tag_name', 'highlight');
		if (strpos($article->text, sprintf('{%s', $tag_name)) !== false) {
			// Init Shadowbox
			JHTML::_('behavior.mootools');
			$document = JFactory::getDocument();
			$document->addStyleSheet(JURI::base() . 'media/bphighlight/shadowbox.css');
			$document->addScript(JURI::base() . 'media/bphighlight/shadowbox.js');
			$document->addScriptDeclaration($this->_getScript());
			
			// Insert links
			$pattern = sprintf('~{%s name="([^"]+)"}([^{]+){/%s}~u', $tag_name, $tag_name);
			$article->text = preg_replace_callback($pattern, array($this, 'replacement'), $article->text);
		}
	}
	
	private function _getScript() {
		return 'Shadowbox.init();';
	}
	
	public function replacement($matches) {
		$this->_counter++;
		$width = $this->params->get('window_width');
		$height = $this->params->get('window_height');
		
		return sprintf('
			<a href="#highlight_box_%d" rel="shadowbox%s%s">%s</a>
			<div id="highlight_box_%d" style="display: none;"><div class="highlight_box">%s</div></div>',
			$this->_counter, $width ? ";width=$width" : '',  $height ? ";height=$height" : '',$matches[1], $this->_counter, $matches[2]);
	}
	
}
