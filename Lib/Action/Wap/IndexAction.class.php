<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends BaseAction {
    /**
     * 引导页面
     * @return [type] [description]
     */
    public function index(){
	    $this->display();
    }

    public function test(){
    	M('test')->add(array('title'=>'aaa'));
    	dump(M('test')->select());
    }
}