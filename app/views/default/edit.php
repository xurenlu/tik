编辑页面<?php echo red($data["id"]);?>
<form method="POST" action="?act=save">
<input name="id" type="hidden" value="<?php echo h($data["id"]);?>"/>
<h3>内容:</h3>
<table >
<tr >
<td>
<textarea name="content" rows="20" cols="65" style="height:400px;"><?php
if(!empty($data["content"])){
    echo h($data["content"]);
}
?></textarea>
</td>
<td>
<iframe src="?act=files" height="400" width="300" frameborder="0"></iframe>
</td>
</tr>
</table>
<p>
<button type="submit">提交</button>

</form>
<?php js("jquery"); ?>
<script type="text/javascript">
$(document).ready(function(){
});
</script>
