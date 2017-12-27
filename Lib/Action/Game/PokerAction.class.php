<?php
/**
 * 翻牌游戏
 * 1.游戏结束(打字机效果)
 * 2.关卡选择
 * 3.每一关
 */
class PokerAction extends BaseAction{

	/**
	 * 游戏介绍
	 * @return [type] [description]
	 */
	public function index(){
		$this->display();
	}

	/**
	 * 关卡列表
	 * 说明:关卡设置:卡牌数量+总步数
	 * @return [type] [description]
	 */
	public function lists(){
		$pass = M('pass')->select();
		$this->assign('pass',$pass);
		$this->display();
	}

	/**
	 * 每一关
	 * @return [type] [description]
	 */
	public function detail($id){
		$ids = M('pass')->where('id='.$id)->getField('letters');
		$condition['id'] = array('in',$ids);
		$data = M('letter')->where($condition)->select();
		$dataJson = json_encode($data);
		$this->assign('dataList',$dataJson);
		$this->display();
	}
}