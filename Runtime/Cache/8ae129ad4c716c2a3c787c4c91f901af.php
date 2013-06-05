<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>中山市益昌模具公司 主页</title>
	<link rel="stylesheet" type="text/css" href="./Common/lib/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/global.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/Public/header.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/Public/footer.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/Intr/intr.css" />
</head>
<body class="container">
	<div class="help-block" id="header">
	<div id="nav-top" class="navbar">
		<img src="./Common/images/ecm.png" alt="公司logo" />
	</div>
	<div id="nav" class="navbar">
		<ul class="nav">
			<li><a href="__APP__/Home/index.html">公司首页</a></li>
			<li><a href="__APP__/Intr/intr.html">公司简介</a></li>
			<li><a href="__APP__/Product/product.html">产品展示</a></li>
			<li><a href="__APP__/Device/device.html">设备展示</a></li>
			<li><a href="__APP__/Offer/offer.html">供应信息</a></li>
			<li><a href="__APP__/Invite/invite.html">人才招聘</a></li>
			<li><a href="__APP__/Contact/contact.html">联系方式</a></li>
		</ul>
	</div>
	<object >
        <embed id="topSwf" src="./Common/top.swf" quality="high" type="application/x-shockwave-flash" width="940" height="100" />
	</object>
</div>
	<div class="help-block">
		<div id="siderbar" class="span3 pull-left">
			<div id="info">
				<span><img src="./Common/images/icon3.jpg" alt="icon" />公司基本信息</span>
				<div>
					<?php echo ($companyIntrSimple); ?>
				</div>
			</div>
			<div id="contact">
				<span><img src="./Common/images/icon3.jpg" alt="icon" />联系方式</span>
				<div>
					<?php echo ($contactSimple); ?>
				</div>
			</div>
		</div>
		
		<div id="content" class="span8 pull-left">
			<span><img src="./Common/images/icon.jpg" alt="icon" />公司简介  <span>COMPANY  INTRODUCE</span></span>
			<p>
			<?php echo ($companyIntr); ?>
			</p>
		</div>
	</div>
	<div class="clear"></div>
	<div id="foot" class="help-block">
		<p class="text-center">联系电话: 13587432342   传真: 13560392234</p>
		<p class="text-center">版权所有@中山市益昌模具公司</p>
		<p class="text-center"><a href="__APP__/Admin/login">后台管理</a></p>
</div>
</body>
</html>