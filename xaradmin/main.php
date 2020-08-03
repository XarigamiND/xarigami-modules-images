<?php
/**
 * Initialization functions
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
 * the main administration function
 * @return bool true on succes of redirect
 */
function images_admin_main()
{
    // Security Check
    if (!xarSecurityCheck('AdminImages')) return;
    xarResponseRedirect(xarModURL('images', 'admin', 'modifyconfig'));
    // success
    return true;
}

?>