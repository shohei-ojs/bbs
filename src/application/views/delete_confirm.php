<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>掲示板</title>
<style>
#head{
	background: #808080;
	}
h2,#button,p{
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


<br>

<?php
	if($query){
		foreach($query as $post):
			$no = $post->no;
		endforeach;
	}else{
		echo "記事がありません";
	}

?>

<?php echo form_open('top/post_delete_confirm'); ?>
<?php echo validation_errors(); ?>

<?php echo '<input type="hidden" name="no" value="' . $no . '">'; ?>
<input type="hidden" name="mode" value="regist" />
<div id="reg-box">
<table style="margin-left:auto;margin-right:auto">

	<h2 style="text-align:center">確認</h2>
	<tr height="40">
        <td colspan="2">
        	この記事を削除しますか？
        	<br>
        </td>
    </tr>
</table>

<?php
	if($query){
		foreach($query as $post):
			echo "<h2>タイトル：";
			echo $post->title;
			echo "</h2>";
			echo "<p>本文：";
			echo $post->message;
			echo "<br />";
		endforeach;
	}else{
		echo "記事がありません";
	}

?>

<div id="button">  <button type='submit' name='action' value='entry'>確定</button> <button type='submit' name='action' value='back'>戻る</button></div>
</form>

</body>
</html>

