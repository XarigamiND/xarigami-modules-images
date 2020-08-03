<?php
/**
 * Initialization functions
 *
 * @package modules
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Images Module
 * @copyright (C) 2008-2011 2skies.com
 * @link http://xarigami.com/project/images
 * @author Images Module Development Team
 */
$modversion['name']         = 'Images';
$modversion['directory']    = 'images';
$modversion['id']           = '152';
$modversion['version']      = '1.1.3';
$modversion['displayname']  = 'Images';
$modversion['description']  = 'Handles image manipulation with resizing/cropping/scaling/rotating and various filters';
$modversion['credits']      = 'docs/credits.txt';
$modversion['help']         = 'docs/help.txt';
$modversion['changelog']    = 'docs/changelog.txt';
$modversion['license']      = 'docs/license.txt';
$modversion['official']     = 1;
$modversion['author']       = 'Carl P. Corliss (carl.corliss@xaraya.com), mikespub, jojodee';
$modversion['contact']      = 'http:/xarigami.com/';
$modversion['homepage']      = 'http:/xarigami.com/';
$modversion['admin']        = 1;
$modversion['class']        = 'Utility';
$modversion['category']     = 'Global';
$modversion['dependencyinfo']   = array(
                                    0 => array(
                                            'name' => 'core',
                                            'version_ge' => '1.4.0'
                                         )
                                      );
// this module requires the gd extension (for now)
$modversion['extensions']   = array('gd');
if (false) { //Load and translate once
    xarML('Images');
    xarML('Handle image manipulation');
}
?>
