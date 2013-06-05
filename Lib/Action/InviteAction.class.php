<?php
class InviteAction extends Action {

	public function invite (){
		$this->getContactSimple();
		$this->getCompanyIntrSimple();
		$this->getInvite();
		$this->show();
	}
	
	//侧边栏联系方式显示
	public function getContactSimple (){
		$form = M("team_contact_simple");
		$text = $form->getField('content');
		//var_dump($text);
		$this->assign("contactSimple", $text);
	}
	//侧边栏公司简介显示
	public function getCompanyIntrSimple (){
		$form = M("team_intr_simple");
		$text = $form->getField("content");
		$this->assign("companyIntrSimple", $text);
	}
	//获取供应信息
	public function getInvite (){
		$form = M('person');
		import('ORG.Util.Page');
		$count = $form->count();
		$Page = new Page($count, 10);
		$show = $Page->show();
		
		$list = $form->order('date')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list', $list);
		$this->assign('page', $show);
	}
}