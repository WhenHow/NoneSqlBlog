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