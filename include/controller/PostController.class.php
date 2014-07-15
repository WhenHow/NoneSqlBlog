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
        $SideContent = $this->getSideContent($arrays);
        require_once(view::getView('post.php'));
    }

    private function getSideContent($arrays)
    {
        ArraySortDesc($arrays);
        $TitleArray = PostModel::getPostTiitlesById($arrays,SIDE_BOX_LIMIT);
        $UrlArray = array();
        for($i = 0 ;$i < SIDE_BOX_LIMIT&&$i<count($arrays);$i++)
            $UrlArray[$i]= url::getPostDisplayContentUrl($arrays[$i]);

        $values = array();
        for($i = 0 ;$i < SIDE_BOX_LIMIT&&$i<count($arrays);$i++)
            $values[$i] = array('PostId'=>$arrays[$i],'PostTitle'=>$TitleArray[$i],'Url'=>$UrlArray[$i]);

        return $values;
    }

}