<?php
class ContactAction extends Action {

	public function contact (){
		$this->getCompanyIntr ();
		$this->getContactSimple();
		$this->getCompanyIntrSimple();
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
	//公司联系显示
	public function getCompanyIntr (){
		$form = M("team_contact");
		$text = $form->getField("content");
		$this->assign("companyContact", $text);
	}
}

