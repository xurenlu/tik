<?php
define("SCH_API","http://w02.pdb.cnb.yahoo.com:80/psearch/");
define("SCH_DB","./tinywiki/");

/**
查询一共有多少条符合条件的记录.
*/
function psearch_count($keyword){
    $key="psearch.count.$keyword";
    global $rpc_client;
    if(empty($rpc_client)){
        $rpc_client = new PHPRPC_Client();
        $rpc_client->setProxy(NULL);
        $rpc_client->useService(SCH_API);
    }
    $ret=$rpc_client->search_result_report(SCH_DB,$keyword);
    if(array_key_exists("Number",$ret)){
        error_log("error occured when search keyword:$keyword,api:".SCH_API.",db:".SCH_DB);    
        return 0;
    }
    else{
        //set_memcache_data($memcache,$key,$ret["matches_lower_bound"],4*3600);
        return intval($ret["matches_lower_bound"]);
    }
}
/**
从全文检索中搜索相关文章.
$keyword :要检索的词汇
$start:偏移起始量
$end:偏移结束值
*/
function psearch_search($keyword,$start,$end){
/*
    $memcache=get_memcache();
    $key="psearch.result.$keyword.$start:$end";
    if($data=get_memcache_data($memcache,$key)){
        return $data;
    }*/
    global $rpc_client;
    if(empty($rpc_client)){
        $rpc_client = new PHPRPC_Client();
        $rpc_client->setProxy(NULL);
        $rpc_client->useService(SCH_API);
    }

    $ret=$rpc_client->search(SCH_DB,$keyword,$start,$end);
    if(array_key_exists("Number",$ret)){
        error_log("error occured when search keyword:$keyword,api:".SCH_API.",db:".SCH_DB);    
        return array();
    }
    //set_memcache_data($memcache,$key,$ret,4*3600);
    return $ret;
}
/**
从分词接口中分词
$keyword :语句
$start:偏移起始量
$end:偏移结束值
*/
function psearch_seg($keyword){
/**
    $memcache=get_memcache();
    $key="psearch.seg.$keyword";
    if($data=get_memcache_data($memcache,$key)){
        return $data;
    }
*/
    global $rpc_client;
    if(empty($rpc_client)){
        $rpc_client = new PHPRPC_Client();
        $rpc_client->setProxy(NULL);
        $rpc_client->useService(SCH_API);
    }
    $ret=$rpc_client->cnseg($keyword);
    //set_memcache_data($memcache,$key,$ret,4*3600);
    return $ret;
}
/**
模糊检索用到的关键词
todo:需要删除"的","啊","呀"这样的无意义词
*/
function psearch_fuzzy($keyword){
    $seg=psearch_seg("$keyword");
    $q=join(" OR ",explode(" ",$seg));
    return $q;
}

function psearch_simple_index($id,$text){
    global $rpc_client;
    if(empty($rpc_client)){
        $rpc_client = new PHPRPC_Client();
        $rpc_client->setProxy(NULL);
        $rpc_client->useService(SCH_API);
    }
    $ret=$rpc_client->simple_index_data(SCH_DB,$id,$text);
    return $ret;	
}
/** 
查询库里一共有多少记录
*/
function psearch_total(){
    global $rpc_client;
    if(empty($rpc_client)){
        $rpc_client = new PHPRPC_Client();
        $rpc_client->setProxy(NULL);
        $rpc_client->useService(SCH_API);
    }
    return $rpc_client->count(SCH_DB);
}
/*
include "./phprpc/phprpc_client.php";
$text="我要测试一个";
$texts=psearch_seg($text);
print_r($texts);
print "indexed:";
print_r(psearch_simple_index("id1",$text));
echo "total:".psearch_total()."\n";
$fuz=psearch_fuzzy($text);
echo $fuz."\n";
$s=psearch_count($fuz);
print $s."\n";
$out=psearch_search($fuz,0,100);
print_r($out);
 */
?>
