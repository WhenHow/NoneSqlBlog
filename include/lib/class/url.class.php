<?php
/**
 * Created by PhpStorm.
 * User: xwh
 * Date: 14-7-14
 * Time: 下午2:55
 */

class url {
    public static function getPostDisplayContentUrl($PostId)
    {
        $UrlMode = intval(URL_MODE);
        $logUrl = '';
        switch ($UrlMode) {
            case '0'://默认：动态
                $logUrl = BLOG_URL . '?post=' . $PostId;
                break;
            case '1'://静态
                $logUrl = BLOG_URL . 'post-' . $PostId . '.html';
                break;
            case '2'://目录
                $logUrl = BLOG_URL . 'post/' . $PostId;
                break;
        }
        return $logUrl;

    }
} 