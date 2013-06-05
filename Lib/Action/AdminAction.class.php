<?php
class AdminAction extends Action {

	public function index (){
		$this->show();
	}
	//验证码生成
    public function verify (){
        import("ORG.Util.Image");
        Image::buildImageVerify();
    }
    //验证码确认
    public function verifyConfirm(){
        if($_SESSION['verify'] != md5($_POST['verify'])) {
            $this->error("验证码错误、请重新输入!");
        }
    }
	// 文件上传
    protected function _upload() {
        import("ORG.NET.UploadFile");
        //导入上传类
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize = 3292200;
        //设置上传文件类型
        $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
        //设置附件上传目录
        $upload->savePath = './Common/Uploads/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = false;
        // 设置引用图片类库包路径
        $upload->imageClassPath = 'ORG.Util.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '400,100';
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '400,100';
        //设置上传文件规则
        $upload->saveRule = uniqid;
        //删除原图
        $upload->thumbRemoveOrigin = false;

        if (!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
            import("ORG.Util.Image");
            //给m_缩略图添加水印, Image::water('原文件名','水印图片地址')
            Image::water($uploadList[0]['savepath'] . 'm_' . $uploadList[0]['savename'], '../Public/images/logo2.png');
            $_POST['file'] = $uploadList[0]['savename'];
        }
    }

	public function admin(){

		$this->verifyConfirm();

		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$user = preg_replace('/\W/', '', $user);
		$pass = preg_replace('/\W/', '', $pass);
		$form = M('admin');
		if (!$form->where("name = '$user' && pass = '$pass'")->find())
			$this->error("用户名或密码错误");

		$this->getContactSimple();
		$this->getContact();
		$this->getCompanyIntr();
		$this->getCompanyIntrSimple();
		$this->getProductType();
		$this->getDeviceType();
		$this->getInfoList();

		$this->getInviteList();
		$this->getProductList();
		$this->getDeviceList();
		$this->getUserList();

		$this->assign("user", $user);
		$this->display("Admin:admin");
	}
	//获取用户列表
	public function getUserList (){
		$form = M('admin');
		$list = $form->select();
		$this->assign('userList', $list);
	}
	//删除用户
	public function deleteUser (){
		$id = $_POST['id'];
		$oldPassword = $_POST['oldPassword'];
		$form = M('admin');

		$pass = $form->where("id = '$id'")->getField("pass");
		if ($pass == $oldPassword){
			$form->where("id = '$id'")->delete();
			$this->ajaxReturn(true);
		}
		else
			$this->ajaxReturn(false);
	}
	//更改用户
	public function changeUser (){
		$id = $_POST['id'];
		$oldPassword = $_POST['oldPassword'];
		$data['pass'] = $_POST['newPassword'];
		$data['name'] = $_POST['newName'];



		$form = M("admin");
		$text = $form->where("id = '$id'")->select();

		if ($oldPassword == $text[0]['pass']){
			$form->where("id = '$id'")->save($data);
			$this->ajaxReturn(true);
		} else
			$this->ajaxReturn(false);

	}
	//添加用户
	public function addUser (){
		$text['name'] = $_POST['name'];
		$text['pass'] = $_POST['pass'];

		$form = M('admin');

		if ($form->add($text)){
			$this->ajaxReturn(true);
		}
		$this->ajaxReturn(false);

	}


	//获取日期
	public function getDate(){
		$time = time();
		return date('Y-m-d', $time);
	}

	//添加公司资讯
	public function addInfo() {
		$text['title'] = $_POST['title'];
		$text['content'] = $_POST['text'];
		$text['date'] = $this->getDate();
		$form = M('info');
		$form->add($text);
		$this->ajaxReturn(true);
	}
	//添加供应信息
	public function addOffer() {
		$text['title'] = $_POST['title'];
		$text['content'] = $_POST['text'];
		$text['date'] = $this->getDate();
		$form = M('offer');
		$form->add($text);
		$this->ajaxReturn(true);
	}

	//添加人才招聘
	public function addInvite() {
		$text['title'] = $_POST['title'];
		$text['content'] = $_POST['text'];
		$text['date'] = $this->getDate();
		$form = M('person');
		$form->add($text);
		$this->ajaxReturn(true);
	}
	//设置侧边栏联系方式
	public function setContactSimple (){
		$text['content'] = $_POST['text'];
		$form = M("company_contact_simple");
		if (!$form->count()){
			$text['id'] = '1';
			$form->add($text);
		} else
			$form->where("id = 1")->save($text);
		$this->ajaxReturn(true);
	}
	//侧边栏联系方式显示
	public function getContactSimple (){
		$form = M("team_contact_simple");
		$text = $form->getField('content');
		$this->assign("contactSimple", $text);
	}

	//设置联系方式
	public function setContact (){

		$text['content'] = $_POST['text'];
		$form = M("team_contact");
		if (!$form->count()){
			$text['id'] = '1';
			$form->add($text);
		} else
			$form->where("id = 1")->save($text);
		$this->ajaxReturn(true);

	}
	//联系方式显示
	public function getContact (){
		$form = M("team_contact");
		$text = $form->getField('content');
		$this->assign("contact", $text);
	}


	//侧边栏公司简介
	public function setCompanyIntrSimple (){
		$text['content'] = $_POST['text'];
		$form = M("team_intr_simple");
		if (!$form->count()){
			$text['id'] = '1';
			$form->add($text);
		} else
			$form->where("id = 1")->save($text);
		$this->ajaxReturn(true);
	}
	//侧边栏公司简介显示
	public function getCompanyIntrSimple (){
		$form = M("team_intr_simple");
		$text = $form->getField("content");
		$this->assign("companyIntrSimple", $text);
	}


	//公司简介
	public function setCompanyIntr (){
		$text['content'] = $_POST['text'];

		$form = M("team_intr");
		if (!$form->count()){
			$text['id'] = '1';
			$form->add($text);
		} else
			$form->where("id = 1")->save($text);
		$this->ajaxReturn(true);
	}

	//公司简介显示
	public function getCompanyIntr (){
		$form = M("team_intr");
		$text = $form->getField("content");
		$this->assign("companyIntr", $text);
	}

	//获得产品展示类别
	public function getProductType (){
		$form = M('product_type');
		$list = $form->select();
		$this->assign("productType", $list);
	}

	//添加产品展示类别
	public function addProductType (){
		$text['type'] = $_POST['text'];
		$form = M('product_type');
		$form->add($text);
		$this->ajaxReturn(true);
	}
	//删除产品展示类别
	public function deleteProductType (){
		$id = $_POST['id'];
		$form = M('product_type');
		$form->where("id = '$id'")->delete();
		$this->ajaxReturn(true);
	}

	//修改产品展示类别
	public function changeProductType (){
		$id = $_POST['id'];
		$text['type'] = $_POST['text'];
		$form = M('product_type');
		$form->where("id = '$id'")->save($text);
		$this->ajaxReturn(true);
	}
	//获得产品列表
	public function getProductList (){
		$form = M('product');
		import('ORG.Util.Page');
		$count = $form->count();
		$Page = new Page($count, 5);
		$show = $Page->show();

		$list = $form->order('date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('productList', $list);
		$this->assign('page', $show);
	}
	//删除产品
	public function deleteProduct (){
		$id = $_POST['id'];
		$form = M('product');
		$form->where("id = '$id'")->delete();
		$this->ajaxReturn(true);
	}
	//添加产品
	public function addProduct (){
		if (!empty($_FILES) && $_FILES['file']['name'] != "") {
			//如果有文件上传 上传附件
			$this->_upload();
		} else {
			echo "<script>alert('必须上传图片'); history.go(-1);</script>";
		}
		$form = M("product");
		$text['coverPic'] = $_POST['file'];
		$text['coverText'] = $_POST['title'];
		$text['content'] = $_POST['text4'];
		$text['type'] = $_POST['type'];
		$text['date'] = $this->getDate();
		if ($form->add($text))
			echo "<script>alert('提交成功'); history.go(-1);</script>";
    }
	//修改产品
	public function changeProduct (){
		if (!empty($_FILES) && $_FILES['file']['name'] != "") {
			//如果有文件上传 上传附件
			$this->_upload();
			$form = M("product");
			$id = $_POST['id'];
			$text['coverPic'] = $_POST['file'];
			$text['coverText'] = $_POST['title'];
			$text['content'] = $_POST['textt4'];
			$text['type'] = $_POST['type'];
			$text['date'] = $this->getDate();
			$form->where("id = '$id'")->save($text);
			echo "<script>alert('修改成功'); history.go(-1);</script>";
		} else {
			$form = M("product");
			$id = $_POST['id'];
			$text['coverText'] = $_POST['title'];
			$text['content'] = $_POST['textt4'];
			$text['type'] = $_POST['type'];
			$text['date'] = $this->getDate();
			$form->where("id = '$id'")->save($text);
			echo "<script>alert('修改成功'); history.go(-1);</script>";
		}

    }
	//获得产品详情
	public function getProductDetail (){
		$id = $_POST['id'];
		$myId = $id;
		$form = M('product');
		$text = $form->where("id = '$id'")->select();
		$this->ajaxReturn($text);
	}


	//获得设备展示类别
	public function getDeviceType (){
		$form = M('member_type');
		$list = $form->select();
		$this->assign("deviceType", $list);
	}
	//添加设备展示类别
	public function addDeviceType (){
		$text['type'] = $_POST['text'];
		$form = M('member_type');
		$form->add($text);
		$this->ajaxReturn(true);
	}
	//删除设备展示类别
	public function deleteDeviceType (){
		$id = $_POST['id'];
		$form = M('member_type');
		$form->where("id = '$id'")->delete();
		$this->ajaxReturn(true);
	}
	//修改设备展示类别
	public function changeDeviceType (){
		$id = $_POST['id'];
		$text['type'] = $_POST['text'];
		$form = M('device_type');
		$form->where("id = '$id'")->save($text);
		$this->ajaxReturn(true);
	}

	//获得设备列表
	public function getDeviceList (){
		$form = M('member');
		import('ORG.Util.Page');
		$count = $form->count();
		$Page = new Page($count, 5);
		$show = $Page->show();

		$list = $form->order('date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('deviceList', $list);
		$this->assign('page', $show);
	}
	//删除设备
	public function deleteDevice (){
		$id = $_POST['id'];
		$form = M('member');
		$form->where("id = '$id'")->delete();
		$this->ajaxReturn(true);
	}
	//添加设备
	public function addDevice (){
		if (!empty($_FILES) && $_FILES['file']['name'] != "") {
			//如果有文件上传 上传附件
			$this->_upload();
		} else {
			echo "<script>alert('必须上传图片'); history.go(-1);</script>";
		}
		$form = M("member");
		$text['coverPic'] = $_POST['file'];
		$text['coverText'] = $_POST['title'];
		$text['content'] = $_POST['text5'];
		$text['type'] = $_POST['type'];
		$text['date'] = $this->getDate();
		if ($form->add($text))
			echo "<script>alert('提交成功'); history.go(-1);</script>";
    }
	//修改设备
	public function changeDevice (){
		if (!empty($_FILES) && $_FILES['file']['name'] != "") {
			//如果有文件上传 上传附件
			$this->_upload();
			$form = M("member");
			$id = $_POST['id'];
			$text['coverPic'] = $_POST['file'];
			$text['coverText'] = $_POST['title'];
			$text['content'] = $_POST['textt5'];
			$text['type'] = $_POST['type'];
			$text['date'] = $this->getDate();
			$form->where("id = '$id'")->save($text);
			echo "<script>alert('修改成功'); history.go(-1);</script>";
		} else {
			$form = M("member");
			$id = $_POST['id'];
			$text['coverText'] = $_POST['title'];
			$text['content'] = $_POST['textt5'];
			$text['type'] = $_POST['type'];
			$text['date'] = $this->getDate();
			$form->where("id = '$id'")->save($text);
			echo "<script>alert('修改成功'); history.go(-1);</script>";
		}

    }
	//获得设备详情
	public function getDeviceDetail (){
		$id = $_POST['id'];
		$myId = $id;
		$form = M('member');
		$text = $form->where("id = '$id'")->select();
		$this->ajaxReturn($text);
	}

	//获得资讯列表
	public function getInfoList (){
		$form = M('info');
		import('ORG.Util.Page');
		$count = $form->count();
		$Page = new Page($count, 5);
		$show = $Page->show();

		$list = $form->order('date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('infoList', $list);
		$this->assign('page', $show);
	}
	//获得资讯详情
	public function getInfoDetail (){
		$id = $_POST['id'];
		$myId = $id;
		$form = M('info');
		$text = $form->where("id = '$id'")->select();
		$this->ajaxReturn($text);
	}
	//删除资讯
	public function deleteInfo (){
		$id = $_POST['id'];
		$form = M('info');
		$form->where("id = '$id'")->delete();
		$this->ajaxReturn(true);
	}
	//修改资讯
	public function changeInfo (){
		$text['id'] = $_POST['id'];
		$text['title'] = $_POST['title'];
		$text['content'] = $_POST['text'];
		$form = M('info');
		$form->save($text);
		$this->ajaxReturn(true);
	}


	//获得招聘列表
	public function getInviteList (){
		$form = M('person');
		import('ORG.Util.Page');
		$count = $form->count();
		$Page = new Page($count, 5);
		$show = $Page->show();

		$list = $form->order('date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('inviteList', $list);
		$this->assign('page', $show);
	}
	//获得招聘详情
	public function getInviteDetail (){
		$id = $_POST['id'];
		$myId = $id;
		$form = M('person');
		$text = $form->where("id = '$id'")->select();
		$this->ajaxReturn($text);
	}
	//删除招聘
	public function deleteInvite (){
		$id = $_POST['id'];
		$form = M('person');
		$form->where("id = '$id'")->delete();
		$this->ajaxReturn(true);
	}
	//修改招聘
	public function changeInvite (){
		$text['id'] = $_POST['id'];
		$text['title'] = $_POST['title'];
		$text['content'] = $_POST['text'];
		$form = M('person');
		$form->save($text);
		$this->ajaxReturn(true);
	}
}

