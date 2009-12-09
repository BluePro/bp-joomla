<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin');

class plgSystemBlueprogoogleanalytics extends JPlugin {

	function onAfterRender() {
		$tracker = $this->params->get('tracker', '');
		$app =& JFactory::getApplication();
		
		if (!$tracker || $app->isAdmin() || strpos($_SERVER['PHP_SELF'], 'index.php') === false) return true;
		
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
		
		$position = utf8_strrpos($body, "</body>");
		
		if ($position) {
			$body = utf8_substr($body, 0, $position) . $googlescript . utf8_substr($body, $position);
			JResponse::setBody($body);
		}
	}
}
