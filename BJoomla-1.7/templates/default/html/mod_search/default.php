<?php defined('_JEXEC') or die('Restricted access'); ?>

<form action="<?php echo JRoute::_('index.php'); ?>" method="post">
<div class="mod_search<?php echo $params->get('moduleclass_sfx') ?>">
	<input type="hidden" name="task" value="search" />
	<input type="hidden" name="option" value="com_search" />
<?php
$output = sprintf('<input name="searchword" maxlength="20" alt="%s" type="text" size="%d" value="%s" onblur="if(this.value==\'\') this.value=\'%s\';" onfocus="if(this.value==\'%s\') this.value=\'\';" />',
	$button_text, $width, $text, $text, $text);

if ($button) {
	if ($imagebutton) $button = sprintf('<input type="image" value="%s" src="%s" />', $button_text, $img);
	else $button = sprintf('<input type="submit" value="%s" />', $button_text);
}

switch ($button_pos) {
	case 'top' :
		$output = $button . '<br />' . $output;
		break;
	case 'bottom' :
		$output = $output . '<br />' . $button;
		break;
	case 'right' :
		$output = $output . $button;
		break;
	case 'left' :
	default :
		$output = $button . $output;
		break;
}

echo $output;
?>
</div>
</form>