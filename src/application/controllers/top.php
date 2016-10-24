<?php
class Top extends CI_Controller{
 public function __construct(){
  parent::__construct();
  $this->load->database();
  $this->load->helper(array('form', 'url'));
  $this->load->library('form_validation');
 }
 function form(){
 $this->form_validation->set_rules('id', 'アカウント名', 'required');
  if ($this->form_validation->run() == FALSE)
  {
  $this->load->view('login');
  }else{
  $this->load->view('bbs');
  }
 }
 function login() {
 if($this->input->post('id') !=null)
	{
		$data=array('id'=>$this->input->post('id',true),
		'pass'=>$this->input->post('pass',true));
		$this->db->insert('user',$data);
		$this->load->view('bbs');
	}
	}
}
?>