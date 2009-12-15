<?php
global $data;
echo "<ul>";
foreach($data["keys"] as $k=>$v){
    if(!empty($v))
    echo "<li><a href='?act=show&id=".urlencode($v)."'>".$v."<a></li>";
}
echo "</ul>";
?>
