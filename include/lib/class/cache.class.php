<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-9
 * Time: 下午4:14
 */
class cache
{
    private $DB;
    public $OptionsCache ;
    public static $_instance = null;

    public function cache()
    {
        $this->DB =  database::getInstance();
    }

    public static function getInstance()
    {
        if(self::$_instance == null)
        {
            self::$_instance = new cache();
        }

        return self::$_instance;
    }

    /*
     * make option table's cache
     * */
    public function makeCacheOfOption()
    {
        $sql = 'select * from '.DB_PREFIX.'options';
        $res = $this->DB->doQuery($sql);
        if($res){
            while($row = $this->DB->fetchArray($res)){
                if(in_array($row['option_id'], array('site_key', 'blogname', 'bloginfo', 'blogurl', 'icp'))){
                    $row['option_value'] = htmlspecialchars($row['option_value']);
                }
            }
        }

    }
}