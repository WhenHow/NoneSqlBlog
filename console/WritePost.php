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
    }elseif($WritePostAction == "edit")
    {
        $arrays = PostModel::getPostById($_GET["gid"]);
        if($arrays == null)
        {
            echo('文章不存在');
            exit;
        }

        include_once(view::getView("EditPost.php"));
    }