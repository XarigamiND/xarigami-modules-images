<?php
/**
 * Images Module
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
 * Get the configured base directories for server images
 *
 * @return array containing the base directories for server images
 */
function images_userapi_getbasedirs()
{
    $basedirs = xarModGetVar('images','basedirs');
    if (!empty($basedirs)) {
        $basedirs = unserialize($basedirs);
    }
    if (empty($basedirs)) {
        $basedirs = array();
        $basedirs[0] = array('basedir'   => 'themes',
                             'baseurl'   => 'themes',
                             'filetypes' => 'gif|jpg|png',
                             'recursive' => true);
        xarModSetVar('images','basedirs',serialize($basedirs));
    }

    return $basedirs;
}
?>
