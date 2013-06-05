<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>网站管理员登陆</title>
<link rel="stylesheet" type="text/css" href="./Common/lib/bootstrap.css" />
<script type="text/javascript" src="./Common/lib/jquery-1.8.0.js"></script>
<link rel="stylesheet" type="text/css" href="./Common/css/Admin/login.css" />
</head>
<body>
<div id="header">

</div>
<div id="content" class="container">
	<form class="form-horizontal" id="form" action="__APP__/Admin/admin" method="post">
		<div class="control-group">
			<div class="alert alert-error" style="width: 300px; margin-left: 120px; display: none;">密码或用户密码错误</div>
		</div>
		<div class="control-group">
			<label for="user" class="control-label">管理员:</label>
			<div class="controls">
				<input type="text" id="user" name="user" placeholder="用户名" />
			</div>
		</div>
		<div class="control-group">
			<label for="pass" class="control-label">密码:</label>
			<div class="controls">
				<input type="password" id="pass" name="pass" placeholder="密码" />
			</div>
		</div>
		<div class="control-group">
			<label for="verify" class="control-label">验证码:</label>
			<div class="controls">
				<input type="text" id="verify" name="verify" placeholder="验证码" class="input-small"/><img src="__APP__/Admin/verify/" />
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button class="btn btn-success" type="submit">登陆</button>
				<button class="btn">取消</button>
			</div>
		</div>
	</form>
</div>
<div id="footer">

</div>

</body>
</html>