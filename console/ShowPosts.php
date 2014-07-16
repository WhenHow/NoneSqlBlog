<?php
    require_once('./global.php');
    $PostContent = new PostModel();
    $PostIdArray = PostModel::getPostIds();
    rsort($PostIdArray);
    $PostArray = PostModel::getPosts($PostIdArray);

    if(!isset($_GET['action']))
    include(view::getView('ShowPosts.php'));
    else{
        if ($action == 'operate_log') {
            $operate = isset($_REQUEST['operate']) ? $_REQUEST['operate'] : '';
            $pid = isset($_POST['pid']) ? $_POST['pid'] : '';
            $logs = isset($_POST['blog']) ? array_map('intval', $_POST['blog']) : array();
            $sort = isset($_POST['sort']) ? intval($_POST['sort']) : '';
            $author = isset($_POST['author']) ? intval($_POST['author']) : '';
            $gid = isset($_GET['gid']) ? intval($_GET['gid']) : '';

            switch ($operate) {
                case 'del':
                    foreach ($logs as $val)
                    {
                        PostModel::delPostById($val);
                        echo($val."文章被删除");
                    }
                    break;
            }

            header("location:ShowPosts.php");
            exit;
        }
    }