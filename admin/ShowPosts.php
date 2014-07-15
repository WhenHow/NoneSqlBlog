<?php
    require_once('./global.php');
    $PostContent = new PostModel();
    $PostIdArray = PostModel::getPostIds();
    rsort($PostIdArray);
    $PostArray = PostModel::getPosts($PostIdArray);

    include(view::getView('ShowPosts.php'));