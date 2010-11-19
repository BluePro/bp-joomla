<?php defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">
function tableOrdering(order, dir, task) {
	var form = document.adminForm;

	form.filter_order.value	= order;
	form.filter_order_Dir.value = dir;
	document.adminForm.submit(task);
}
</script>

<form action="<?php echo JFilterOutput::ampReplace($this->action); ?>" method="post" name="adminForm">
<table>
<?php
if ( $this->params->def( 'show_headings', 1 ) ) {
?>
<thead>
<tr>
	<th><?php echo JText::_('Num'); ?></th>
	<td><?php echo JHTML::_('grid.sort', 'Web Link', 'title', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
<?php
if ($this->params->get( 'show_link_hits' )) {
?>
	<th><?php echo JHTML::_('grid.sort',  'Hits', 'hits', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
<?php
}
?>
</tr>
</thead>
<?php } ?>
<tbody>
<?php
foreach ($this->items as $item) {
?>
<tr class="<?php $item->odd ? 'odd' : 'even'; ?>">
	<td><?php echo $this->pagination->getRowOffset($item->count); ?></td>
	<td>
<?php
echo sprintf('%s%s', $item->image, $item->link);
if ($this->params->get('show_link_description')) {
	echo sprintf('<span>%s</span>', nl2br($this->escape($item->description)));
}
?>
	</td>
<?php
if ($this->params->get('show_link_hits')) {
?>
	<td><?php echo $item->hits; ?></td>
<?php } ?>
</tr>
<?php } ?>
</tbody>
<tfoot>
<tr>
	<td colspan="4"><?php echo $this->pagination->getPagesLinks() . '&nbsp;' . $this->pagination->getPagesCounter(); ?></td>
</tr>
<tr>
	<td colspan="4"><?php echo JText::_('Display Num') . '&nbsp;' . $this->pagination->getLimitBox(); ?></td>
</tr>
</tfoot>
</table>
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="viewcache" value="0" />
</form>
