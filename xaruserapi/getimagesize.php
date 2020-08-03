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
 * Get the size of an image (from file or database)
 *
 * @param   string  $fileLocation  The file location of the image, or
 * @param   integer $fileId        The (uploads) file id of the image
 * @param   integer $fileType      The (uploads) mime type for the image
 * @param   integer $storeType     The (uploads) store type for the image
 * @return  array Array containing the width, height and gd_info if available
 * @throws  BAD_PARAM
 */
function images_userapi_getimagesize( $args )
{
    extract($args);

    if (empty($fileId) && empty($fileLocation)) {
        throw new EmptyParameterException('fileId or fileLocation');

    } elseif (!empty($fileId) && !is_numeric($fileId)) {
       throw new BadParameterException('fileId ');
    } elseif (!empty($fileLocation) && !is_string($fileLocation)) {
        throw new EmptyParameterException('fileLocation');
    }

    if (!empty($fileLocation) && file_exists($fileLocation)) {
        return @getimagesize($fileLocation);

    } elseif (!empty($extrainfo['width']) && !empty($extrainfo['height'])) {
        // Simulate the type returned by getimagesize()
        switch ($fileType) {
            case 'image/gif':
                $type = 1;
                break;
            case 'image/jpeg':
                $type = 2;
                break;
            case 'image/png':
                $type = 3;
                break;
            default:
                $type = 0;
                break;
        }
        $string = 'width="' . $extrainfo['width'] . '" height="' . $extrainfo['height'] . '"';
        return array($extrainfo['width'],$extrainfo['height'],$type,$string);

    } elseif (extension_loaded('gd') && xarModAPILoad('uploads','user') &&
              defined('_UPLOADS_STORE_DB_DATA') && ($storeType & _UPLOADS_STORE_DB_DATA)) {
        // get the image data from the database
        $data = xarModAPIFunc('uploads', 'user', 'db_get_file_data', array('fileId' => $fileId));
        if (!empty($data)) {
            $src = implode('', $data);
            unset($data);
            $img = @imagecreatefromstring($src);
            if (!empty($img)) {
                $width  = @imagesx($img);
                $height = @imagesy($img);
                @imagedestroy($img);
                // update the file entry in the uploads module
                if (empty($extrainfo)) {
                    $extrainfo = array();
                }
                $extrainfo['width'] = $width;
                $extrainfo['height'] = $height;
                xarModAPIFunc('uploads', 'user', 'db_modify_file',
                              array('fileId' => $fileId,
                                    'extrainfo' => $extrainfo));
                // Simulate the type returned by getimagesize()
                switch ($fileType) {
                    case 'image/gif':
                        $type = 1;
                        break;
                    case 'image/jpeg':
                        $type = 2;
                        break;
                    case 'image/png':
                        $type = 3;
                        break;
                    default:
                        $type = 0;
                        break;
                }
                $string = 'width="' . $width . '" height="' . $height . '"';
                return array($width,$height,$type,$string);
            }
        }
    }

}

?>
