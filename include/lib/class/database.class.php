<?php
/**
 * Created by PhpStorm.
 * User: xwh
 * Date: 14-7-8
 * Time: 下午2:06
 */

class database {
    public static function getInstance()
    {
        return mysql::getInstance();
    }
} 