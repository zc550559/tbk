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
	 * @return [type] [description]
	 */
	public function lists(){
		$this->display();
	}

	/**
	 * 每一关
	 * @return [type] [description]
	 */
	public function detail($id){
		$this->display();
	}
}