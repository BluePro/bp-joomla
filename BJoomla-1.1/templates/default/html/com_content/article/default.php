<?php
defined('_JEXEC') or die('Restricted access');
$edit = $this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own');

echo sprintf('<div class="com_content%s">', $this->params->get('pageclass_sfx'));

if ($this->params->get('show_page_title', 0))
	echo sprintf('<h1>%s</h1>', $this->escape($this->params->get('page_title')));

if ($this->params->get('show_title', 0)) {
	if ($this->params->get('link_titles') && $this->article->readmore_link != '')
		$title = sprintf('<a href="%s">%s</a>', $this->article->readmore_link, $this->escape($this->article->title));
	else
		$title = $this->escape($this->article->title);
	if ($this->params->get('show_page_title', 0))
		echo sprintf('<h2>%s</h2>', $title);
	else
		echo sprintf('<h1>%s</h1>', $title);
}

if (!$this->params->get('show_intro'))
	echo $this->article->event->afterDisplayTitle;

if ($edit || $this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')) {
	$icons = array();
	if (!$this->print) {
		if ($this->params->get('show_email_icon')) $icons[] = JHTML::_('icon.email', $this->article, $this->params, $this->access);
		if ($this->params->get('show_print_icon')) $icons[] = JHTML::_('icon.print_popup', $this->article, $this->params, $this->access);
		if ($this->params->get('show_pdf_icon')) $icons[] = JHTML::_('icon.pdf', $this->article, $this->params, $this->access);
		if ($edit) $icons[] =  JHTML::_('icon.edit', $this->article, $this->params, $this->access);
	} else
		$icons[] = JHTML::_('icon.print_screen',  $this->article, $this->params, $this->access);

	echo sprintf('<div class="box_icon%s">%s</div>', $this->params->get('pageclass_sfx'), implode(' | ', $icons));
}

if ($this->params->get('show_create_date') ||
	($this->params->get('show_author') && $this->article->author != '') ||
	($this->params->get('show_section') && $this->article->sectionid) ||
	($this->params->get('show_category') && $this->article->catid) ||
	($this->params->get('show_url') && $this->article->urls)) {
	$meta = '';

	if ($this->params->get('show_create_date')) $meta .= JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC2'));
	if ($this->params->get('show_author') && ($this->article->author != ''))
		$meta .= JText::printf($this->article->created_by_alias ? $this->article->created_by_alias : $this->article->author);
	if ($this->params->get('show_section') && $this->article->sectionid && isset($this->article->section)) {
		if ($this->params->get('link_section'))
			$meta .= sprintf('<a href="%s">%s</a>',
				JRoute::_(ContentHelperRoute::getSectionRoute($this->article->sectionid)), $this->article->section);
		else $meta .= $this->article->section;
	}
	if ($this->params->get('show_category') && $this->article->catid) {
		if ($this->params->get('link_category')) 
			$meta .= sprintf('<a href="%s">%s</a>',
				JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)), $this->article->category);
		else $meta .= $this->article->category;
	}
	if ($this->params->get('show_url') && $this->article->urls) 
		$meta .= sprintf('<a href="http://%s">%s</a>', $this->article->urls, $this->article->urls);

	echo sprintf('<div class="box_meta%s">%s</div>', $this->params->get('pageclass_sfx'), $meta);
}

echo $this->article->event->beforeDisplayContent;

echo sprintf('<div class="box_content%s">%s%s</div>',
	$this->params->get('pageclass_sfx'), isset($this->article->toc) ? $this->article->toc : '', $this->article->text);

if (intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) 
	echo sprintf('<div class="box_date%s">%s (%s)</div>',
		$this->params->get('pageclass_sfx'), JText::_('Last Updated'), JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2')));

echo $this->article->event->afterDisplayContent;
echo '</div>';
?>