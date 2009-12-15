<?php
class model_cron{
	static function run_import(){
		var_dump(psearch_total());
		$tmpdata=json_decode(file_get_contents(DATA_PATH."pw.php",true),true);
		if(empty($tmpdata)){
			$tmpdata["last_added"]=0;
			$tmpdata["min_tid"]=0;
		}
		$pw=new table("pw_threads");

		$rows=	$pw->findALL("subject,tid,hits,replies","fid=".BBS_BID ." AND tid>".intval($tmpdata["min_tid"]) ," replies ASC",20);
		foreach($rows as $r){
			psearch_simple_index($r["tid"],$r["subject"]);
			$tmpdata["min_tid"]=$r["tid"];
		}
		
		file_put_contents(DATA_PATH."pw.php",json_encode($tmpdata));
	}
	/**
	统计单个地区出现的次数;
	*/
	static function stat_single_area($area){
		global $DBR;
		$pw=new table("pw_threads");
		$row=	$pw->findROW("count(*) as c","fid=".BBS_BID ." AND subject like '%".mysql_escape_string($area)."%'");
		return intval($row["c"]);	
	}
}

