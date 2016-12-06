<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>掲示板</title>
<style>
#head{
	background: #808080;
	}
#button{
	position:absolute;
	left:240px;
	top:95px;
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

<?php echo form_open('top/add_new_entry'); ?>
<?php echo validation_errors(); ?>

<input type="hidden" name="mode" value="regist" />
<div id="reg-box">
<table>
	<tr height="40">
    	<td width="40" rowspan="6"></td>
        <td colspan="2">
        	タイトル
        	<br>
        	<input type="text" name="title" size="">
        </td>
    </tr>
    <tr height="60">
    	<td colspan="2">
        	メッセージ
            <br>
            <textarea name="message" rows="3" cols="35"></textarea>
        </td>
	</tr>
</table>

<div id="button">  <button type='submit' name='posting'>投稿</button></div>

<?php
	if($query){
		foreach($query as $post):
			echo "<HR>";
			echo "<h2>";
			echo $post->title;
			echo "</h2>";
			echo "<p>";
			echo $post->message;
			echo "<br />";
			echo "ID:";
			echo $post->id;	
			echo " Date:";
			echo $post->date;		
			echo " No:";
			echo $post->no;
			echo "</p>";
			echo "</HR>";

		endforeach;
	}else{
		echo "記事がありません";
	}

?>

</form>
</body>
</html>

