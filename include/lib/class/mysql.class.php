<?php
/**
 * Created by PhpStorm.
 * User: xwh
 * Date: 14-7-8
 * Time: 下午2:05
 */

class mysql {
    private static $_instance = null;
    private $_conn;

    public static function getInstance()
    {
        if (self::$_instance == null)
          self::$_instance = new mysql();
        return self::$_instance;
    }

    /*public function mysql()
    {
        if(!function_exists('mysql_connect'))
        {
            echo(SERVER_NOT_SUPPORT_MYSQL);
        }
        $this->_conn = @mysql_connect(DB_HOST,DB_USER,DB_PASSWD);//@ mark will block the error message
        if(!$this->_conn)
        {
            switch(mysql_errno())
            {
                case 2005:
                    myMsg(MYSQL_ERROR_2005);
                    break;
                case 2003:
                    myMsg(MYSQL_ERROR_2003);
                    break;
                case 2006:
                    myMsg(MYSQL_ERROR_2006);
                    break;
                case 1045:
                    myMsg(MYSQL_ERROR_1045);
                    break;
                default :
                    myMsg(MYSQL_ERROR_DEFAULT.mysql_errno());
                    break;
            }
        }else
        {
            if($this->getMysqlVersion()>'4.1')
            {
                mysql_query("Set Names 'utf8'");
            }

            @mysql_select_db(DB_NAME,$this->_conn) or die(MYSQL_ERROR_UNKOWN_DATABASE_NAME);
        }
    }*/

    /*public function doQuery($sql)
    {
        $QueryResult = mysql_query($sql);

        if(!$QueryResult)
        {
            myMsg(MYSQL_ERROR_QUREY);
        }
        return $QueryResult;
    }

    public function fetchArray($QuerySet)
    {
        return @mysql_fetch_array($QuerySet);
    }*/

    public function doQuery($sql)
    {
        $TableDir = MY_ROOT."/DataBase/".$sql['table'];
        $TableFile = $TableDir."/".$sql["SearchContent"];

        if(!empty($sql['table'])&&file_exists($TableFile))
        {
           return explode(SPERATER_MARK,file_get_contents($TableFile));
        }else
        {
            myMsg('can not find table:'.$TableFile);
            return null;
        }
    }

    public function fetchArray($QuerySet)
    {
        return @mysql_fetch_array($QuerySet);
    }






    public function fetchRow($QuerySet)
    {
        return @mysql_fetch_row($QuerySet);
    }
    /*
     *mysql_fetch_array can use row['columnName'] to get content, mysql_fetch_row  can use row[0].that is the difference*/
    public function getMysqlVersion()
    {
        return mysql_get_server_info();
    }
} 