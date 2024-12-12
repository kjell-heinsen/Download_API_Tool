<?php

namespace downapitool\app\core;
use downapitool\app\uielements\ui_panelelement;

class view
{



    function __construct()
    {

    }


    public function render(string $path, array $data) {
        $path = DOCROOT."/app/views/$path.php";
        if(file_exists($path))
        {
            require $path;
        }
        else
        {

            //   touch($path);
            file_put_contents($path, 'Dieses View('.$path.') ist leer und automatisch generiert.</br>');
            require $path;
            unlink($path);
        }
    }

    private function InternalRender($path, $data = false, $lvl = 0, $error = false)
    {

        $bigpath = DOCROOT . "/app/views/$path.php";
   //     if (ruling::GetLevel($lvl, true)) {
            if (file_exists($bigpath)) {
                require $bigpath;
            } else {
                ui_panelelement::set('Dieses View(' . $path . ') ist leer und automatisch generiert.', 'In Zukunft wird hier ein neues Modul entstehen.', 'default');
            }
    //    }


    }

}