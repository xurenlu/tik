<?php
global $config;
$config["pager"]="default";
$config["pagesize"]=20;
$config["use_layout"]=true;
//$config["debug"]=true;
//$config["static"]="http://2008.me.com.cn/club/resource";
$config["js_path"]="./js/";
$config["css_path"]="./css/";
$config["img_path"]="./images/";
/**
 * 数据连接相关
 */
$j=0;

$config['db'][$j]['dbhost'] = "localhost";
$config['db'][$j]['dbname'] = "tinyMVC2";
$config['db'][$j]['dbuser'] = "root";
$config['db'][$j]['dbpass'] = "";
$config['db'][$j]['dbusepconnect'] = "0";
$config['db'][$j]['tableprefix'] = "";
$j++;

$config['db'][$j]['dbhost'] = "localhost";
$config['db'][$j]['dbname'] = "tinyMVC2";
$config['db'][$j]['dbuser'] = "root";
$config['db'][$j]['dbpass'] = "";
$config['db'][$j]['dbusepconnect'] = "0";
$config['db'][$j]['tableprefix'] = "";



$j=0;

$config['memcache'][$j]['host'] = "localhost";
$config['memcache'][$j]['port'] = 1978;
$j++;

$config['memcache'][$j]['host'] = "localhost";
$config['memcache'][$j]['port'] = 1978;
$j++;

$config['memcache'][$j]['host'] = "localhost";
$config['memcache'][$j]['port'] = 1978;
$j++;

$config['memcache'][$j]['host'] = "localhost";
$config['memcache'][$j]['port'] = 1978;
$j++;

$config['memcache'][$j]['host'] = "localhost";
$config['memcache'][$j]['port'] = 1978;
$j++;

$config['memcache'][$j]['host'] = "localhost";
$config['memcache'][$j]['port'] = 1978;
$j++;

$config['memcache'][$j]['host'] = "localhost";
$config['memcache'][$j]['port'] = 1978;
$j++;

$config['memcache'][$j]['host'] = "localhost";
$config['memcache'][$j]['port'] = 1978;
$j++;



$config["memcaches"]="w02.pdb.cnb:1978";
define("COOKIE_PATH","/");
define("COOKIE_DOMAIN",null);

$config["kv_type"]="mysql";
/**
分页器的选择
*/
//$config["debug"]=true;
