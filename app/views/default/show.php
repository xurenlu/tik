<?php
global $data;
if(empty($data["content"])){
    include dirname(__FILE__)."/edit.php";
}
else{
?>
<?php echo $data["content"];?>
历史版本:
<ol>
<?php
    foreach($data["revisions"] as $r){
?>
<li>
    <a href="?act=revision&r=<?php echo $r;?>&id=<?php echo h($data["id"]);?>"><?php echo $data["id"];?>:<?php echo date("Y-m-d H:i:s",$r);?></a>
</li>
<?php
    }
?>
</ol>
<?php
}
?>
