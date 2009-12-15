<?php
set_include_path("./");
ignore_user_abort();
$starttime=time();
function enddo(){
    global $starttime,$endtime;
    $endtime=time();
    print "used:";
    print ($endtime-$starttime);
    print "seconds";

    //$j=$rpc_client->close_index_($db,$rows,array("text","author","name"));
    //print "closed:";
    //print_r($j);
}
register_shutdown_function("enddo");
include "./phprpc_client.php";
 $rpc_client = new PHPRPC_Client();
 $rpc_client->setProxy(NULL);
 $rpc_client->useService('http://w02.pdb.cnb:8020/');
 #$rpc_client->setKeyLength(1024);
 #$rpc_client->setEncryptMode(3);

 
 $db="./amazon";
 $res=$rpc_client->create_index($db,array("text","author","name"),array("text","author","name"),array());
 print_r($res);
$book2=array(
    "text"=>"jojo",
    "author"=>"ma",
    "name"=>"goto"
);
 $startitem=intval(file_get_contents("./offset"));
$k=0;
for($i=933;$i<3300;$i++){
    $start=$i*200;
    file_put_contents("./start",$start);
    $SQL="SELECT id,name,author,brief FROM book LIMIT $start,200";
    $conn=mysql_connect("h07-vm16.corp.cnb.yahoo.com","yahoo","");
    mysql_select_db("book",$conn);
    mysql_query("set names utf8");
    $rs=mysql_query($SQL);
    $num=mysql_num_rows($rs);
    if($num==0){
        print "aHa,it's the end";
        break;
    }
    $rows=array();
    while($row=mysql_fetch_assoc($rs)){
        print $k++.",";
        $rows[]=$row;
    }
    file_put_contents("./k",$k);
    $j=$rpc_client->batch_index($db,$rows,array("text","author","name"));
    print "\n:$k:".$j["code"]."\n,";
    mysql_free_result($rs);
}
mysql_close($conn);
//print_r($rpc_client->index_data($db,"book1",$book1,array("text","author")));
var_dump($rpc_client->count($db));
