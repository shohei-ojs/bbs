<?php

class Search_model extends CI_Model{

  function search($str){
    $sql="SELECT * FROM Bbs WHERE title like ? OR message like ?";
    $query=$this->db->query($sql,array("%{$str}%","%{$str}%"));
    return $query->result();
  }

}
?>