<?php
global $data;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SAC - Simple accessible Charts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.chart {
	font-family: Tahoma;
	font-size: .7em;
	border: 1px solid #ccc;
	float: left;
	margin: 0;
	padding: .4em .1em;
}

.chart li {
	list-style: none;
	float: left;
	width: 5em;
	text-align: center;
	background: url("http://cn.yimg.com/lcs/08/01/chart_bg.gif") center 1.6em no-repeat;
}

.chart li span {
	display: block;
	text-indent: -999em;
	padding-bottom: 170px;
	background: url("http://cn.yimg.com/lcs/08/01/chart_bg_ol2.gif") center -1px no-repeat;
	border-top: 5px solid #fff;
}

.chart strong {
	display: block;
	text-align: center;
    font-weight: normal;
    background:none;
    color:#315683;
}
</style>
</head>

<body>

<ul class="chart">
<?php
foreach($data["rows"] as $r)
{
	$offset=170*($r["su"]/$data["max"])*(-1);
?>
<li><span style="background-position: center <?php echo $offset;?>">: </span><strong><?php echo $r["pkey"];?></strong></li>
<?php
}
?>
</ul>
<p style="clear: both"></p><p>&nbsp;</p>

</body>
</html>
