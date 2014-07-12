<?php
/**
 * Created by PhpStorm.
 * User: xwh
 * Date: 14-7-8
 * Time: 下午1:06
 */
class dispatcher
{
    /*router dispatcher. Handel any request by your your url */
    private $_module = '';
    private $_method = '';
    private $_parameters = '';
    private $_routingTable;
    private $_path = NULL;
    private $_instance = null;

    public function dispatcher()
    {

    }

    public static function getInstance()
    {
        if( self::$_instance == null)
        {
            self::$_instance = new dispatcher();
        }
        return self::$_instance;
    }

}
?>