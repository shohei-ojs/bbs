<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>掲示板</title>
</head>
<body>
<div id="head">
	<div id="head-in">
	<h1 style="text-align:center">掲示板</h1>
	</div>
</div>
<div id="main">
<div id="main-in">



<?php echo validation_errors(); ?>
<?php echo form_open('blog/form'); ?>

<?php echo form_open('form'); ?>

<table style="margin-left:auto;margin-right:auto">

	<h2 style="text-align:center">登録/ログイン</h2>
	<tr height="40">
        <td colspan="2">
        	ID
        	<br>
        	<input type="text" name="id" size="">
        </td>
    </tr>
    <tr height="60">
    	<td colspan="2">
        	PASSWORD
            <br>
            <input type="text" name="pass" size="">
        </td>
	</tr>

	
</table>
	<div style="margin-left:auto;margin-right:auto;"><input type="submit" value="登録" /> <input type="submit" value="ログイン" /></div>

</form>

</body>
</html>

