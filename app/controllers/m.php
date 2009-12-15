<?php
Class Controller_M extends Controller{
	function action_default(){
		
	}
	function action_comments_list(){
		global $data;
		$comm=new model("comments");
		$data["articles"]=$comm->page("service_id,object_id,id,ip,create_time,author,service_name");
		v();
	}
	function action_comments_remove(){
		$comm=new table("comments");
		$id=intval($_GET["id"]);
		$comm->delete($id);
		show_msg("删除成功",$_SERVER["HTTP_REFERER"]);
	}
}
