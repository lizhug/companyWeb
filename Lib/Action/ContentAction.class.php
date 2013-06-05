<?php
class ContentAction extends Action {

	public function index (){
		$this->show();
	}
	public function info(){
		$id = $_GET['id'];
		$form = M('info');
		$form->where("id = '$id'")->setInc('count', 1);
		$page = $form->where("id = '$id'")->select();
		$page[0]['date'] = substr($page[0]['date'], 0 , 11);
		$this->assign('page', $page[0]);
		$this->show();
	}
	public function offer(){
		$id = $_GET['id'];
		$form = M('offer');
		$form->where("id = '$id'")->setInc('count', 1);
		$page = $form->where("id = '$id'")->select();
		$page[0]['date'] = substr($page[0]['date'], 0 , 11);
		$this->assign('page', $page[0]);
		$this->show();
	}
	public function invite(){
		$id = $_GET['id'];
		$form = M('person');
		$form->where("id = '$id'")->setInc('count', 1);
		$page = $form->where("id = '$id'")->select();
		$page[0]['date'] = substr($page[0]['date'], 0 , 11);
		$this->assign('page', $page[0]);
		$this->show();
	}
	public function device(){
		$id = $_GET['id'];
		$form = M('device');
		$form->where("id = '$id'")->setInc('count', 1);
		$page = $form->where("id = '$id'")->select();
		$page[0]['date'] = substr($page[0]['date'], 0 , 11);
		$this->assign('page', $page[0]);
		$this->show();
	}
	public function product(){
		$id = $_GET['id'];
		$form = M('product');
		$form->where("id = '$id'")->setInc('count', 1);
		$page = $form->where("id = '$id'")->select();
		$page[0]['date'] = substr($page[0]['date'], 0 , 11);
		$this->assign('page', $page[0]);
		$this->show();
	}
}

