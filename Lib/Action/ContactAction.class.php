<?php
class ContactAction extends Action {

	public function contact (){
		$this->getCompanyIntr ();
		$this->getContactSimple();
		$this->getCompanyIntrSimple();
		$this->show();
	}
	//�������ϵ��ʽ��ʾ
	public function getContactSimple (){
		$form = M("team_contact_simple");
		$text = $form->getField('content');
		//var_dump($text);
		$this->assign("contactSimple", $text);
	}
	//�������˾�����ʾ
	public function getCompanyIntrSimple (){
		$form = M("team_intr_simple");
		$text = $form->getField("content");
		$this->assign("companyIntrSimple", $text);
	}
	//��˾��ϵ��ʾ
	public function getCompanyIntr (){
		$form = M("team_contact");
		$text = $form->getField("content");
		$this->assign("companyContact", $text);
	}
}

