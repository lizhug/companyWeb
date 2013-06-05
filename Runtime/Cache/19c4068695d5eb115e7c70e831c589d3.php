<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>中山市益昌模具公司 主页</title>
	<link rel="stylesheet" type="text/css" href="./Common/lib/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/global.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/Public/header.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/Public/footer.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/Content/content.css" />
</head>
<body class="container" id="main">
	<div class="help-block" id="header">
	<div id="nav-top" class="navbar">
		<img src="./Common/images/ecm.png" alt="公司logo" />
	</div>
	<div id="nav" class="navbar">
		<ul class="nav">
			<li><a href="__APP__/Home/index.html">团队首页</a></li>
			<li><a href="__APP__/Intr/intr.html">团队简介</a></li>
			<li><a href="__APP__/Product/product.html">团队展示</a></li>
			<li><a href="__APP__/Device/device.html">团队成员</a></li>
			<li><a href="__APP__/Offer/offer.html">团队信息</a></li>
			<li><a href="__APP__/Invite/invite.html">人才招聘</a></li>
			<li><a href="__APP__/Contact/contact.html">联系方式</a></li>
		</ul>
	</div>
	<object >
        <embed id="topSwf" src="./Common/top.swf" quality="high" type="application/x-shockwave-flash" width="940" height="100" />
	</object>
</div>
	<div class="help-block">
		
		<div id="content">
			<span><img src="./Common/images/icon.jpg" alt="icon" />详细内容 <span>DETAILS</span></span>
			<div id="article">
			<span><?php echo ($page['title']); ?></span>
			<div class="help-block spec"><span>发布日期: <?php echo ($page['date']); ?></span><span>浏览次数: <?php echo ($page['count']); ?></span></div>
			<div style="overflow: hidden;">
			<?php echo ($page['content']); ?>
			</div>
			</div>
			<div id="bottom">
				<a href="javascript:history.go(-1);">【返回上一页】</a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div id="foot" class="help-block">
		<p class="text-center">联系电话: 13587432342   传真: 13560392234</p>
		<p class="text-center">版权所有@xxx团队</p>
		<p class="text-center"><a href="__APP__/Admin/login">后台管理</a></p>
</div>
</body>
</html>