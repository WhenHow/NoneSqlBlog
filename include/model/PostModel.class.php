<?php
class PostModel{
    public  $DB = null;
    public function PostModel()
    {
        $this->DB = database::getInstance();
    }

    public function fetchPostById($PostId)
    {
        return $this->DB->doQuery(array("table"=>"Post","SearchContent"=>$PostId));
    }

    public function addPost($PostId,$PostTitle,$PostContent,$HeadTitle,$PostDescription,$PostKeywords,$PostAuthor)
    {
        return $this->_writeToFile($PostId,$PostTitle,$PostContent,$HeadTitle,$PostDescription,$PostKeywords,$PostAuthor);
    }
    private function _writeToFile($PostId,$PostTitle,$PostContent,$HeadTitle,$PostDescription,$PostKeywords,$PostAuthor)
    {
        $f=fopen("../DataBase/post/".$PostId, "w+");
        /*$text=utf8_encode($PostTitle.SPERATER_MARK);
        $text=$text.utf8_encode($PostContent.SPERATER_MARK);
        $text=$text.utf8_encode($HeadTitle.SPERATER_MARK);
        $text=$text.utf8_encode($PostDescription.SPERATER_MARK);
        $text=$text.utf8_encode($PostKeywords.SPERATER_MARK);
        $text=$text.utf8_encode($PostAuthor.SPERATER_MARK);*/

        $text=$PostTitle.SPERATER_MARK;
        $text=$text.$PostContent.SPERATER_MARK;
        $text=$text.$HeadTitle.SPERATER_MARK;
        $text=$text.$PostDescription.SPERATER_MARK;
        $text=$text.$PostKeywords.SPERATER_MARK;
        $text=$text.$PostAuthor.SPERATER_MARK;
        //$text="\\xEF\\xBB\\xBF".$text;
        $ret = fputs($f, $text);
        fclose($f);
        return $ret;
    }
    public  static function getPostIds()
    {
        $FileArray = array();
        $CurrentDir = opendir(MY_ROOT.'/DataBase/post');

        while($file = readdir($CurrentDir))
        {
            if($file == '.'|| $file == '..')
                continue;
            $SubFile = intval($file);
            array_push($FileArray,$SubFile);
        }

        closedir($CurrentDir);
        return $FileArray;
    }

    public static function getPostTiitlesById($arrays,$limit)
    {
        $RetArray = array();
        for($i = 0 ;$i < $limit&&$i<count($arrays);$i++)
        {
            $PostContent = database::getInstance()->doQuery(array("table"=>"Post","SearchContent"=>$arrays[$i]));
            $RetArray[$i] = $PostContent[0];
        }
        return $RetArray;
    }

    public static function getPosts($arrays)
    {
        $RetArray = array();
        for($i = 0 ;$i < count($arrays);$i++)
        {
            $PostContent = database::getInstance()->doQuery(array("table"=>"Post","SearchContent"=>$arrays[$i]));
            $RetArray[$i] = array("PostId"=>$arrays[$i],"PostTitle"=>$PostContent[0],"PostContent"=>$PostContent[1],
                                  "HeadTitile"=>$PostContent[2],"HeadDescription"=>$PostContent[3],"HeadKeywords"=>$PostContent[4],
                                  "HeadAuthor"=>$PostContent[5]);
        }
        return $RetArray;
    }
    public static function getPostById($id)
    {

        $PostContent = database::getInstance()->doQuery(array("table"=>"Post","SearchContent"=>$id));
        if($PostContent == null)
            return null;

        return array("PostId"=>$id,"PostTitle"=>$PostContent[0],"PostContent"=>$PostContent[1],
            "HeadTitile"=>$PostContent[2],"HeadDescription"=>$PostContent[3],"HeadKeywords"=>$PostContent[4],
            "HeadAuthor"=>$PostContent[5]);

    }

    public static function delPostById($id)
    {
        $FileDir = MY_ROOT."/DataBase/post/".$id;
        if(file_exists($FileDir))
        {
            return unlink($FileDir);
        }else
        {
            return false;
        }

    }

}