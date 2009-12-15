<?php
global $data,$config;
?>
<div id="pager1">
<?php
	echo $data["articles"]["page"];
?>
</div>
<table >
	<thead>
		<th>评论类型</th>
		<th>评论主题</th>
		<th>评论时间</th>
		<th>内容摘要</th>
		<th>操作</th>	
	</thead>
	<tbody>
	<?php
	foreach($data["articles"]["rows"] as $r){
		echo '<tr>'.
		'<td>'.$r["service_name"].'&nbsp;</td>'.
		'<td>'.$r["object_name"].'&nbsp;</td>'.
		'<td>'.date("Y-m-d H:i:s",$r["created_time"]).'&nbsp;</td>'.
		'<td>'.$r["content"].'&nbsp;</td>';
		echo '<td>';
		echo '<a href="'.$r["url"].'">查看</a>';
		echo '<a href="?mod=m&act=comments_remove&id='.$r["id"].'"><img src="'.$config["img_path"].'/del_32.png" style="border:none;"></a>';
		echo '</td></tr>';
	}
	?>
	</tbody>
</table>
