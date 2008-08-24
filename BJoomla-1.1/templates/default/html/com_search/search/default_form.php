<?php defined('_JEXEC') or die('Restricted access'); ?>

<form id="searchForm" name="searchForm" action="<?php echo JRoute::_( 'index.php?option=com_search' ); ?>" method="post">
<div class="com_search_result<?php echo $this->params->get('pageclass_sfx'); ?>">
<fieldset>
	<label for="search_searchword"><?php echo JText::_('Search Keyword'); ?></label>
	<input type="text" name="searchword" id="search_searchword"  maxlength="20" value="<?php echo $this->escape($this->searchword); ?>" />
	<input type="hidden" name="task" value="search" />
	<input type="submit" name="Search" value="<?php echo JText::_( 'Search' );?>" />
</fieldset>

<fieldset>
	<legend><?php echo JText::_('Search Parameters'); ?></legend>
	<?php echo $this->lists['searchphrase']; ?>
	<label for="ordering"><?php echo JText::_('Ordering'); ?></label>
	<?php echo $this->lists['ordering']; ?>
</fieldset>

<?php if ($this->params->get('search_areas', 1)) { ?>
<fieldset>
	<legend><?php echo JText::_('Search Only'); ?></legend>
<?php
	foreach ($this->searchareas['search'] as $val => $txt) {
		$checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? ' checked="true"' : '';
?>
	<input type="checkbox" name="areas[]" value="<?php echo $val ?>" id="area_<?php echo $val ?>"<?php echo $checked ?> />
	<label for="area_<?php echo $val ?>"><?php echo JText::_($txt); ?></label>
<?php } ?>
</fieldset>
<?php
}

if (count($this->results)) {
?>
<label for="limit"><?php echo JText :: _('Display Num') ?></label>
<?php
	echo $this->pagination->getLimitBox();
	echo $this->pagination->getPagesCounter();
}
?>
</div>
</form>