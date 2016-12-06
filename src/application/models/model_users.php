<?php

class Model_users extends CI_Model{

  public function can_add(){

		$this->db->where("id", $this->input->post("id"));	//POSTされたidデータとDB情報を照合する
		$query = $this->db->get("user");

		if($query->num_rows() == 1){	//ユーザーが存在した場合の処理
			return true;
		}else{					//ユーザーが存在しなかった場合の処理
			return false;
		}
	}
  
  public function user_check($no){
    $sql="SELECT * FROM Bbs WHERE no = ?";
    $query=$this->db->query($sql,$no);
    (string)$id = null;
    foreach ($query->result() as $post) {
      $id = $post->id;
    }
  if($id != null){
    if($this->session->userdata("id") == $id)
      return true;
    else
      return false;
  }else{
    return false;
  }
  }
  
	public function can_log_in(){	//can_log_inメソッドを作っていく

		$this->db->where("id", $this->input->post("id"));	//POSTされたidデータとDB情報を照合する
		$this->db->where("pass", $this->input->post("pass"));	//POSTされたパスワードデータとDB情報を照合する
		$query = $this->db->get("user");

		if($query->num_rows() == 1){	//ユーザーが存在した場合の処理
			return true;
		}else{					//ユーザーが存在しなかった場合の処理
			return false;
		}
	}

   
}
?>