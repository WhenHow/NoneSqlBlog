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

}