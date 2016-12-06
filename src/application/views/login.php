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


<?php echo form_open('top/login_validation'); ?>
<?php echo validation_errors(); ?>

<table style="margin-left:auto;margin-right:auto">

	<h2 style="text-align:center">登録/ログイン</h2>
	
	<tr height="40">
        <td colspan="2">
        	ID
        	<br>
        	<input type="text" name="id" size="" maxlength="20" pattern="^[0-9A-Za-z]+$" title="IDは半角英数字で入力してください。" >
        </td>
    </tr>
    
    <tr height="60">
    	<td colspan="2">
        	PASSWORD
            <br>
            <input type="password"  name="pass" size="" minlength="4" maxlength="4"  pattern="[0-9]+" title="PASSWORDは0～9の数字で入力してください。" required>
        </td>
	</tr>

	
</table>
	
	<div id="button">  <button type='submit' name='action' value='entry'>登録</button> <button type='submit' name='action' value='login'>ログイン</button></div>

</form>

</body>
</html>
