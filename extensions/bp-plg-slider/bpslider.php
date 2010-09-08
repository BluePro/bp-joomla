<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

class plgContentBPSlider extends JPlugin {
	
	public function onPrepareContent(&$article, &$params, $page = 0) {
		if (strpos($article->text, 'slider')) {
			JHTML::_('behavior.mootools');
			$document = JFactory::getDocument();
			$document->addScriptDeclaration($this->_getScript());
		}
	}
	
	private function _getScript() {
		return sprintf("
	window.addEvent('domready', function() {
		var titles = $$('.slider-title');
		var elements = $$('.slider-element');
		var slider = new Accordion(titles, elements, {%s%s%s%s%s
			onActive: function(title, element) {
				if (title) title.addClass('expanded');
			},
			onBackground: function(title, element) {
				if (title) title.removeClass('expanded');
			}
		});
	});",
			$this->params->get('show_first') ? ($this->params->get('first_transition') ? 'display: 0, ' : 'show: 0, ') : 'display: -1, ',
			!$this->params->get('opacity') ? 'opacity: false, ' : '',
			$this->params->get('always_hide') ? 'alwaysHide: true, ' : '',
			$this->params->get('duration') != '500' || $this->params->get('transition') ? 'duration: ' . ($this->params->get('transition') ? ($this->params->get('duration') + 500) : $this->params->get('duration')) . ', ' : '',
			$this->params->get('transition') ? 'transition: Fx.Transitions.' . $this->params->get('transition') . '.easeOut, ' : '');
	}
	
}
