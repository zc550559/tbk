<?php
/**
 * 云发布任务管理
 */
class JobAction extends Action{

	/**
	 * 任务首页
	 * @return [type] [description]
	 */
	public function index($userid){
		Log::write("用户[".$userid."]到达任务首页",Log::NOTICE);
		$this->assign('userid',$userid);
		$this->display();
	}

	/**
	 * 创建任务
	 * @return [type] [description]
	 */
	public function add($userid){
		
	}

	/**
	 * 审核任务
	 */
	public function verify($userid){

	}

	/**
	 * 发布任务
	 * @return [type] [description]
	 */
	public function send(){

	}

	/**
	 * 查询任务
	 * @return [type] [description]
	 */
	public function getAll(){

	}

	/**
	 * 暂停任务
	 * @return [type] [description]
	 */
	public function pause(){

	}

	/**
	 * 停止任务
	 * @return [type] [description]
	 */
	public function stop(){

	}

	/**
	 * 后台监控任务
	 * @return [type] [description]
	 */
	public function monitor(){

	}

}