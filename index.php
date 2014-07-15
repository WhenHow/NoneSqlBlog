<?php
/**
 * Created by PhpStorm.
 * User: xwh
 * Date: 14-7-8
 * Time: 上午9:45
 */
    //define('MY_ROOT',dirname(__FILE__));
    require_once('init.php');
    define('TEMPLATE_PATH', TPLS_PATH.'/default');
    $router = dispatcher::getInstance();
    $router->dipatch();
?>