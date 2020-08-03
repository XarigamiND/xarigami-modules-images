<?php
/**
 * Predefined settings for image processing
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Images Module
 * @copyright (C) 2008-2010 2skies.com
 * @link http://xarigami.com/project/images
 * @author Images Module Development Team
 */
/**
 * Set the predefined settings for image processing
 *
 * @author mikespub
 * @param $args array containing the predefined settings for image processing
 * @return void
 */
function images_adminapi_setsettings($args)
{
    if (empty($args) || !is_array($args)) {
        $args = array();
    }

    xarModSetVar('images','phpthumb-settings',serialize($args));
}
?>