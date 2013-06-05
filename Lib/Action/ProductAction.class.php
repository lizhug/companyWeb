<?php
class ProductAction extends Action {

	public function product (){
		if (isset($_GET['type'])){
			$this->getProductSpecList();
		} else {
			$this->getProductList();
		}
	
		$this->getProductTypeList();
		$this->show();
	}
	
	//获得产品类别列表
	public function getProductTypeList(){
		$form = M("product_type");
		$list = $form->select();
		//var_dump($list);
		$this->assign('productTypeList', $list);
	}
	//获得产品列表
	public function getProductList(){
		$form = M("product");
		import('ORG.Util.Page');
		$count = $form->count();
		$Page = new Page($count, 4);
		$show = $Page->show();
		
		$list = $form->order('date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('productList', $list);
		$this->assign('page', $show);
		//var_dump($list);
	}
	//当选定类别的时候获得产品列表
	public function getProductSpecList(){
		$type = $_GET['type'];
		$form = M("product");
		import('ORG.Util.Page');
		$count = $form->count();
		$Page = new Page($count, 4);
		$show = $Page->show();
		
		$list = $form->where("type = '$type'")->order('date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('productList', $list);
		$this->assign('page', $show);
	}
}

