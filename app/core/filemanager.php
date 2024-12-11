<?php

namespace downapitool\app\core;

use downapitool\app\models\start;

class filemanager{

    public static function show(string $filehash):void{

       $filedata = start::GrabFileData($filehash);




    }


    private static function Extension(string $string):string{
        $ext = "";
        try{
            $parts = explode(".", $string);
            $ext = end($parts);
        } catch (\Exception $e){
            $ext = "";
        }
        return $ext;
    }

}