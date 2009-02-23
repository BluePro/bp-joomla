<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin');

class plgSystemBlueprogoogleanalytics extends JPlugin {

	function onAfterRender() {
		$tracker = $this->params->get('tracker', '');
		$app =& JFactory::getApplication();
		
		if (!$tracker || $app->isAdmin()) return true;
		
		$body = JResponse::getBody();
		$googlescript = sprintf('
			<script type="text/javascript">
				var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
				document.write(unescape("%%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%%3E%%3C/script%%3E"));
			</script>
			<script type="text/javascript">
				try {
					var pageTracker = _gat._getTracker("%s");
					pageTracker._trackPageview();
				} catch(err) {}
			</script>', $tracker);
		
		$position = strrpos($body, "</body>");
		
		if($position) {
			$body = substr($body, 0, $position) . $googlescript . substr($body, $position);
			JResponse::setBody($body);
		}
	}
}
