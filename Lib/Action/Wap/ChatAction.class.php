<?php
/**
 * 聊天
 */
class ChatAction extends BaseAction{

	/**
	 * 聊天界面
	 * @return [type] [description]
	 */
	public function index(){
		$this->display();
	}

	/**
	 * 保存
	 * @return [type] [description]
	 */
	public function save($text){
		M('chat')->add(array('text'=>$text));
		echo 'success';
	}

	/**
	 * 获取
	 * @return [type] [description]
	 */
	public function get($index){
		set_time_limit(0);
		$i = 0;
		while(true){
			//如果index<当前index,返回数据
			$count = M('chat')->count();
			if($index<$count){
				if($index==0){
					$data = M('chat')->where('id>'.$index)->select();
				}else{
					$data = M('chat')->order('id desc')->limit(10)->select();
				}
				echo json_encode($data);
				exit();
			}

			//超过10秒响应
			if($i++==2*5){
				echo 'success';
				exit();
			}
			usleep(200*1000);
		}
	}

	public function log(){
		dump(json_encode(M('chat')->select()));
	}
}