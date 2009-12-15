<?php
Class Controller_Default extends Controller{
    function action_default(){
        v();
    }
    function action_list(){
        global $data;
        $kv=new kv("sys");
        $keys=$kv->allkeys("wikis");
        $data["keys"]=array_reverse($keys);
        v();
    }
    function action_show(){
        global $data;
        $kv=new kv("sys");
        $id=$_GET["id"];
        $data["id"]=$id;
        //$v=$kv->allkeys("revision.page.".md5($id));
        $data["content"]=$kv->get("wikipages",$id);
        //$data["revision"]=$kv->get("revisions",$id);
        $data["revisions"]=$kv->allkeys("revision.page.".md5($id));
        arsort($data["revisions"]);
        v();
    }
    function action_revision(){
        global $data;
        $kv=new kv("sys");
        $id=$_GET["id"];
        $data["id"]=$id;
        $data["revision"]=$_GET["r"];
        $data["content"]=$kv->get("revision.page.".md5($id),$_GET["r"]);
        v();
    }
    function action_edit(){
        global $data;
        $id=$data["id"]=$_GET["id"];
        $kv=new kv("sys");
        $data["content"]=$kv->get("wikis",$id);
        v();
    }
    function action_save(){
        global $tUser;
        $kv=new kv("sys");
        $id=$_POST["id"];
        $html=$content=$_POST["content"];
        $revision=time();
        $data["id"]=$id;
        $kv->push("wikis",$id,$content);
        //psearch_simple_index($id,psearch_seg($tUser." ".$id." ".$content));
        include LIB_PATH."dokuwiki/doku.php";
        $html=doku_parser($content);
        //$revision=$kv->get("revisions",$id);
        //$revision++;
        //$kv->push("revision.",$id,$revision);
        $kv->push("revision.source.".md5($id),$revision,$content);
        $kv->push("revision.page.".md5($id),$revision,$html);
        $kv->push("wikipages",$id,$html);
        $kv->restat_keys("wikipages");
        $kv->restat_keys("wikis");
        $kv->restat_keys("revision.source.".md5($id));
        $kv->restat_keys("revision.page.".md5($id));
        header("Location:index.php?act=show&id=".urlencode($id));
    }
    function action_search(){
        global $data;
        $kv=new kv("sys");
        $p=$_GET["p"];
        $fuzzy=psearch_fuzzy($p);
        //$total=psearch_count($fuzzy);
        $results=psearch_search($fuzzy,0,200);
        $data["hits"]=$results;
        v();
    }
    function action_files(){
        global $config;
        global $data;
        global $tUser;
        $config["use_layout"]=false;
        $kv=new kv("sys");
        $keys=$kv->allkeys("user.$tUser.files");
        $data["files"]=array_reverse($keys);
        v();
    }
    /**
     * 处理文件上传
     * */
    function action_upload(){
        global $config;
        global $data;
        global $tUser;
        $config["use_layout"]=false;
        $kv=new kv("sys");
        $up=new upfile(UP_PATH.date("Ym"),explode(",","doc,docx,xls,xlsx,txt,zip,rar,gif,bmp,jpg,png"));
        $ups=$up->upload($_FILES["up"]);
        foreach($ups as $file){
            $kv->push("sys.files",$file,$file);
            $kv->push("user.$tUser.files",$file,$file);
        }
        $kv->restat_keys("sys.files");
        $kv->restat_keys("user.$tUser.files");
        header("Location:?act=files");
    }
}
