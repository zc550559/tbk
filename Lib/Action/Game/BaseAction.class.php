<?php
/**
 * 外网基类
 */
class BaseAction extends Action{

	public function display(){
		parent::display('../Common/header');
		parent::display();
		parent::display('../Common/footer');
	}
}