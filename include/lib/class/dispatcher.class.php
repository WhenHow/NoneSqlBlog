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
    private $_controller = '';
    private $_method = '';
    private $_parameters = '';
    private $_routingTable;
    private $_path = null;
    private static $_instance = null;

    public function dispatcher()
    {
        $this->_path = $this->_setPath();
        $this->_routingTable = option::getRoutingTable();
        $UrlMode = 2;
        $reg = '';
        foreach($this->_routingTable as $route)
        {
            if(!isset($route['reg_'.$UrlMode]))
            {
                $reg = isset($route['reg'])?$route['reg']:$route['reg_0'];
            }else
            {
                $reg = $route['reg_'.$UrlMode];
            }
            if(preg_match($reg,$this->_path,$matches))
            {
                $this->_controller = $route['model'];
                $this->_method = $route['method'];
                $this->_parameters = $matches;
                break;
            }
        }

        if (empty($this->_controller))
        {
            echo('not found');
        }

    }

    public function dipatch()
    {
        $controller = new $this->_controller();
        $method = $this->_method;
        $controller->$method($this->_parameters);
    }

    public static function getInstance()
    {
        if( self::$_instance == null)
        {
            self::$_instance = new dispatcher();
        }
        return self::$_instance;
    }

    private function _setPath()
    {
        $path = "";
        if(isset($_SERVER['HTTP_X_REWRITE_URL'])){//for iis rewrite option
            $path = $_SERVER['HTTP_X_REWRITE_URL'];
        }elseif(isset($_SERVER['REQUEST_URI'])){
            $path = $_SERVER['REQUEST_URI'];
        }else
        {
            if(isset($_SERVER['argv']))//url ?a=1&b=2 ,$_SERVER['argv'][0] = 'a=1&b=2'
                $path = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];//$_SERVER['PHP_SELF']正在执行脚本的文件名
            else
                $path = $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING'];
        }

        //for iis6 path is GBK转换GBK为UTF-8
        //stristr 找到返回子字符串的位置 否则返回false
        if (isset($_SERVER['SERVER_SOFTWARE']) && false !== stristr($_SERVER['SERVER_SOFTWARE'], 'IIS')) {
            if (function_exists('mb_convert_encoding')) {
                $path = mb_convert_encoding($path, 'UTF-8', 'GBK');
            } else {
                $path = @iconv('GBK', 'UTF-8', @iconv('UTF-8', 'GBK', $path)) == $path ? $path : @iconv('GBK', 'UTF-8', $path);
            }
        }
        //for ie6 header location
        $r = explode('#', $path, 2);
        $path = $r[0];
        //for iis6
        $path = str_ireplace('index.php', '', $path);
        //for subdirectory
        $t = parse_url(BLOG_URL);
        $path = str_replace($t['path'], '/', $path);
        return $path;
    }
}
?>