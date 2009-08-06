<?php

class JOSC_mod_comments {
    var $_comObject;
    var $_module_id;
    //common params
    var $_moduleclass_sfx;
    var $_overflow;
    var $_overlay;
    var $_orderby;
    var $_maxlines;
    var $_secids;
    var $_catids;

    function JOSC_mod_comments(&$params, &$module)
    {
	$this->_module_id			= $module->id; /* used to have unique js key code */

	$component = $params->get( 'component', '' );

	require_once(JPATH_SITE."/components/com_comment/joscomment/utils.php");
	$this->_comObject 	= JOSC_utils::ComPluginObject($component, $null=null);

	$this->_moduleclass_sfx 	= $params->get( 'pageclass_sfx' );
	if ($params->get( 'overflow', 1 )) {
	    $this->_overflow 		= "";
	} else {
	    $this->_overflow 		= "style=\"overflow: hidden; width: 100%\"";
	}
	$this->_maxlines  			= intval($params->get('maxlines', 5));
	$this->_overlay 			= intval($params->get('overlay', 1));
	$this->_orderby 			= $params->get( 'orderby', 'date' );
/*
			<option value="date">Latest</option>
			<option value="voting_yes">Most voting yes</option>
			<option value="voting_no">Most voting no</option>
			<option value="voting">Most commented item</option>
			<option value="mostcommented">Most commented item</option>
*/			
	$this->_secids	  	= intval($params->get('secid', ''));
	if (!$this->_secids || $component!='') {
	    $this->_secids = strval($params->get('secids', ''));
	}
	$this->_catids	 = intval($params->get('catid', ''));
	if (!$this->_catids || $component!='') {
	    $this->_catids = strval($params->get('catids', ''));
	}


    }

    function mod_commentsGetMostCommented(&$params)
    {

	$comObject = &$this->_comObject;

	$rows = $comObject->mod_commentsGetMostCommentedQuery($this->_secids, $this->_catids, $this->_maxlines);
		/*
		 * rows must contains row array with following fields :
		 * - $row['id']
		 * - $row['title']
		 * - $row['countid']
		 */
//	global $database;
	//echo $database->getQuery();

	    /*
	     * display
	     */
	$html = '';

	$maxlinesize = intval($params->get('linesize', 0));

	if (!$rows) {
	    $html = "<SPAN class=\"small\"><i>no comments</i></SPAN>";
	} else {
	    $html .= "\n<ul class=\"mod_comments\">\n";
	    foreach($rows as $row) {
//		var_dump($row);
		$id 		= $row['id'];
		$title 		= $row['title'];
		$countid 	= $row['countid'];

		$link = $comObject->linkToContent($id);
		$end 	= " (". $countid .")";
		$line	= $maxlinesize ? JOSC_utils::setMaxLength($title, $maxlinesize-JString::strlen($end)): $title;
		$html .= "\n<li class=\"mod_comments\">\n";
		$html .= "\n <a href=\"$link\">". $line ."</a>\n";
		$html .= "$end";
		$html .= "\n</li>\n";

	    }
	    $html .= "\n</ul>\n";
	}
	return $html;
    }

    function mod_commentsGetOthers($params)
    {
	$comObject = &$this->_comObject;

	$null=null;
	$config 	= JOSC_utils::boardInitialization($comObject, $null, $null, $exclude=false);

	$html = '';

		/*
		 * GET PARAMETERS
		 */

	$showtime = intval($params->get('showtime', 1));
	$showname = intval($params->get('showname', 1));
	$showtitle = intval($params->get('showtitle', 0));
	$showconttitle = intval($params->get('showconttitle', 0));

	$dateusersize  		= intval($params->get('dateusersize', 20));
	$conttitlesize  	= intval($params->get('conttitlesize', 20));
	$commentsize  		= intval($params->get('commentsize', 40));

	$overlay 			= intval($params->get('overlay', 1));
	$overtitlesize 		= intval($params->get('overtitlesize', 50));
	$overcontentsize 	= intval($params->get('overcontentsize', 100));
	$overposX 			= $params->get('overposX', 'ABOVE');
	$overposY 			= $params->get('overposY', 'CENTER');
	$overpictures		= intval($params->get('overpictures', 1));
	$overwidthpictures	= $params->get('overwidthpictures', 'CENTER');
	$overlibparam 		= $params->get('overlibparam', '');

	$maxlines  = intval($params->get('maxlines', 5));
	$form_date = strval($params->get('form_date','[m.d.y - H:m:s]'));


	$rows = $comObject->mod_commentsGetOthersQuery($this->_secids, $this->_catids, $this->_maxlines, $this->_orderby);
		/*
		 * rows must be #__comment row array !
		 *  with a field ctitle !
		 *
		 */
	//global $database;
	//echo $database->getQuery();

		/*
		 * HTML
		 */
	$line1 = '';
	$line2 = '';
	$NLsearch  = array(); $NLsearch[]  = "\n"; 		$NLsearch[] = "\r";
	$BRreplace = array(); $BRreplace[] = "<br />"; 	$BRreplace[] = " ";
	if (!$rows) {
	    $html = "<SPAN class=\"small\"><i>no comments</i></SPAN>";
	} else {
	    $html .= "\n<ul class=\"mod_comments\">\n";
	    foreach($rows as $row) {
		$id = $row['id'];

		$config->setContentId($row['contentid']);
		$post = $config->initializePost($row,''); /* to use post functions ! bbcode replace.... */
		$savelengthword = $post->getMaxLength_word();
		$savelengthtext = $post->getMaxLength_text();
		$savelink		= $post->getSupport_link();
		$savequotecode	= $post->getSupport_quotecode();
		$savepictures 	= $post->getSupport_pictures();

		$name = $post->censorText(JOSC_utils::filter($post->anonymous($post->_item['name'])));
		$time = "";
		$time = JOSC_utils::getLocalDate($post->_item['date'],$form_date);//date($form_date,strtotime($post->_item['date']));
				/*
				 * construct line1 (date, username)
				 */
		$line1 			= $post->censorText(JOSC_utils::filter($showtime ? "$time ":"").($showname ? "$name":""));
		if ($dateusersize && JString::strlen($line1)>$dateusersize)
		$line1 = JString::substr($line1, 0, $dateusersize) . '...';

		$overlayline1	= addslashes(Jstring::str_ireplace($NLsearch, $BRreplace, $post->censorText(JOSC_utils::filter("$time $name"))));

				/*
				 * construct line2 (content item title)
				 */
		$conttitle		= $post->censorText(JOSC_utils::filter($post->_item['ctitle']));
		$line2			= $showconttitle ? $conttitle : "";
		if ($conttitlesize && JString::strlen($line2)>$conttitlesize)
		$line2 = JString::substr($line2, 0, $conttitlesize) . '...';

		$overlayline2 = $conttitle;
		if ($overtitlesize && JString::strlen($overlayline2)>$overtitlesize)
		$overlayline2 = JString::substr($overlayline2, 0, $overtitlesize) . '...';
		$overlayline2	= addslashes(JString::str_ireplace($NLsearch, $BRreplace, $overlayline2));


				/*
				 * construct line3 (title,comment) and overlay content
				 */
				/*
				 * 1. get text filter, censor, delete line return, parseUBB and wrap and limit size
				 * 2. addslashes (for overlay)
				 */
				/* get text with censor and filter */
		$title 			= $post->censorText(JOSC_utils::filter($post->_item['title']));
		$comment 		= $post->censorText(JOSC_utils::filter($post->_item['comment']));

				/* concat title if requested */
		$line3			= ($showtitle && $title) ? ($title." - ".$comment) : $comment;
		$overlayline3	= ($title) ? ("<b>".$title."</b>" .'<br />'. $comment) : $comment;

				/* convert UBBCODE */
		//        			$post->setSupport_emoticons(true);
		//        			$post->setSupport_UBBcode(true);
		$line3			= JString::str_ireplace($NLsearch, ' ', $line3);
		$post->setSupport_link(false);
		$post->setSupport_quotecode(false);
		$post->setMaxLength_text($commentsize);
		$post->setMaxLength_word($commentsize);
		$post->setSupport_pictures(false);
		$line3	= $post->parseUBBCode($line3);
		if (!$line3) $line3 = "<i>empty comment</i>"; /* to keep the link */

		$overlayline3	= JString::str_ireplace($NLsearch, $BRreplace, $overlayline3);
		$post->setMaxLength_text($overcontentsize);
		$post->setMaxLength_word($savelengthword);
		$post->setSupport_link($savelink);
		$post->setSupport_quotecode($savequotecode);
		$post->setSupport_pictures($overpictures, $overwidthpictures);
		$overlayline3	 	= $post->parseUBBCode($overlayline3);

		$line3				= 				$line3;
		$overlayline3	 	= addslashes(	$overlayline3);

		$overlaytitle 	= $overlayline2;

		$overlaycontent  = "<table cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>";
		$overlaycontent .= "<tr><td align=\'left\'>$overlayline1</td></tr>";

		$overlaycontent .= "<tr><td align=\'left\'>".$overlayline3."</td></tr>";
		$overlaycontent .= "</table>";

//						$joscitemid = $mainframe->getItemid( $post->_item['contentid'], 0, 0 );
		//				if ($joscitemid == "") {$joscitemid = 99999999;}
		$link = $comObject->linkToContent($post->_item['contentid'], $post->_item['id'], true);

		$html 	.= "<li class=\"mod_comments\">";

		$html 	.= $overlay ? "<span onmouseover=\"return overlib( '$overlaycontent', CAPTION, '$overlaytitle', $overposY, $overposX ". ($overlibparam ? (",".$overlibparam) : "") .");\" onmouseout=\"return nd();\" >" : "";
		//       			$html 	.= "<a class='mod_comments' href='javascript:JOSC_viewPost$module->id(".$post->_item['contentid'].",".$post->_item['id'].",".$joscitemid.")'>";
		$html 	.= "<a class='mod_comments' href='$link'>";
		$html 	.= "<span class='small'>";
		$html 	.= $line1 ? ($line1."<br />") : "";
		$html 	.= $line2 ? ($line2."<br />") : "";
		$html 	.= "</span>";
		$html	.=  "$line3";
		$html	.=  "</a>";
		$html	.= $overlay ? "</span>" : "";

		$html 	.= "</li>";
	    }
	    $html .= '</ul>';
	}

	unset($config);
	return $html;
    }

    function loadOverlib() {
    $document =& JFactory::getDocument();
	static $loadOverlib=false;

	if ( !$loadOverlib ) {
	    // check if this function is already loaded
        $document->addScript('includes/js/overlib_mini.js');
        $document->addScript('includes/js/overlib_hideform_mini.js');
	    ?>
<!-- <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div> -->
<?php
// change state so it isnt loaded a second time
$loadOverlib=true;
}
}	
}
?>