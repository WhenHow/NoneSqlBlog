<?php
/**
 * Created by PhpStorm.
 * User: xwh
 * Date: 14-7-12
 * Time: 下午3:37
 */
define("POST_TITLE",0);
define("POST_CONTENT",1);
define("COMMENT_LIMIT",10);

class PostController {

    public function displayPostContent($parameters)
    {

        $CommentPage = isset($parameters[4])&&$parameters[4] == 'comment-page'? intval($parameters[5]):1;
        $BlogId = 0;
        if($parameters[1]=="post"){
            $BlogId = isset($parameters[2])? intval($parameters[2]):0;
        }elseif(is_numeric($parameters[1]))
        {
            $BlogId = intval($parameters[1]);
        }
        if($BlogId == 0)
            return ;

        $blog = new PostModel();
        $BlogContent = $blog->fetchPostById($BlogId);
        //$comments = new CommentModel();
        //$CommentsContent = $comments->getComments($BlogId,COMMENT_LIMIT);

        $PostTitle = $BlogContent[0];
        $PostContent = $BlogContent[1];

        $HeadTitle = $BlogContent[2];
        $HeadDescription = $BlogContent[3];
        $HeadKeyWords = $BlogContent[4];
        $HeadAuthor = $BlogContent[5];

        $arrays = PostModel::getPostIds();
        ArraySortDesc($arrays);

        require_once(view::getView('post.php'));
    }

}