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

    public function getPostIds()
    {

    }

}