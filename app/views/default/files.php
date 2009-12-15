<?php
global $data;
echo '    
    <form method="post" action="?act=upload" enctype="multipart/form-data">
    上传:
            <input type="file" name="up" id="up" />
            <input type="submit" name="submit" value="submit" />
        </form>
        ';
echo "<h1>文件列表</h1>";
red("点击文件名复制路径");
echo '<ul>';
foreach($data["files"] as $file){
    echo '<li><a href="'.$file.'">'.$file.'</a>';
}
echo '</ul>';

