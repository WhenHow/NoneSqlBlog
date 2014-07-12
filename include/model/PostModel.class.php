<?
class PostModel{
    public  $DB = null;
    public function PostModel()
    {
        $this->DB = database::getInstance();
    }

    public function fetchPostById($PostId)
    {
        return $DB->doQuery(array("table"=>"Post","SearchContent"=>$PostId));
    }
}