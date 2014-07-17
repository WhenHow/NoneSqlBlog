<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-15
 * Time: 下午4:02
 */
require_once("../init.php");
define('TEMPLATE_PATH', MY_ROOT.'/console/view/');
$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';


if($action == 'login')
{
    $username = isset($_POST['user']) ? addslashes(trim($_POST['user'])) : '';
    $password = isset($_POST['pw']) ? addslashes(trim($_POST['pw'])) : '';
    $img_code = isset($_POST['imgcode']) ? addslashes(trim(strtoupper($_POST['imgcode']))) : '';

    $loginAuthRet = login::checkUser($username, $password, $img_code);
    if($loginAuthRet == 0)
    {
        login::setAuthCookie($username,null);
        header("location:./");
        exit;
    }
    login::loginPage($loginAuthRet);
}

if(!IS_LOGIN)
    login::loginPage();
