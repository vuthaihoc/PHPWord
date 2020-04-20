<?php
/**
 * Created by PhpStorm.
 * User: hocvt
 * Date: 2020-04-20
 * Time: 11:09
 */

namespace PhpOffice\PhpWord\Shared;


use Intervention\Image\ImageManager;

class WmfToGif {
    
    public static function convert($wmf){
        $tmp = tempnam(sys_get_temp_dir(), "php_") . ".wmf";
        file_put_contents( $tmp, $wmf);
        $image = (new ImageManager(['driver' => 'imagick']))->make($tmp);
        $image = $image->resize(null, $image->getHeight() * 2, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('png', 100);//->__toString();
        unlink( $tmp );
        return $image;
    }
    
}