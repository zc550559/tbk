<?php
class BaseAction extends Action{

	public $localFlag = false;

	//返回json数据
	private $json = array();
	
	public function __construct(){
		parent::__construct();
		$this->json['status'] = 0;
		$this->json['msg'] = "ok";
		$this->json['data'];
	}

	/**
	 * 输出数据信息
	 * @param  [type]
	 * @return [type]
	 */
	public function showData($data = array()){
		if($this->localFlag){
			$this->showLocal(false);
			return $data;
		}else{
			$this->json['data'] = $data;
			$this->showJSON();
		}
	}

	/**
	 * 输出错误信息
	 * @return [type]
	 */
	public function showError($status,$msg){
		$this->json['status'] = $status;
		$this->json['msg'] = $msg;
		$this->showJSON();
	}

	/**
	 * 输出json数据
	 * @param  [type]
	 * @return [type]
	 */
	public function showJSON(){
		header("text/html;charset=utf-8");
		echo json_encode($this->json,JSON_UNESCAPED_UNICODE);
		die;
	}


	public function showLocal($flag=true){
		if($flag){
			$this->localFlag = true;
		}else{
			$this->localFlag = false;
		}
	}

	/**
	 * 打印日志
	 */
	public function log($msg,$level){

	}

}