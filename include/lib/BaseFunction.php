<?php
/**
 * Created by PhpStorm.
 * User: xwh
 * Date: 14-7-8
 * Time: 下午4:01
 */
    function myMsg($msg,$url = '',$isAutoJump = false)
    {
        echo <<<EOT
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
EOT;
        if ($isAutoJump&&($url!='')){
            echo "<meta http-equiv=\"refresh\" content=\"2;url=$url\" />";
        }
        echo <<<EOT
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>warning message</title>
        <style type="text/css">
        </style>
        </head>
        <body>
        <p>$msg</p>
EOT;
        echo <<<EOT
        </div>
        </body>
        </html>
EOT;
        exit;
    }


    function __autoload($class)
    {
        if(file_exists(MY_ROOT.'/include/lib/class/'.$class.'.class.php')){
            require_once(MY_ROOT.'/include/lib/class/'.$class.'.class.php');
        }
        else if(file_exists(MY_ROOT.'/include/model/'.$class.'.class.php')){
            require_once(MY_ROOT.'/include/model/'.$class.'.class.php');
        }else if(file_exists(MY_ROOT.'/include/controller/'.$class.'.class.php')){
            require_once(MY_ROOT.'/include/controller/'.$class.'.class.php');
        }
    }

    function myRedirect($url)
    {
        header('location:'.$url);
        exit;
    }

    function ArraySortDesc(&$array)
    {
         rsort($array);
    }