<?php
/**
 * Created by PhpStorm.
 * User: xwh
 * Date: 14-7-8
 * Time: 上午9:45
 */
    define('MY_ROOT',dirname(__FILE__));
    require_once(MY_ROOT.'/init.php');
    $DB = database::getInstance();
    $SearchArray = $DB->doQuery(array("table"=>"Post","SearchContent"=>"1"));
    echo($SearchArray[0]);
    echo($SearchArray[1]);
    echo($SearchArray[2]);
?>