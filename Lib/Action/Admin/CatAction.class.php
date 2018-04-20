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
		//导航
		$this->assign('nav','分类管理');

		//分页
		import('ORG.Util.Page');
		$count = M('goods_cat')->count();
		$page = new Page($count,1);
		$show = $page->show();

		//查询数据
		$list = M('goods_cat')->limit($page->firstRow.','.$page->listRows)->order('sort desc')->select();

		//视图渲染
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('Common/index');
	}

	/**
	 * 编辑
	 */
	public function edit($id=0){
		if($id){
			$each = M('goods_cat')->where('id='.$id)->find();
			$this->assign('each',$each);
		}else{

		}
		$this->assign('id',$id);
		$this->display('Common/edit');
	}

	/**
	 * 保存
	 */
	public function save(){
		$id = $_POST['id'];
		if($id){
			M('goods_cat')->where('id='.$id)->save($_POST);
		}else{
			M('goods_cat')->add($_POST);
		}
		$this->success('保存成功',U('index'));
	}

	/**
	 * 删除
	 */
	public function del($id){
		M('goods_cat')->where('id='.$id)->delete();
		$this->success('删除成功',U('index'));
	}
}