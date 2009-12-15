<?php
global $data;
?>
    <h1> <?php echo $data["id"];?></h1>
    <h2>Reversion:<?php echo $data["revision"];?></h2>
    <hr>
<?php
echo $data["content"];?>
