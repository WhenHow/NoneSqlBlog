<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-16
 * Time: 下午1:38
 */

class login {
    public static function isLogin()
    {

        $cookie = "";
        if(isset($_COOKIE[AUTH_COOKIE_NAME]))
        {
            $cookie = $_COOKIE[AUTH_COOKIE_NAME];
        }else
        {
            return false;
        }

        if(!self::checkCookieValidation($cookie))
            return false;

        return true;
    }

    public static function checkCookieValidation($cookie)
    {
        if(empty($cookie))
            return false;

        $CookieArray = explode($cookie,'|');
        if(count($CookieArray)!=3)
            return false;

        list($UserName,$expiration,$hmac) = $CookieArray;

        if (!empty($expiration) && $expiration < time()) {
            return false;
        }

        $key = self::emHash($UserName . '|' . $expiration);
        $hash = hash_hmac('md5',$UserName . '|' . $expiration, $key);

        if ($hmac != $hash) {
            return false;
        }

        if($UserName!='root')
            return false;

        return true;

    }

    public s

    public static  function checkUser($username, $password, $img_code)
    {
        session_start();
        if (trim($username) == '' || trim($password) == '') {
            return false;
        }else{
            $SessionCode = isset($_session['code'])?$_session['code']:"";
            if($SessionCode!=$img_code||empty($SessionCode)){
                return -1;
            }
        }

        if($username!='root')
            return -2;

        $pwd = '$P$BxzShkxnE7VlU.PxZc5k9e0DZlxxzR0';
        if(!self::checkPassword($password,$pwd))
            return -3;

        return 0;

    }

    public static function loginPage($errorCode = NULL) {
            $ckcode = "<span>验证码</span>
        <div class=\"val\"><input name=\"imgcode\" id=\"imgcode\" type=\"text\" />
        <img src=\"../include/lib/checkcode.php\" align=\"absmiddle\"></div>";
        $error_msg = '';
        if ($errorCode) {
            switch ($errorCode) {
                case -1:
                    $error_msg = '验证错误，请重新输入';
                    break;
                case -2:
                    $error_msg = '用户名错误，请重新输入';
                    break;
                case -3:
                    $error_msg = '密码错误，请重新输入';
                    break;
            }
        }
        require_once View::getView('login.php');
    }
    public static function checkPassword($password, $hash) {
        global $em_hasher;
        if (empty($em_hasher)) {
            $em_hasher = new PasswordHash(8, true);
        }
        $check = $em_hasher->CheckPassword($password, $hash);
        return $check;
    }

    private static function emHash($data) {
        $key = AUTH_KEY;
        return hash_hmac('md5', $data, $key);
    }

    public static function setAuthCookie($UserName,$expired)
    {
        if(empty($UserName))
            return null;

        $auth_cookie_name = AUTH_COOKIE_NAME;
        $cookie = self::generateCookie($UserName,$expired);
        setcookie($auth_cookie_name,$cookie,$expired,'/');

    }

    private static function generateCookie($UserName,$expired)
    {
        $key = self::emHash($UserName.'|'.$expired);
        $hash = hash_hmac('md5',$UserName.'|'.$expired,$key);
        $cookie = $UserName.'|'.$expired.'|'.$hash;
        return $cookie;
    }

} 