<?php
defined('_JEXEC') or die('Restricted access');

if (!empty($this->searchword)) { ?>
	<p>
		<?php echo JText::_('Search Keyword') ?> <strong><?php echo $this->escape($this->searchword) ?></strong>
		<?php echo $this->result ?>
	</p>
<?php
}

if ($this->total > 0) { ?>
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
<?php
	echo $this->pagination->getPagesLinks();
}