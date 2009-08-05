<?php
defined('_JEXEC') or die('Restricted access');
/**
 * Description of controller
 *
 * @author Daniel Dimitrov
 */
jimport('joomla.application.component.controller');
class CommentController extends JController {


    function display($tpl = null) {

global $mainframe;
require_once(JPATH_SITE."/administrator/components/com_comment/library.comment.php");
require_once(JPATH_SITE."/components/com_comment/joscomment/utils.php");
require_once(JPATH_SITE."/administrator/components/com_comment/class.config.comment.php");
require_once($mainframe->getPath('admin_html'));

$task		= JArrayHelper::getValue( $_REQUEST, 'task', '');
$option		= JArrayHelper::getValue( $_REQUEST, 'option', '');
$fromcomponent 	= JArrayHelper::getValue( $_REQUEST, 'fromcomponent', null );
$fromtable  	= JArrayHelper::getValue( $_REQUEST, 'fromtable', null );

$cid 	= JOSC_library::JOSCGetArrayInts( 'cid' ); /* id will be used if direct link  */
$id 	= intval(JArrayHelper::getValue( $_REQUEST, 'id', '0' )); /* id will be used if direct link  */
$set_id	= intval(JArrayHelper::getValue( $_REQUEST, 'id', '0' ));  /* need the same in toolbar ...*/

$set_id	= ( $set_id ? $set_id : intval( count($cid)>0 ? $cid[0] : 0 ) );

$component 	= JArrayHelper::getValue( $_REQUEST, 'component', '' ); /* for view */

/* TODO : improve the code below.
 * not very beautifull code...
 */

if (strpos($task, "setting")===false)
$action = "";
else
$action = "setting";
switch($action) {

    case "setting":

	if ($task=="settingssimple") {
	    $set_id=0;
	    $component='';
	}

	if ($task=="settings" || $task=="settingsexpert") {
	    viewSettings($option, $task);

	} else {

	    $null=null;
	    $config = new JOSC_config($set_id,$null);

	    if (!$config->load()) {
		echo "Error: config for set_id=$set_id not found";

	    } else {
		switch ($task) {
		    case "settingsnew":
			case "settingsnewexpert":
			    $config->newConfig();
			    $config->execute($option, $task);
			    break;

		    case "settingsedit":
			case "settingseditexpert":
			    case "settingseditsimple":
				case "settingssimple":
				    $config->execute($option, $task);
				    break;

				case "settingsremove":
				    removeSettings($cid, $option, $config);
				    break;

				case "savesettings":
				    case "savesettingsexpert":
					case "savesettingssimple":
					    $config->save($option, $task);
					    break;

				    case "applysettings":
					case "applysettingsexpert":
					    case "applysettingssimple":
						$config->save($option, $task, true);
						break;
				    }
				}
			    }
			    break;

		    default:
		/*
		 * manage comments
		 */
			switch ($task) {

			    case "new":
				editComment($option, 0, $component);
				break;


			    case "edit":
				$cid[0]	= ( $id ? $id : intval( $cid[0] ) );
				editComment($option, $cid[0], $component);
				break;

			    case "save":
				saveComment($option, $component);
				break;

			    case "remove":
				removeComments($cid, $option, $component);
				break;

			    case "publish":
				publishComment($cid, 1, $option, $component);
				break;

			    case "unpublish":
				publishComment($cid, 0, $option, $component);
				break;

			/*
			 * captchatable for debug... if needed
			 */
			    case "captchatable":
				captchaTable($component);
				break;

			case "about":
			    JOSC_library::viewAbout(); /* library.comment.php */
			    break;

		/* import comment */
			case "importcomment" :
			    case "importcommentexpert" : /* do not use ! */
				HTML_comments::importPanel($option, $task, $fromtable, $fromcomponent, $component);
				break;

/*  not used for parentid reason
    case "importexecuteSel" :
	executeImport($cid, $option, $task, $fromtable, $fromcomponent);
	break;
*/

			    case "importexecuteAll" :
				//		    	executeImport( -1, $option, $task, $fromtable, $fromcomponent);
				executeImport( $option, $task, $fromtable, $fromcomponent, $component );
				break;

			    case "convertlcharset" :
				convertlcharset($cid, $option, $defaultconfig->_local_charset);
				break;

/*
    case "import":
	import($option);
	break;
*/
			default:
                $view		= JArrayHelper::getValue( $_REQUEST, 'view', '');
        if ($view) {
           parent::display();
        } else {
            viewComments($option, $task, $component);
        }
				
				break;
			}
			break;
	    }
        
//        parent::display();

    }

}
?>
