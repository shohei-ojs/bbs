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

<div style="float:right" id="button-panel">
	<a class="button" href="../index.html">トップ</a> |
	<a class="button" href="./light.cgi?mode=find">検索</a> |
	<a class="button" href="./light.cgi?mode=past">編集・削除</a> |
	<a class="button" href="./admin.cgi">ログアウト</a>
</div>
<br>

<form action="./regist.cgi" method="post">
<input type="hidden" name="mode" value="regist" />
<div id="reg-box">
<table style="margin-left:auto;margin-right:auto">

	<h2 style="text-align:center">検索</h2>
	<tr height="40">
        <td colspan="2">
        	検索ワード
        	<br>
        	<input type="text" name="id" size="">
        </td>
    </tr>
</table>

</body>
</html>

