<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php if (!empty($this->searchword)) { ?>
<div>
	<p>
		<?php echo JText::_('Search Keyword') ?> <strong><?php echo $this->escape($this->searchword) ?></strong>
		<?php echo $this->result ?>
	</p>
</div>
<?php } ?>

<?php if (count($this->results)) { ?>
<div>
	<h3><?php echo JText :: _('Search_result'); ?></h3>
	<ol start="<?php echo $this->pagination->limitstart + 1; ?>">
		<?php foreach ($this->results as $result) { ?>
		<li>
			<?php if ($result->href) { ?>
			<div>
				<a href="<?php echo JRoute :: _($result->href) ?>" <?php echo ($result->browsernav == 1) ? 'target="_blank"' : ''; ?> >
					<?php echo $this->escape($result->title); ?>
				</a>
			</div>
			<?php
			}
			if ($result->section) {
			?>
			<div><?php echo $this->escape($result->section); ?></div>
			<?php } ?>
			<div><?php echo $result->text; ?></div>
			<div><?php echo $result->created; ?></div>
		</li>
		<?php } ?>
	</ol>
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>
<?php } ?>