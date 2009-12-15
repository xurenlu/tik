<?php
global $data;
?>
<h1>搜索结果</h1>
<ol>
<?php
foreach($data["hits"] as $t){
?>
<li>
<a href="?act=show&id=<?php echo urlencode($t);?>"><?php echo $t;?></a>
</li>
<?php
}
?>
</ol>

<?php
print $data["pstr"];
?>
