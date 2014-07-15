<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-15
 * Time: 下午6:04
 */


require_once("global.php");
function addNewPost()
{
    $ids = PostModel::getPostIds();
    rsort($ids);
    $PostId = $ids[0]+1;
    $PostTitle = isset($_POST['title'])?$_POST['title']:"";
    $PostContent = isset($_POST['content'])?$_POST['content']:"";
    $HeadTitle = isset($_POST['HeadTitle'])?$_POST['HeadTitle']:"";
    $PostDescription = isset($_POST['HeadDescription'])?$_POST['HeadDescription']:"";
    $PostKeywords = isset($_POST['HeadKeywords'])?$_POST['HeadKeywords']:"";
    $PostAuthor = isset($_POST['HeadAuthor'])?$_POST['HeadAuthor']:"";

    $PostObject = new PostModel();
    $PostObject->addPost($PostId,$PostTitle,$PostContent,$HeadTitle,
                            $PostDescription,$PostKeywords,$PostAuthor);

}
$SavePostAction = isset($_GET["action"])?$_GET["action"]:"";
switch($SavePostAction)
{
    case 'add':
        addNewPost();
        break;
    default:
        echo('hehe');
        break;
}