<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>网站管理员登陆</title>
<script type="text/javascript">
	var URL = "__URL__";
	var APP = "__APP__";
</script>

<link rel="stylesheet" type="text/css" href="./Common/lib/bootstrap.css" />
<script type="text/javascript" src="./Common/lib/jquery-1.8.0.js"></script>
<script type="text/javascript" src="./Common/lib/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="./Common/css/Admin/admin.css" />
<script type="text/javascript" src="./Common/js/Admin/admin.js"></script>

<script type="text/javascript" src="./Common/ueditor/editor_config.js"></script>
<script type="text/javascript" src="./Common/ueditor/editor_all.js"></script>

</head>
<body>
<div id="header">
	<div class="help-block pull-right">
		<span>欢迎管理员&nbsp;<?php echo ($user); ?>&nbsp;登陆</span>
		<a href="javascript:void(0);" class="btn" id="loginout">退出</a>
	</div>
</div>
<div id="content" class="tabbable tabs-left">
	<ul class="nav nav-tabs nav-stacked" id="siderbar">
		<li class="active"><a href="#t1" data-toggle="tab">团队资讯</a></li>
		<li id="t11"><a href="#t1" data-toggle="tab">添加资讯内容</a></li>
		<li id="t12"><a href="#tt1" data-toggle="tab">修改资讯</a></li>
		<li><a href="#t2" data-toggle="tab">团队基本信息(显示在侧边栏)</a></li>
		<li><a href="#t3" data-toggle="tab">团队简介</a></li>
		<li><a href="#t4" data-toggle="tab">产品展示</a></li>
		<li id="t41"><a href="#t411" data-toggle="tab">管理类别</a></li>
		<li id="t42"><a href="#t4" data-toggle="tab">添加内容</a></li>
		<li id="t43"><a href="#t422" data-toggle="tab">修改内容</a></li>
		<li><a href="#t5" data-toggle="tab">设备展示</a></li>
		<li id="t51"><a href="#t511" data-toggle="tab">管理类别</a></li>
		<li id="t52"><a href="#t5" data-toggle="tab">添加内容</a></li>
		<li id="t53"><a href="#t522" data-toggle="tab">修改内容</a></li>

		<li id="t71"><a href="#t7" data-toggle="tab">添加信息</a></li>
		<li id="t72"><a href="#t711" data-toggle="tab">修改信息</a></li>
		<li><a href="#t8" data-toggle="tab">联系方式(显示在侧边栏)</a></li>
		<li><a href="#t9" data-toggle="tab">联系方式(详细)</a></li>
		<li><a href="#tadmin" data-toggle="tab">用户管理</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="t1">
			<form class="form-horizontal">
				<fieldset>
				<legend class="lead">团队资讯</legend>
				<div class="control-group">
					<label class="control-label">标题</label>
					<div class="controls">
						<input type="text" placeholder="输入资讯的标题" />
					</div>
				</div>
				<textarea type="text" name="text1" id="text1" style="width:100%;"></textarea>
				<a href="javascript:void(0);" class="btn btn-success" id="submit1">提交</a>
				<a href="javascript:void(0);" class="btn">取消</a>
				</fieldset>
			</form>
		</div>
		<!-- 修改资讯 -->
		<div class="tab-pane" id="tt1">
			<span class="lead">修改资讯</span>
			<table class="table table-bordered">
			<?php if(is_array($infoList)): $i = 0; $__LIST__ = $infoList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td>编号</td><td><?php echo ($vo['id']); ?></td><td><?php echo ($vo['title']); ?></td><td><a href="javascript:void(0);" class="btn btn-success change">修改</a></td><td><a href="javascript:void(0);" class="btn btn-danger">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr><td colspan="5"><?php echo ($page); ?></td></tr>
			</table>
			<div class="displayNone">
				<input type="text" placeholder="咨询标题"/>
				<textarea type="text" name="textt1" id="textt1" style="width:100%;"></textarea>
				<a href="javascript:void(0);" class="btn btn-success">提交</a>
				<a href="javascript:void(0);" class="btn">取消</a>
			</div>
		</div>
		<div class="tab-pane" id="t2">
			<span class="lead">团队基本信息(显示在侧边栏)</span>
			<textarea type="text" name="text2" id="text2" style="width:100%;"><?php echo ($companyIntrSimple); ?></textarea>
			<a href="javascript:void(0);" class="btn btn-success" id="submit2">提交</a>
			<a href="javascript:void(0);" class="btn">取消</a>
		</div>
		<div class="tab-pane" id="t3">
			<span class="lead">团队简介</span>
			<textarea type="text" name="text3" id="text3" style="width:100%;"><?php echo ($companyIntr); ?></textarea>
			<a href="javascript:void(0);" class="btn btn-success" id="submit3">提交</a>
			<a href="javascript:void(0);" class="btn">取消</a>
		</div>
		<div class="tab-pane" id="t411">
			<span class="lead">产品类别管理</span>
			<table class="table table-bordered">
				<?php if(is_array($productType)): $i = 0; $__LIST__ = $productType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td>编号</td><td><?php echo ($vo['id']); ?></td><td><input value="<?php echo ($vo['type']); ?>" /></td><td><a href="javascript:void(0);" class="btn btn-success change">确认修改</a></td><td><a href="javascript:void(0);" class="btn btn-danger">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<tr><td colspan="2">添加类别</td><td><input id="productType" /></td><td><a href="javascript:void(0);" class="btn btn-success add">添加</a></td><td><a href="javascript:void(0);" class="btn">取消</a></td></tr>
			</table>

		</div>
		<div class="tab-pane" id="t4">
				<span class="lead">产品展示</span>
				<form method="post" action="__URL__/addProduct/" enctype="multipart/form-data" >
					<div class="control-group">
						<label class="control-label">输入显示在首页的标题</label>
						<div class="controls">
							<input type="text" name="title" placeholder="标题" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">输入显示在首页的图片</label>
						<div class="controls">
							<input type="file" name="file" />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">选择类别</label>
						<div class="controls">
							<select name="type">
								<?php if(is_array($productType)): $i = 0; $__LIST__ = $productType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option><?php echo ($vo['type']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<textarea type="text"  id="text4" style="width:100%;" name="text4"></textarea>
					<a href="javascript:void(0);" class="btn btn-success" id="submit4">提交</a>
					<a href="javascript:void(0);" class="btn">取消</a>
					</form>
		</div>
		<div class="tab-pane" id="t422">
			<table class="table table-bordered">
				<?php if(is_array($productList)): $i = 0; $__LIST__ = $productList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td>编号</td><td><?php echo ($vo['id']); ?></td><td><?php echo ($vo['coverText']); ?></td><td><?php echo ($vo['type']); ?></td><td><img src="./Common/Uploads/<?php echo ($vo['coverPic']); ?>" style="width: 100px; height: 100px;" /></td><td><a href="javascript:void(0);" class="btn btn-success change">修改</a></td><td><a href="javascript:void(0);" class="btn btn-danger">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="help-block" style="text-align: center; margin-top: 20px;"><?php echo ($page); ?></div>
			</table>

			<div style="display: none;">
				<span class="lead">产品展示</span>
				<form method="post" action="__URL__/changeProduct/" enctype="multipart/form-data" >
					<div class="control-group">
						<label class="control-label">输入显示在首页的标题</label>
						<div class="controls">
							<input type="text" name="title" placeholder="标题" />
						</div>
					</div>
					<input type="hidden" name="id" />
					<div class="control-group">
						<label class="control-label">输入显示在首页的图片(已存在, 如需修改则重新提交)</label>
						<div class="controls">
							<input type="file" name="file" /><span></span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">选择类别</label>
						<div class="controls">
							<select name="type">
								<?php if(is_array($productType)): $i = 0; $__LIST__ = $productType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['type']); ?>"><?php echo ($vo['type']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<textarea type="text"  id="textt4" style="width:100%;" name="textt4"></textarea>
					<a href="javascript:void(0);" class="btn btn-success" id="submitt4">提交</a>
					<a href="javascript:void(0);" class="btn">取消</a>
					</form>
			</div>
		</div>

		<div class="tab-pane" id="t511">
			<span class="lead">设备类别管理</span>
			<table class="table table-bordered">
				<?php if(is_array($deviceType)): $i = 0; $__LIST__ = $deviceType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td>编号</td><td><?php echo ($vo['id']); ?></td><td><input value="<?php echo ($vo['type']); ?>" /></td><td><a href="javascript:void(0);" class="btn btn-success change">确认修改</a></td><td><a href="javascript:void(0);" class="btn btn-danger">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<tr><td colspan="2">添加类别</td><td><input id="productType" /></td><td><a href="javascript:void(0);" class="btn btn-success add">添加</a></td><td><a href="javascript:void(0);" class="btn">取消</a></td></tr>
			</table>

		</div>
		<div class="tab-pane" id="t5">
			<span class="lead">设备展示</span>
				<form method="post" action="__URL__/addDevice/" enctype="multipart/form-data" >
					<div class="control-group">
						<label class="control-label">输入显示在首页的标题</label>
						<div class="controls">
							<input type="text" name="title" placeholder="标题" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">输入显示在首页的图片</label>
						<div class="controls">
							<input type="file" name="file" />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">选择类别</label>
						<div class="controls">
							<select name="type">
								<?php if(is_array($deviceType)): $i = 0; $__LIST__ = $deviceType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option><?php echo ($vo['type']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<textarea type="text"  id="text5" style="width:100%;" name="text5"></textarea>
					<a href="javascript:void(0);" class="btn btn-success" id="submit5">提交</a>
					<a href="javascript:void(0);" class="btn">取消</a>
					</form>
		</div>
		<div class="tab-pane" id="t522">
			<table class="table table-bordered">
				<?php if(is_array($deviceList)): $i = 0; $__LIST__ = $deviceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td>编号</td><td><?php echo ($vo['id']); ?></td><td><?php echo ($vo['coverText']); ?></td><td><?php echo ($vo['type']); ?></td><td><img src="./Common/Uploads/<?php echo ($vo['coverPic']); ?>" style="width: 100px; height: 100px;" /></td><td><a href="javascript:void(0);" class="btn btn-success change">修改</a></td><td><a href="javascript:void(0);" class="btn btn-danger">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="help-block" style="text-align: center; margin-top: 20px;"><?php echo ($page); ?></div>
			</table>

			<div style="display: none;">
				<span class="lead">设备展示</span>
				<form method="post" action="__URL__/changeDevice/" enctype="multipart/form-data" >
					<div class="control-group">
						<label class="control-label">输入显示在首页的标题</label>
						<div class="controls">
							<input type="text" name="title" placeholder="标题" />
						</div>
					</div>
					<input type="hidden" name="id" />
					<div class="control-group">
						<label class="control-label">输入显示在首页的图片(已存在, 如需修改则重新提交)</label>
						<div class="controls">
							<input type="file" name="file" /><span></span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">选择类别</label>
						<div class="controls">
							<select name="type">
								<?php if(is_array($deviceType)): $i = 0; $__LIST__ = $deviceType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['type']); ?>"><?php echo ($vo['type']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<textarea type="text"  id="textt5" style="width:100%;" name="textt5"></textarea>
					<a href="javascript:void(0);" class="btn btn-success" id="submitt5">提交</a>
					<a href="javascript:void(0);" class="btn">取消</a>
					</form>
			</div>
		</div>

		<div class="tab-pane" id="t6">
			<form class="form-horizontal">
				<fieldset>
					<legend class="lead">供应信息</legend>
					<div class="control-group">
						<label class="control-label">标题</label>
						<div class="controls">
							<input type="text" placeholder="输入供应信息的标题" />
						</div>
					</div>
					<textarea type="text" name="text6" id="text6" style="width:100%;"/><?php echo ($d); ?></textarea>
					<a href="javascript:void(0);" class="btn btn-success" id="submit6">提交</a>
					<a href="javascript:void(0);" class="btn">取消</a>
				</fieldset>
			</form>
		</div>

		<div class="tab-pane" id="t7">
			<form class="form-horizontal">
				<fieldset>
					<legend class="lead">人才招聘</legend>
					<div class="control-group">
						<label class="control-label">标题</label>
						<div class="controls">
							<input type="text" placeholder="输入人才招聘的标题" />
						</div>
					</div>
					<textarea type="text" name="text7" id="text7" style="width:100%;"/><?php echo (htmlspecialchars_decode($list["text"])); ?></textarea>
					<a href="javascript:void(0);" class="btn btn-success" id="submit7">提交</a>
					<a href="javascript:void(0);" class="btn">取消</a>
				</fieldset>
			</form>
	</div>
	<!-- 修改人才信息 -->
		<div class="tab-pane" id="t711">
			<span class="lead">修改人才信息</span>
			<table class="table table-bordered">
			<?php if(is_array($inviteList)): $i = 0; $__LIST__ = $inviteList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td>编号</td><td><?php echo ($vo['id']); ?></td><td><?php echo ($vo['title']); ?></td><td><a href="javascript:void(0);" class="btn btn-success change">修改</a></td><td><a href="javascript:void(0);" class="btn btn-danger">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr><td colspan="5"><?php echo ($page); ?></td></tr>
			</table>
			<div class="displayNone">
				<input type="text" placeholder="人才标题"/>
				<textarea type="text" name="textt7" id="textt7" style="width:100%;"></textarea>
				<a href="javascript:void(0);" class="btn btn-success">提交</a>
				<a href="javascript:void(0);" class="btn">取消</a>
			</div>
		</div>
		<div class="tab-pane" id="t8">
			<span class="lead">联系方式(显示在侧边栏)</span>
			<textarea type="text" name="text8" id="text8" style="width:100%;"><?php echo ($contactSimple); ?></textarea>
			<a href="javascript:void(0);" class="btn btn-success" id="submit8">提交</a>
			<a href="javascript:void(0);" class="btn">取消</a>
		</div>
		<div class="tab-pane" id="t9">
			<span class="lead">联系方式</span>
			<textarea type="text" name="text9" id="text9" style="width:100%;"><?php echo ($contact); ?></textarea>
			<a href="javascript:void(0);" class="btn btn-success" id="submit9">提交</a>
			<a href="javascript:void(0);" class="btn">取消</a>
		</div>
		<div class="tab-pane" id="tadmin">
			<table class="table table-bordered table-striped">
			<tr><td>编号</td><td>用户名(更改名字的时候请同时在新密码中输入旧密码)</td><td>若要更改或删除请输入旧密码</td><td>新密码</td><td colspan="2">操作</td></tr>
			<?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo['id']); ?></td><td><input value="<?php echo ($vo['name']); ?>" type="text" /></td><td><input type="password" placeholder="旧密码"/></td><td><input type="password" placeholder="新密码"/></td><td><a href="javascript:void(0);" class="btn btn-success">修改</a></td><td><a href="javascript:void(0);" class="btn btn-danger">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr class="add"><td>添加用户</td><td><input type="text" placeholder="用户名"/></td><td><input type="text" placeholder="密码"/></td><td colspan="3"><a href="javascript: void(0);" class="btn btn-primary">添加</a></td></tr>
			</table>
		</div>

	</div>
</div>

<div id="footer">

</div>

</body>
<script type="text/javascript">
	var editor1 = new baidu.editor.ui.Editor();
	var editort1 = new baidu.editor.ui.Editor();
	var editor2 = new baidu.editor.ui.Editor();
	var editor3 = new baidu.editor.ui.Editor();
	var editor4 = new baidu.editor.ui.Editor();
	var editort4 = new baidu.editor.ui.Editor();
	var editor5 = new baidu.editor.ui.Editor();
	var editort5 = new baidu.editor.ui.Editor();
	var editor6 = new baidu.editor.ui.Editor();
	var editort6 = new baidu.editor.ui.Editor();
        var editor7 = new baidu.editor.ui.Editor();
	var editort7 = new baidu.editor.ui.Editor();
	var editor8 = new baidu.editor.ui.Editor();
	var editor9 = new baidu.editor.ui.Editor();

    editor1.render("text1");//这里认的是上面控件的ID
	editort1.render("textt1");//这里认的是上面控件的ID
	editor2.render("text2");//这里认的是上面控件的ID
	editor3.render("text3");//这里认的是上面控件的ID
	editor4.render("text4");//这里认的是上面控件的ID
	editort4.render("textt4");//这里认的是上面控件的ID
	editor5.render("text5");//这里认的是上面控件的ID
	editort5.render("textt5");//这里认的是上面控件的ID

	editor7.render("text7");//这里认的是上面控件的ID
	editort7.render("textt7");//这里认的是上面控件的ID
	editor8.render("text8");//这里认的是上面控件的ID
	editor9.render("text9");//这里认的是上面控件的ID
</script>

</html>