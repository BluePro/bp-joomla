<?php defined('_JEXEC') or die('Restricted access'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/baby/css/screen.css" type="text/css" />
</head>
<body>
	<div id="header"><jdoc:include type="modules" name="top" /></div>
	<div id="content">
<?php if ($this->countModules('user1')) : ?>
	<div id="logo">
		<h1><span>Vojtíšek Štěpaník</span></h1>
		<div>
			Dnes je mi <span>
<?php
	// Vypocet veku
	$od = mktime(0, 0, 0, 6, 4, 2008);
    $do = time();
    $od_l = date('I', $od);
    $do_l = date('I', $do);

    if ($do_l > $od_l) $do += 60 * 60;
    elseif ($do_l < $od_l) $od += 60 * 60;

    $diff = floor(($do - $od) / (24 * 60 * 60));
    echo $diff;
?>
			</span> dní!
		</div>
	</div>
	<jdoc:include type="modules" name="user1" />
	<div class="cleaner">&nbsp;</div>
<?php endif; ?>
	<jdoc:include type="component" />
	</div>
	<div id="footer">
		<div class="container">
			<div id="toy_01"></div>
			<jdoc:include type="modules" name="bottom" />
			<div id="toy_02"></div>
		</div>
	</div>
</body>
</html>