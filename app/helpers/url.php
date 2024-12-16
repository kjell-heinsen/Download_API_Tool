<?php

namespace downapitool\app\helpers;
class url
{

    public static function redirect($url, $status)
    {
        header('Location: ' . DIR . $url, true, $status);
        exit;
    }

    public static function Refdirect($url, $status)
    {
        header('Location: ' . $url, true, $status);
        exit;
    }

    public static function halt($status = 404, $message = 'Da ist etwas schief gelaufen.')
    {
        if (ob_get_level() !== 0) {
            ob_clean();
        }

        http_response_code($status);
        $data['status'] = $status;
        $data['message'] = $message;

        if (!file_exists("views/error/$status.php")) {
            $status = 'default';
        }
        require "views/error/$status.php";

        exit;
    }

    public static function JScript($filename = false, $path = 'assets/')
    {
        if ($filename) {
            $path .= "$filename.js";
        }
        return DIR . $path;
    }

    public static function EXJScript($filename = false, $path = '')
    {
        if ($filename) {
            $path .= "$filename.js";
        }
        return STATICDATA . $path;
    }

    public static function STYLES($filename = false, $path = 'assets/')
    {
        if ($filename) {
            $path .= "$filename.css";
        }
        return DIR . $path;
    }

    public static function EXSTYLES($filename = false, $path = '')
    {
        if ($filename) {
            $path .= "$filename.css";
        }
        return STATICDATA . $path;
    }

    public static function IMAGES($filename = false, $path = 'assets/', $ext = '.jpg')
    {
        if ($filename) {
            $path .= "$filename$ext";
        }
        return DIR . $path;
    }

    public static function EXIMAGES($filename = false, $path = '')
    {
        if ($filename) {
            $path .= "$filename.jpg";
        }
        return STATICDATA . $path;
    }

    public static function ICON($filename = false, $path = 'static/icon/')
    {
        if ($filename) {
            $path .= "$filename.png";
        }
        return DIR . $path;
    }

    public static function LINK($path)
    {
        return DIR . $path;

    }

    public static function EXLINK($link)
    {
        return $link;
    }

    public static function GITLINK($hash)
    {
        return 'https://github.com/deltas92/' . GITREPO . '/commit/' . $hash;
    }

}
