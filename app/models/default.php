<?php
class model_default {
    static function list_cate($cate="_cate_all"){
        $domain="global";
        $kv=new kv($domain);
        $keys=$kv->allkeys("global");
        return $keys;
    }
}


