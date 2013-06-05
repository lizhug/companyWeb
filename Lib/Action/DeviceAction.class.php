<?php
class DeviceAction extends Action {

	public function device (){
		if (isset($_GET['type'])){
			$this->getDeviceSpecList();
		} else {
			$this->getDeviceList();
		}
		$this->getDeviceTypeList();
		$this->show();
	}
		//获得设备类别列表
	public function getDeviceTypeList(){
		$form = M("member_type");
		$list = $form->select();
		//var_dump($list);
		$this->assign('deviceTypeList', $list);
	}
	//获得设备列表
	public function getDeviceList(){
		$form = M("member");
		import('ORG.Util.Page');
		$count = $form->count();
		$Page = new Page($count, 4);
		$show = $Page->show();
		
		$list = $form->order('date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('deviceList', $list);
		$this->assign('page', $show);
		//var_dump($list);
	}
	//当选定类别的时候获得设备列表
	public function getDeviceSpecList(){
		$type = $_GET['type'];
		$form = M("device");
		import('ORG.Util.Page');
		$count = $form->count();
		$Page = new Page($count, 4);
		$show = $Page->show();
		
		$list = $form->where("type = '$type'")->order('date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('deviceList', $list);
		$this->assign('page', $show);
	}
}

