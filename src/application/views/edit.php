<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>掲示板</title>
<style>
#head{
	background: #808080;
	}
h2,#button{
	text-align:center;
	}
body{
	background: #dcdcdc;
	}
</style>
</head>
<body>
<div id="head">
	<div id="head-in">
	<h1 style="text-align:center">掲示板</h1>
	</div>
</div>
<div id="main">
<div id="main-in">

<div style="float:right" id="button-panel">
	<a class="button" href="<?php echo base_url() . "index.php/top/toppage"?>">トップ</a> |
	<a class="button" href="<?php echo base_url() . "index.php/top/search"?>">検索</a> |
	<a class="button" href="<?php echo base_url() . "index.php/top/edit_delete"?>">編集・削除</a> |
	<a class="button" href="<?php echo base_url() . "index.php/top/logout"?>">ログアウト</a>
</div>
<br>

<?php
	if($query){
		foreach($query as $post):
			$no = $post->no;
			$title = $post->title;
			$message = $post->message;


		endforeach;
	}else{
		echo "記事がありません";
	}

?>

<?php echo form_open('top/post_change'); ?>
<?php echo validation_errors(); ?>


<?php echo '<input type="hidden" name="no" value="' . $no . '">'; ?>
<input type="hidden" name="mode" value="regist" />
<div id="reg-box">
<table style="margin-left:auto;margin-right:auto">
	<h2 style="text-align:center">編集</h2>
	<tr height="40">
    	<td width="40" rowspan="6"></td>
        <td colspan="2">
        	タイトル
        	<br>
        	<input type="text" name="title" value=<?php if($title){ echo $title; } ?> size="">
        </td>
    </tr>
    <tr height="60">
    	<td colspan="2">
        	メッセージ
            <br>
            <textarea name="message" rows="3" cols="35"><?php if($message){ echo $message; }?></textarea>
        </td>
	</tr>
</table>

<div id="button">  <button type='submit' name='change'>変更</button></div>

</form>

</body>
</html>

