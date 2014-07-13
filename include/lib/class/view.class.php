<?php
/**
 * Created by PhpStorm.
 * User: xwh
 * Date: 14-7-13
 * Time: 下午9:21
 */

class view {
    public static function getView($ViewName)
    {
        if (!is_dir(TEMPLATE_PATH)) {
            myMsg('当前使用的模板已被删除或损坏，请登录后台更换其他模板。');
        }
        return TEMPLATE_PATH .$ViewName
    }
} 