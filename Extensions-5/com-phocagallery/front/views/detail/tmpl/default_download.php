<?php defined('_JEXEC') or die('Restricted access');

echo '<div style="overflow:scroll;width:'.$this->tmpl['boxlargewidth'].'px;height:'.$this->tmpl['boxlargeheight'].'px;margin:0px;padding:0px;">' . JHTML::_( 'image.site', $this->item->filenameno, 'images/phocagallery/') . '</div>';
echo '<div id="download-msg"><div>'
	.'<table width="360">'
	.'<tr><td align="left">' . JText::_('Image Name') . ': </td><td>'.$this->item->filename.'</td></tr>'
	.'<tr><td align="left">' . JText::_('Image Format') . ': </td><td>'.$this->item->imagesize.'</td></tr>'
	.'<tr><td align="left">' . JText::_('Image Size') . ': </td><td>'.$this->item->filesize.'</td></tr>'
	.'<tr><td colspan="2" align="left"><small>' . JText::_('Download Image') . '</small></td></tr>';
	
	if ($this->tmpl['detailwindow'] == 4 || $this->tmpl['detailwindow'] == 5) {
	} else {
		echo '<tr><td>&nbsp;</td><td align="right">'.str_replace("%onclickclose%", $this->tmpl['detailwindowclose'], $this->item->closetext).'</td></tr>';
	}
echo '</table>';
echo '</div></div>';

?>	