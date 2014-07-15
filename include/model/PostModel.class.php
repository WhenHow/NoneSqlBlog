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

}