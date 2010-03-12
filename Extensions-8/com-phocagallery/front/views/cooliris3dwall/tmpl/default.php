<?php
defined('_JEXEC') or die('Restricted access'); 
if ($this->tmpl['display_category']	== 0) {
	echo JText::_('Category was not selected in parameters');
} else {

// Heading
$heading = '';
if ($this->params->get( 'page_title' ) != '') {
	$heading .= $this->params->get( 'page_title' );
}
if ( $this->tmpl['displaycatnametitle'] == 1) {
	if ($this->category->title != '') {
		if ($heading != '') {
			$heading .= ' - ';
		}
		$heading .= $this->category->title;
	}
}
// Pagetitle
if ($this->tmpl['showpagetitle'] != 0) {
	if ( $heading != '') {
	    echo '<div class="componentheading'.$this->params->get( 'pageclass_sfx' ).'">'.$heading.'</div>';
	} 
}
// Image, description
echo '<div class="contentpane'.$this->params->get( 'pageclass_sfx' ).'">';
if ( @$this->tmpl['image'] || @$this->category->description ) {
	echo '<div class="contentdescription'.$this->params->get( 'pageclass_sfx' ).'">';
	if ( isset($this->tmpl['image']) ) {
		echo $this->tmpl['image'];
	}
	echo $this->category->description.'</div>';
}
echo '</div>';
?>
<object id="o" 
  classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
  width="<?php echo $this->tmpl['cooliris3d_wall_width'];?>" 
  height="<?php echo $this->tmpl['cooliris3d_wall_height'];?>">
    <param name="movie"
      value="http://apps.cooliris.com/embed/cooliris.swf" />
    <param name="allowFullScreen" value="true" />
    <param name="allowScriptAccess" value="always" />
	<param name="wmode" value="transparent" />
    <param name="flashvars" 
      value="feed=<? echo JURI::root() . $this->tmpl['path']->image_rel . (int)$this->category->id;?>.rss" />
    <embed type="application/x-shockwave-flash" 
      src="http://apps.cooliris.com/embed/cooliris.swf" 
	  flashvars="feed=<? echo JURI::root() . $this->tmpl['path']->image_rel . (int)$this->category->id;?>.rss"
      width="<?php echo $this->tmpl['cooliris3d_wall_width'];?>" 
      height="<?php echo $this->tmpl['cooliris3d_wall_height'];?>" 	  
      allowFullScreen="true" 
      allowScriptAccess="always" 
	  wmode="transparent" >   
	  </embed>
</object>
<?php
}
echo '<div>&nbsp;</div>';
echo $this->tmpl['fs'];?>
