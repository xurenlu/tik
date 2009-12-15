<?php
/**
* 该文件应当是一个公用文件,各个模块,应用程序都应当调用这样一个文件.
* @author xurenlu<helloasp@hotmail.com>
* @version 1.0
*/
define("APP_ROOT",dirname(__FILE__)."/");
define("APP_PATH",dirname(__FILE__)."/app/");
define("LIB_PATH",dirname(__FILE__)."/lib/");
define("DATA_PATH",dirname(__FILE__)."/writable/data/");
define("VENDORS_PATH",dirname(dirname(__FILE__))."/vendors/");
define("BBS_BID",229);
define("BBS_PRE","http://app18.sns.bj2.aliyk.com/read.php?tid=");
global $mod_info;
$mod_info["product"]="Comment";
$mod_info["product_name"]="评论模块";
$mod_info["service_id"]=10002;
include LIB_PATH."psearch.php";
include LIB_PATH."phprpc/phprpc_client.php";
include APP_ROOT."config.php";
include "/home/renlu/devel/tinyMVC2/tinyMVC2/index.php";
include APP_ROOT."plugs/db.php";
include APP_ROOT."plugs/login.php";
define("UP_PATH",APP_ROOT."uploads/");
