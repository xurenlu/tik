<?php
global $data,$config;
$i=$data["iframe"];
echo js("yahoo-dom-event");
echo css("reset");
?>
  <meta http-equiv="content-type" content=
  "text/html; charset=utf-8"> 
<div id="post_form">
	<form action="?act=save_comment" method="POST">
		<input name="service_id" value="<?php echo $i["service_id"];?>" type="hidden"/>
		<input name="object_id" value="<?php echo $i["object_id"];?>" type="hidden"/>
		<input name="object_name" value="<?php echo htmlspecialchars($i["object_name"]);?>" type="hidden"/>
		<input name="service_name" value="<?php echo htmlspecialchars($i["service_name"]);?>" type="hidden"/>
		<input name="url" value="<?php echo htmlspecialchars($_SERVER["HTTP_REFERER"]);?>" type="hidden"/>
		<table cellspacing="0" cellpadding="0" border="0">
		<tr>
			<th>评论</th>
            <td>
<input name="author_name" value="<?php echo $_GET["uname"];?>" maxlength="25" type="hidden" readonly>
<input name="uid" value="<?php echo $_GET["uid"];?>" type="hidden">
<textarea rows="7" cols="50" name="content"></textarea>
</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;<input name="submit" value="提交" type="submit"/></td>
		</tr>
		</table>
	</form>
	<div id="comments_list">
	<table cellspacing="0" border="0" width="90%" cellpadding="0">
	<?php
	foreach($data["comments"]["rows"] as $c){
		echo '<tr><td height="20">作者:'.$c["author"].'</td><td>时间:'.date("Y-m-d H:i",$c["created_time"]).'</td><td>IP:';
		$ip=long2ip($c["ip"]);
		$ips=explode(".",$ip);
		array_pop($ips);
		echo join(".",$ips).".*";
		echo '</td></tr>';
		echo '<tr><td colspan="3" >&nbsp;</td></tr>';
		echo '<tr><td colspan="3" style="border-bottom:1px dashed #ccc;margin-bottom:12px;padding-bottom:12px;">'.$c["content"].'</td></tr>';
		echo '<tr><td colspan="3" >&nbsp;</td></tr>';
	}
	?>		
	</table>
		<div id="comment_page">
		<?php
			echo $data["comments"]["page"];
		?>
		</div>
	</div>
</div>
<script >
	YAHOO.util.Event.onDOMReady(function(){
        var height=(YAHOO.util.Dom.getDocumentHeight())+80;
		parent.setHeight(height);
	});
</script>
