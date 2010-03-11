<?php
defined('_JEXEC') or die('Restricted access');
$edit = $this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own');

if ($this->item->params->get('show_title', 0)) {
	if ($this->item->params->get('link_titles') && $this->item->readmore_link != '')
		$title = sprintf('<a href="%s">%s</a>', $this->item->readmore_link, $this->escape($this->item->title));
	else
		$title = $this->escape($this->item->title);
	echo sprintf('<h2>%s</h2>', $title);
}

if (!$this->item->params->get('show_intro'))
	echo $this->item->event->afterDisplayTitle;

if ($edit || $this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon')) {
	$icons = array();
	if ($this->item->params->get('show_email_icon')) $icons[] = JHTML::_('icon.email', $this->item, $this->item->params, $this->access);
	if ($this->item->params->get('show_print_icon')) $icons[] = JHTML::_('icon.print_popup', $this->item, $this->item->params, $this->access);
	if ($this->item->params->get('show_pdf_icon')) $icons[] = JHTML::_('icon.pdf', $this->item, $this->item->params, $this->access);
	if ($edit) $icons[] =  JHTML::_('icon.edit', $this->item, $this->item->params, $this->access);

	echo sprintf('<div class="box_icon%s">%s</div>', $this->params->get('pageclass_sfx'), implode(' | ', $icons));
}

if ($this->item->params->get('show_create_date') ||
	($this->item->params->get('show_author') && $this->item->author != '') ||
	($this->item->params->get('show_section') && $this->item->sectionid) ||
	($this->item->params->get('show_category') && $this->item->catid) ||
	($this->item->params->get('show_url') && $this->item->urls)) {
	$meta = '';

	if ($this->item->params->get('show_create_date')) $meta .= JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2'));
	if ($this->item->params->get('show_author') && ($this->item->author != ''))
		$meta .= JText::printf($this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author);
	if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) {
		if ($this->item->params->get('link_section'))
			$meta .= sprintf('<a href="%s">%s</a>',
				JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)), $this->item->section);
		else $meta .= $this->item->section;
	}
	if ($this->item->params->get('show_category') && $this->item->catid) {
		if ($this->item->params->get('link_category')) 
			$meta .= sprintf('<a href="%s">%s</a>',
				JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)), $this->item->category);
		else $meta .= $this->item->category;
	}
	if ($this->item->params->get('show_url') && $this->item->urls) 
		$meta .= sprintf('<a href="http://%s">%s</a>', $this->item->urls, $this->item->urls);

	echo sprintf('<div class="box_meta%s">%s</div>', $this->item->params->get('pageclass_sfx'), $meta);
}

echo $this->item->event->beforeDisplayContent;

echo sprintf('<div class="box_content%s">%s%s</div>',
	$this->item->params->get('pageclass_sfx'), isset($this->item->toc) ? $this->item->toc : '', $this->item->text);

if (intval($this->item->modified) !=0 && $this->item->params->get('show_modify_date')) 
	echo sprintf('<div class="box_date%s">%s (%s)</div>',
		$this->item->params->get('pageclass_sfx'), JText::_('Last Updated'), JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2')));

if ($this->item->params->get('show_readmore') && $this->item->readmore)
	echo sprintf('<div class="box_readmore%s"><a href="%s" title="%s">%s</a></div>',
		$this->item->params->get('pageclass_sfx'), $this->item->readmore_link, $this->item->title, $this->item->readmore_register ? JText::_('Register to read more...') : JText::_('Read more...'));
	
echo $this->item->event->afterDisplayContent;