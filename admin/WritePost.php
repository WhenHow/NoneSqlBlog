<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-15
 * Time: 下午11:19
 */
    require_once('global.php');

    $WritePostAction = isset($_GET["action"])?$_GET["action"]:"";
    if($WritePostAction == "add")
    {
        include_once(view::getView("WritePost.php"));
    }