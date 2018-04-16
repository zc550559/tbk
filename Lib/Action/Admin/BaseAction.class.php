<?php
class BaseAction extends Action{
	public function display($tpl){
		parent::display('../Common/header');
		parent::display($tpl);
		parent::display('../Common/footer');
	}
}