<?php
defined('_JEXEC') or die('Restricted access');

$config = new JConfig();
$user = JFactory::getUser();
	
if ($user->get('guest') == 1 or $user->usertype == 'Registered') {
	$header = $this->getHeadData();
	$scripts = array();
	foreach ($header['scripts'] as $script => $type) {
		if ($script != '/media/system/js/mootools.js' && $script != '/media/system/js/caption.js') {
			$scripts[$script] = $type;
		}
	}
	$header['scripts'] = $scripts;
	$this->setHeadData($header);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/default/css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/default/css/content.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/default/css/print.css" type="text/css" media="print" />
<!--[if lte IE 6]>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/default/css/ie6.css" type="text/css" media="screen" />
<![endif]-->
	<link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/default/images/favicon.gif" />
</head>

<body>
	<div id="logo">
<?php
	if ($this->countModules('logo')) {
?>
		<jdoc:include type="modules" name="logo" /> 
<?php
	} else {
		echo $config->sitename;
	}
?>
	</div>
	<div id="top"><jdoc:include type="modules" name="top" /></div>
	<div id="left"><jdoc:include type="modules" name="left" style="header" /></div>
	<div id="content">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
	</div>
	<div id="bottom"><jdoc:include type="modules" name="bottom" /></div>
</body>
</html>