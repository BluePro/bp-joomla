<?php defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">
function iFrameHeight() {
	var h = 0;
	if (!document.all) {
		h = document.getElementById('wrapper').contentDocument.height;
		document.getElementById('wrapper').style.height = h + 60 + 'px';
	} else if(document.all) {
		h = document.frames('wrapper').document.body.scrollHeight;
		document.all.wrapper.style.height = h + 20 + 'px';
	}
}
</script>
<?php
echo sprintf('<div class="com_wrapper%s">', $this->escape($this->params->get('pageclass_sfx')));
if ($this->params->get('show_page_title', 1)) {
	echo sprintf('<h1>%s</h1>', $this->escape($this->params->get('page_title')));
}
echo sprintf('<iframe %s id="wrapper" name="wrapper" src="%s" width="%s" height="%s" scrolling="%s" frameborder="0">%s</iframe>',
	$this->wrapper->load, $this->wrapper->url, $this->params->get('width'), $this->params->get('height'), $this->params->get('scrolling'), JText::_( 'NO_IFRAMES' ));
echo '</div>';
