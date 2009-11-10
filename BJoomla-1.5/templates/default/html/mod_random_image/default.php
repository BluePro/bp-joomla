<?php defined('_JEXEC') or die('Restricted access'); ?>
<div class="mod_random_image<?php echo $params->get('moduleclass_sfx'); ?>">
<?php
if ($link) echo "<a href=\"$link;\">";
echo JHTML::_('image', $image->folder.'/'.$image->name, $image->name, array('width' => $image->width, 'height' => $image->height));
if ($link) echo '</a>';
?>
</div>