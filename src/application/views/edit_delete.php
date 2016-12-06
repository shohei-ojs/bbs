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

<?php echo form_open('top/post_select'); ?>
<?php echo validation_errors(); ?>

<input type="hidden" name="mode" value="regist" />
<div id="reg-box">
<table style="margin-left:auto;margin-right:auto">

	<h2 style="text-align:center">編集・削除</h2>
	<tr height="40">
        <td colspan="2">
        	記事No.
        	<br>
        	<input type="number" name="no" size="">
        </td>
    </tr>
</table>

<div id="button">  <button type='submit' name='action' value='edit'>編集</button> <button type='submit' name='action' value='delete'>削除</button></div>

</form>

</body>
</html>

