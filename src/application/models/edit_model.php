<?php

class Edit_model extends CI_Model{

  function select($str){
    $sql="SELECT * FROM Bbs WHERE no = ?";
    $query=$this->db->query($sql,$str);
    return $query->result();
  }
  
  function change($title,$message,$no){
    $sql="UPDATE bbs SET title = ?, message = ? where no = ?";
    $query=$this->db->query($sql,array("{$title}","{$message}","{$no}"));
  }
  
  function delete($no){
    $sql="delete from bbs where no = ?";
    $query=$this->db->query($sql,$no);
  }

}
?>