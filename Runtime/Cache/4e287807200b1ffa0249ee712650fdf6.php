<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>中山市益昌模具公司 主页</title>
	<link rel="stylesheet" type="text/css" href="./Common/lib/bootstrap.css" />
	<script type="text/javascript" src="./Common/lib/jquery-1.8.0.js"></script>
	<link rel="stylesheet" type="text/css" href="./Common/css/global.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/Public/header.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/Public/footer.css" />
	<link rel="stylesheet" type="text/css" href="./Common/css/Product/product.css" />
</head>
<body class="container" id="main">
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
			<div id="list">
				<span><img src="./Common/images/icon3.jpg" alt="icon" />产品列表</span>
				<ul class="unstyled">
					<li><img src="./Common/images/li.jpg" />产品展示</li>
				</ul>
				<ul id="next">
					<?php if(is_array($productTypeList)): $i = 0; $__LIST__ = $productTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img src="./Common/images/arrow.jpg" alt="arrow" /><a href="__URL__/product/type/<?php echo ($vo['type']); ?>"><?php echo ($vo['type']); ?></a><span style="display: none"><?php echo ($vo['id']); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		
		<div id="content" class="span8 pull-left">
			<span><img src="./Common/images/icon.jpg" alt="icon" />产品展示 <span>PRODUCT</span></span>
			<div id="cshow">
				<?php if(is_array($productList)): $i = 0; $__LIST__ = $productList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl><a href="__APP__/Content/product/id/<?php echo ($vo['id']); ?>">
					<dt><img src="./Common/Uploads/<?php echo ($vo['coverPic']); ?>" alt="<?php echo ($vo['coverText']); ?>"/></dt>
					<dd><?php echo ($vo['coverText']); ?></dd></a>
				</dl><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="help-block" style="text-align: center; margin-top: 20px;"><?php echo ($page); ?></div>
			</div>
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
<script type="text/javascript">
$(function(){
	$("#list ul:nth-child(2n)").click(function(){
		var obj = $("#next");
		if (obj.css("display") == "none")
			obj.css("display", "block");
		else 
			obj.css("display", "none");
			
	
	
	});
});
</script>