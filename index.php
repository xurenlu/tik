<?php
ini_set("display_errors","On");
error_reporting(E_ALL);
require "main.php";
$config["theme"]="default";
$config["resource_path"]="app/themes/";
//$config["js_path"]="app/themes/".$config["theme"]."/resource/javascript/";
//$config["css_path"]="app/themes/".$config["theme"]."/resource/css/";
//$config["img_path"]="app/themes/".$config["theme"]."/resource/images/";
runMVC();

