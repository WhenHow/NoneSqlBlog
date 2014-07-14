<?php
/**
 * Created by PhpStorm.
 * User: XiangWenHao
 * Date: 14-7-8
 * Time: 上午9:14
 */
    error_reporting(7);
    /* function error_reporting(report_level)
      1     E_ERROR Fatal run-time errors. Errors that can not be recovered from. Execution of the script is halted
      2 	E_WARNING 	Non-fatal run-time errors. Execution of the script is not halted
      4 	E_PARSE 	Compile-time parse errors. Parse errors should only be generated by the parser
      8 	E_NOTICE 	Run-time notices. The script found something that might be an error, but could also happen when running a script normally
      16 	E_CORE_ERROR 	Fatal errors at PHP startup. This is like an E_ERROR in the PHP core
      32 	E_CORE_WARNING 	Non-fatal errors at PHP startup. This is like an E_WARNING in the PHP core
      64 	E_COMPILE_ERROR 	Fatal compile-time errors. This is like an E_ERROR generated by the Zend Scripting Engine
      128 	E_COMPILE_WARNING 	Non-fatal compile-time errors. This is like an E_WARNING generated by the Zend Scripting Engine
      256 	E_USER_ERROR 	Fatal user-generated error. This is like an E_ERROR set by the programmer using the PHP function trigger_error()
      512 	E_USER_WARNING 	Non-fatal user-generated warning. This is like an E_WARNING set by the programmer using the PHP function trigger_error()
      1024 	E_USER_NOTICE 	User-generated notice. This is like an E_NOTICE set by the programmer using the PHP function trigger_error()
      2048 	E_STRICT 	Run-time notices. PHP suggest changes to your code to help interoperability and compatibility of the code
      4096 	E_RECOVERABLE_ERROR 	Catchable fatal error. This is like an E_ERROR but can be caught by a user defined handle (see also set_error_handler())
      8191 	E_ALL 	All errors and warnings, except level E_STRICT (E_STRICT will be part of E_ALL as of PHP 6.0)
    */

    //open buffer area
    //ob_start();
    //send http  header info to client ,header must be send in first place,that's why we use ob_start()
    //header('Content-Type: text/html; charset=UTF-8');
    //echo('shit');
    //header("location:index.php");
    require_once(MY_ROOT.'/config.php');

    define('SPERATER_MARK',"<EndMark>\r\n");
    define('TPLS_PATH', MY_ROOT.'/include/template');
    define('TEMPLATE_PATH', TPLS_PATH.'/default');
    define('TPLS_URL', BLOG_URL.'include/template/default');
    define('TEMPLATE_URL', 	TPLS_URL.'/');

    require_once(MY_ROOT.'/include/lib/BaseFunction.php');
?>