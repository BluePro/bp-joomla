<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

class plgContentBPSlider extends JPlugin {
	
	function onPrepareContent(&$article, &$params, $page = 0) {
		$matches = array();
		$replacement = array();
		$regexp = '~{slider=([^}]*)}([^{]*){/slider}~si';
		$mask = '<span class="slider-title">%s</span><div class="slider-element">%s</div>';
		$js = '
window.addEvent("domready", function() {
	var titles = $$(".slider-title");
	var elements = $$(".slider-element");
	var mooBlock = new Accordion(titles, elements, {
		' . ($this->params->get('show_first') ?	($this->params->get('first_transition') ? 'display: 0' : 'show: 0') : 'display: -1') . ',
		' . (!$this->params->get('opacity') ? 'opacity: false,
		' : '') . ($this->params->get('always_hide') ? 'alwaysHide: true,
		' : '') . ($this->params->get('duration') != '500' || $this->params->get('transition') ? 'duration: ' . ($this->params->get('transition') ? ($this->params->get('duration') + 500) : $this->params->get('duration')) . ',
		' : '') . ($this->params->get('transition') ? 'transition: Fx.Transitions.' . $this->params->get('transition') . '.easeOut,
		' : '') . 'onActive: function(title, element) {
			title.addClass("expanded");
		},
		onBackground: function(title, element) {
			title.removeClass("expanded");
		}
	});
});';
		
		if (preg_match_all($regexp, $article->text, $matches, PREG_SET_ORDER)) {
			JHTML::_('behavior.mootools');
			$document = JFactory::getDocument();
			$document->addScriptDeclaration($js);
			$document->addStyleDeclaration('	.slider-title {cursor: pointer;}');
			
			foreach ($matches as $matchset) {
				$replacement[$matchset[0]] = sprintf($mask, $matchset[1], $matchset[2]);
			}
			
			$article->text = strtr($article->text, $replacement);
		}
	}
	
}
