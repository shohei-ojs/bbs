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


<br>


<?php echo form_open('top/post_edit_confirm'); ?>
<?php echo validation_errors(); ?>
<?php echo '<input type="hidden" name="no" value="'.$no.'">'; ?>
<?php echo '<input type="hidden" name="title" value="'.$title.'">'; ?>
<?php echo '<input type="hidden" name="message" value="'.$message.'">'; ?>


<input type="hidden" name="mode" value="regist" />
<div id="reg-box">
<table style="margin-left:auto;margin-right:auto">

	<h2 style="text-align:center">確認</h2>
	<tr height="40">
        <td colspan="2">
        	この内容でよろしいですか？
        	<br>
        </td>
    </tr>
</table>

<?php

	echo "<h2>タイトル：";
	echo $title;
	echo "</h2>";
	echo "<p>本文：";
	echo $message;
	echo "<br />";

?>

<div id="button">  <button type='submit' name='action' value='entry'>確定</button> <button type='submit' name='action' value='back'>戻る</button></div>
</form>

</body>
</html>

