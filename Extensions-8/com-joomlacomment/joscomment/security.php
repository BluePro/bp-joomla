<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');

/*
 * Copyright Copyright (C) 2007 Alain Georgette. All rights reserved.
 * Copyright Copyright (C) 2006 Frantisek Hliva. All rights reserved.
 * License http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * !JoomlaComment is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * !JoomlaComment is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA  02110-1301, USA.
 */

class JOSC_security {

    function insertCaptcha($inputname)
    {
        $refid = md5(mktime() * rand());
        $insertstr = "<a title=\""._JOOMLACOMMENT_RELOAD_CAPTCHA."\" href='javascript:JOSC_reloadCaptcha()'>"
        ."<img src=\"". JURI::base() . "/components/com_comment/joscomment/captcha.php?refid=" . $refid . "\" alt=\"Security Image\" />\n"
        ."<input type=\"hidden\" name=\"" . $inputname . "\" value=\"" . $refid . "\" />"
        ."</a>";
        return $insertstr;
    }

    function checkCaptcha($referenceid, $enteredvalue, $delete)
    {
        $database =& JFactory::getDBO();

        $referenceid = $database->getEscaped($referenceid);
        $enteredvalue = $database->getEscaped($enteredvalue);
        /* delete and check in the same time if exist */
        $query =  "DELETE FROM #__comment_captcha "
        . "\n WHERE referenceid='" . $referenceid . "' AND hiddentext='" . $enteredvalue . "'";
        $database->setQuery($query);
        $database->query();
        $result = $database->getAffectedRows();
        //var_dump($result);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function captchaResult($delete=false)
    {
        $security_try = JOSC_utils::decodeData("security_try");
        $checkSecurity = false;
        if ($security_try) {
            $security_refid = JOSC_utils::decodeData("security_refid");
            $checkSecurity = JOSC_security::checkCaptcha($security_refid, $security_try, $delete);
        }
        return $checkSecurity;
    }
}
?>