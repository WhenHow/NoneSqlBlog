<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-11
 * Time: 下午3:56
 */

class option {
    public static $_instance = null;

    public static  function getInstance(){

        if(self::$_instance == null)
            self::$_instance = new option();

        return self::$_instance;
    }

    public static function getRoutingTable(){
        $routingtable = array(
            array(
                'model' => 'calendar',
                'method' => 'generate',
                'reg_0' => '|^.*/\?action=cal|',
            ),
            array(
                'model' => 'PostController',
                'method' => 'displayPostContent',
                'reg_0' => '|^.*/\?(post)=(\d+)(&(comment-page)=(\d+))?([\?&].*)?$|',
                'reg_1' => '|^.*/(post)-(\d+)\.html(/(comment-page)-(\d+))?/?([\?&].*)?$|',
                'reg_2' => '|^.*/(post)/(\d+)(/(comment-page)-(\d+))?/?$|',
                'reg_3' => '|^/([^\./\?=]+)(\.html)?(/(comment-page)-(\d+))?/?([\?&].*)?$|',
            ),
            array(
                'model' => 'Record_Controller',
                'method' => 'display',
                'reg_0' => '|^.*/\?(record)=(\d{6,8})(&(page)=(\d+))?([\?&].*)?$|',
                'reg' => '|^.*/(record)/(\d{6,8})/?((page)/(\d+))?/?([\?&].*)?$|',
            ),
            array(
                'model' => 'Sort_Controller',
                'method' => 'display',
                'reg_0' => '|^.*/\?(sort)=(\d+)(&(page)=(\d+))?([\?&].*)?$|',
                'reg' => '|^.*/(sort)/([^\./\?=]+)/?((page)/(\d+))?/?([\?&].*)?$|',
            ),
            array(
                'model' => 'Tag_Controller',
                'method' => 'display',
                'reg_0' => '|^.*/\?(tag)=([^&]+)(&(page)=(\d+))?([\?&].*)?$|',
                'reg' => '|^.*/(tag)/([^/?]+)/?((page)/(\d+))?/?([\?&].*)?$|',
            ),
            array(
                'model' => 'Author_Controller',
                'method' => 'display',
                'reg_0' => '|^.*/\?(author)=(\d+)(&(page)=(\d+))?([\?&].*)?$|',
                'reg' => '|^.*/(author)/(\d+)/?((page)/(\d+))?/?([\?&].*)?$|',
            ),
            array(
                'model' => 'Log_Controller',
                'method' => 'display',
                'reg_0' => '|^.*/\?(page)=(\d+)([\?&].*)?$|',
                'reg' => '|^.*/(page)/(\d+)/?([\?&].*)?$|',
            ),
            array(
                'model' => 'Search_Controller',
                'method' =>'display',
                'reg_0' => '|^.*/\?(keyword)=([^/&]+)(&(page)=(\d+))?([\?&].*)?$|',
            ),
            array(
                'model' => 'Comment_Controller',
                'method' => 'addComment',
                'reg_0' => '|^.*/\?(action)=(addcom)([\?&].*)?$|',
            ),
            array(
                'model' => 'Plugin_Controller',
                'method' => 'loadPluginShow',
                'reg_0' => '|^.*/\?(plugin)=([\w\-]+).*([\?&].*)?$|',
            ),
            array(
                'model' => 'Log_Controller',
                'method' => 'displayContent',
                'reg_0' => '|^.*?/([^/\.=\?]+)(\.html)?(/(comment-page)-(\d+))?/?([\?&].*)?$|',
            ),
            array(
                'model' => 'Log_Controller',
                'method' => 'display',
                'reg_0' => '|^/?([\?&].*)?$|',
            ),
        );
        return $routingtable;
    }

} 