<?php
/**
 * Utility function used in Admin Menu generation
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
 * utility function pass individual menu items to the main menu
 *
 * @return array containing the menulinks for the main menu items.
 */
function images_adminapi_getmenulinks()
{
    if (xarSecurityCheck('AdminImages',0)) {
        if (xarModIsAvailable('uploads') && xarSecurityCheck('AdminUploads',0)) {
            $menulinks[] = Array('url'   => xarModURL('images',
                                                      'admin',
                                                      'uploads'),
                                 'title' => xarML('View Uploaded Images'),
                                 'label' => xarML('View Uploaded Images'),
                                 'active' => array('uploads'));
        }
        $menulinks[] = Array('url'   => xarModURL('images',
                                                  'admin',
                                                  'derivatives'),
                             'title' => xarML('View Derivative Images'),
                             'label' => xarML('View Derivative Images'),
                             'active' => array('derivatives'));
        $menulinks[] = Array('url'   => xarModURL('images',
                                                  'admin',
                                                  'browse'),
                             'title' => xarML('Browse Server Images'),
                             'label' => xarML('Browse Server Images'),
                             'active' => array('browse'));
        $menulinks[] = Array('url'   => xarModURL('images',
                                                  'admin',
                                                  'phpthumb'),
                             'title' => xarML('Define Settings for Image Processing'),
                             'label' => xarML('Image Processing'),
                             'active' => array('phpthumb'));
        $menulinks[] = Array('url'   => xarModURL('images',
                                                  'admin',
                                                  'modifyconfig'),
                             'title' => xarML('Edit the Images Configuration'),
                             'label' => xarML('Modify Config'),
                             'active' => array('modifyconfig'));
    }
    if (empty($menulinks)){
        $menulinks = '';
    }
    return $menulinks;
}
?>
