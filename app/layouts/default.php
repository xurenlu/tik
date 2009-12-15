<?php
global $data;
global $main_menus;
global $sub_menus;
global $config;
global $tUser;
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
  <meta name="verify-v1" content="WFRmkrwzeg6C+IdiFmXrhKCuP9bFz6sgime3Rd2q4i8=" />
  <meta name="generator" content=
  "HTML Tidy for Linux (vers 6 November 2007), see www.w3.org">
  <meta http-equiv="content-type" content=
  "text/html; charset=utf-8">
  <meta name="robots" content="NONE,NOARCHIVE">

  <title> <?php ?>title </title>
<?php css("style");?>
<style type="text/css">
ul.nav li{
    display:inline;
}
div#main-body {
    margin-left:100px;
    margin-top:30px;
    margin-right:10px;
    padding:30px;
    border-top:1px solid #ccc;
}
div#last-row {
    margin-right:10px;
    margin-left:100px;
    margin-top:30px;
    padding:30px;
    border-top:1px solid #ccc;
}
h1 {
font-size:18px;
}
h2 {
font-size:16px;
}
</style>
</head>

<body  class=" yui-skin-sam">
<div id="first-row">
<h1 style="float:left;height:100px;background:url('images/logo.png') no-repeat;font-size:16px;text-align:center;color:Blue;padding:20px;"><a href="?act=list" style="text-decoration:none;">Simple wiki</a></h1>
欢迎你,<?php echo $tUser;?>
<ul style="display:inline;" class="nav">
<li> <a href="?act=">home</a></li>
<li> <a href="?act=list">list</a></li>
<?php
if($_GET["id"]) { ?>
    <li> <a href="?act=edit&id=<?php echo h($_GET["id"]);?>">编辑</a></li>
<?php } ?>
</ul>
<h1 style="display:inline;">搜索</h1>
<Form method="GET" action="" style="display:inline;">
<input name="act" value="search" type="hidden">
<input name="p" value="">
<input name="submit" value="Go" type="submit">
</form>


<h1 style="display:inline;">创建新主题</h1>
<form method="GET" action="" style="display:inline">
创建新标题:
<input name="act" value="show" type="hidden">
<input name="id" value="">
<input name="submit" value="Go" type="submit">
</form>
</div>
<div id="main-body">
<?php
    include(APP_PATH."views/$mod/$act.php");
?>
</div>
<div id="last-row" style="text-align:center;">请遵守当地法律;</div>
</body>
</html><!-- 
hostname:<?php echo `hostname`;?>
ip:<?php echo 
`/sbin/ifconfig|grep "inet "|grep -v "127.0.0.1"|awk '{print $2}'| awk -F ":" '{print $2}'`;?>
?> -->
