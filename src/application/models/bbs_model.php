<?php

class Bbs_model extends CI_Model{


	// データベースからすべての記事を取得するメソッド
	function get_all_posts(){

		// bbsのカラムから情報を取得して、queryに格納
		$query = $this->db->get("bbs");
		// entryカラム情報を持ったqueryをresultに挿入
		// result()メソッドは、結果をオブジェクトの配列として、または失敗した場合には 空の配列 を返します。

    $sql="SELECT * FROM bbs ORDER BY no DESC";
    $query=$this->db->query($sql);
    return $query->result();

	}
	
	function add_new_entry($title, $message, $id, $date){
	  $data = array(
		  "title" => $title,
		  "message" => $message,
      "id" => $id,
      "date" => $date
	  );
	  $this->db->insert("bbs", $data);
  }
}
?>