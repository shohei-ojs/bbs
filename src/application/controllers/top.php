<?php
class Top extends CI_Controller{
 public function __construct(){
  parent::__construct();
  $this->load->library('form_validation');
  $this->load->model("bbs_model");
  $this->load->model("model_users");
  $this->load->model("edit_model");
 }
 

 function form(){
      $this->load->view('login');
  }
  
 // トップページリンク
 public function toppage(){
	if($this->session->userdata("is_logged_in")){	
  //ログインしている場合
		$data['query'] = $this->bbs_model->get_all_posts();
		$this->load->view("bbs",$data);
	}else{									
  //ログインしていない場合
		$this->load->view("login");
	}
 }
 
 // 検索ページリンク
 public function search(){
  $this->load->view('search');
 }
 
 // 編集・削除ページリンク
 public function edit_delete(){
  $this->load->view('edit_delete');
 }
 
 
 // 登録・ログインの検証
 function login_validation() {
  	$this->load->library("form_validation");

	  $this->form_validation->set_rules("id", "アカウント名", "required|trim|callback_validate_credentials");	//ID入力欄のバリデーション設定
	  $this->form_validation->set_rules("pass", "パスワード", "required|trim");	//パスワード入力欄のバリデーション設定
  	
  	if($this->session->userdata("is_logged_in"))
  		  $this->load->view("bbs");
  	if($this->form_validation->run()){	
    //バリデーションエラーがなかった場合の処理
  		  $data = array(
		  "id" => $this->input->post("id"),
		  "is_logged_in" => 1
		  );
		  $this->session->set_userdata($data);
		  $data['query'] = $this->bbs_model->get_all_posts();
		  $this->load->view("bbs",$data);
	  }else{							
    //バリデーションエラーがあった場合の処理
		  $this->load->view("login");
	  }
 
 }
 
 //ID情報がPOSTされたときに呼び出されるコールバック機能
 public function validate_credentials(){		
	$this->load->model("model_users");
  
  // 登録実行時
  if($this->input->post('action') == 'entry'){
    if($this->model_users->can_add()){
      $this->form_validation->set_message("validate_credentials", "すでにユーザーが存在します。");
      return false;
      // 登録失敗
    }else{
      // データベースへユーザー情報を登録
      $data=array('id'=>$this->input->post('id',true),
		  'pass'=>$this->input->post('pass',true));
		  $this->db->insert('user',$data);
      return true;
      // 登録成功
      }
  }else{
  // ログイン実行時
    if($this->model_users->can_log_in()){
      return true;
      // ログイン成功
	  }else{
		  $this->form_validation->set_message("validate_credentials", "ユーザー名かパスワードが異なります。");
		  return false;
      // ログイン失敗
	  }
  }

 }
 
  // 記事投稿
  function add_new_entry(){
  
  	// バリデーションルールの設定
  	$this->form_validation->set_rules("title", "タイトル", "required|max_length[50]");
  	$this->form_validation->set_rules("message", "本文", "required");
  
  	if( $this->form_validation->run() == FALSE ){
  		// フォームバリデーションエラーが起きたら以下を実行
  		// ページの初回読み込み時は自動的に起動
  		redirect("top/toppage");
  	}else{
  		// POSTされた内容を変数に格納する
  		$title = $this->input->post("title");
  		$message = $this->input->post("message");
  		$id = $this->session->userdata("id");
  		date_default_timezone_set('Asia/Tokyo');
      	$date = date('Y-m-d H:i:s');
  		
  
  		// add_new_entryモデルを実行し、POSTデータを投げる
  		$this->bbs_model->add_new_entry($title, $message, $id, $date);
  
  		redirect("top/add_new_entry");
  
  	}
  }
  
    // 記事検索
  function post_search(){
  
    $this->form_validation->set_rules("search", "検索ワード", "required",array('required' =>'%sが入力されていません') );
    
    if( $this->form_validation->run() == FALSE ){
      $this->load->view('search');
    }else{
  	  // POSTされた内容を変数に格納する
      $word = $this->input->post("search");
      $this->load->model('search_model');
      $data['query']=$this->search_model->search($word);
		  $this->load->view("bbs",$data);

    }   
  }
  
  // 編集・削除記事指定
  function post_select(){
    $this->form_validation->set_rules("no","記事番号","required",array('required' =>'%sが入力されていません'));
    
    if( $this->form_validation->run() == FALSE ){
      $this->load->view('edit_delete');
    }else{
      // POSTされた内容を変数に格納する
      $no = $this->input->post("no");
      $this->load->model('edit_model');
      
      // 記事削除
      if($this->input->post('action') == 'delete'){
        if($this->model_users->user_check($no)){
          $data['query']=$this->edit_model->select($no);
          $this->load->view("delete_confirm",$data);
        }else{
          $this->load->view("edit_delete");
        }
      // 記事編集
      }else{
        if($this->model_users->user_check($no)){
          $data['query']=$this->edit_model->select($no);
		      $this->load->view("edit",$data);
        }else{
          $this->load->view("edit_delete");
        }
      }
    }
  }
  
  // 記事編集
  function post_change(){
  
    $this->form_validation->set_rules("title","タイトル","required",array('required' =>'%sが入力されていません'));
    $this->form_validation->set_rules("message","メッセージ","required",array('required' =>'%sが入力されていません'));
    
    if( $this->form_validation->run() == TRUE ){
      // 変更内容取得
      $title = $this->input->post("title");
      $message = $this->input->post("message");
      $no = $this->input->post("no");
      // select関数では変更内容もどる
      $data['query']=$this->edit_model->select($no);
      $post = array(
          'no' => $this->input->post("no"),
          'title' => $this->input->post("title"),
          'message' => $this->input->post("message")
          );
      $this->load->view("edit_confirm",$post);
    }else{
      $this->load->view('edit_delete');
    }
    
  }
 
   
   // 編集変更確定
   function post_edit_confirm(){
    if($this->input->post('action') == 'entry'){
      $no = $this->input->post("no");
      $title = $this->input->post("title");
      $message = $this->input->post("message");
      $this->load->model('edit_model');
      // 変更

      $this->edit_model->change($title,$message,$no);
      $data['query'] = $this->bbs_model->get_all_posts();
		  $this->load->view("bbs",$data);
    }else{
      $this->load->view("edit_delete");
    }
   }
   
   // 削除変更確定
   function post_delete_confirm(){
    if($this->input->post('action') == 'entry'){
      $no = $this->input->post("no");
      $this->edit_model->delete($no);
      $data['query'] = $this->bbs_model->get_all_posts();
		  $this->load->view("bbs",$data);
    }else{
      $this->load->view("edit_delete");
    }
   }
   

  // ログアウト
  public function logout(){
	  $this->session->sess_destroy();		//セッションデータの削除
	  $this->load->view("login");
  }
 
 
 
}
?>