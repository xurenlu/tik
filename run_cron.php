<?php
/**
 * just a example to show how to run program in command line <cli mode>
 *
 * */
ini_set("display_errors","On");
require "main.php";
$config["theme"]="default";
$config["resource_path"]="app/themes/";
$mod="cron";
$act="import";
runMVC();

