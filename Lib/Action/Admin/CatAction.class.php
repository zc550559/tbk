<?php
/**
 * 分类管理
 */
class CatAction extends BaseAction{
	
	/**
	 * 列表
	 * @return [type] [description]
	 */
	public function index(){
		$this->assign('nav','分类管理');

		$list = M('cat')->select();
		$this->assign('list',$list);
		$this->display('Common/index');
	}

	/**
	 * 编辑
	 */
	public function edit($id=0){
		if($id==0){

		}else{
			$each = M('cat')->where('id='.$id)->find();
			$this->assign('each',$each);
		}
		$this->display('Common/edit');
	}
}