<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class BPMailformViewBPMailform extends JView {

  function display($tpl = null) {
    JToolBarHelper::title(JText::_('BP Mailform'));
    JToolBarHelper::preferences('com_bpmailform', 360, 480);
    
    parent::display($tpl);
  }

}
