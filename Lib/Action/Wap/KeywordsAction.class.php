<?php
/**
 * 长尾关键词挖掘器
 * 采集百度长尾关键词
 * 1.通过关键词搜索
 * 2.过滤长尾关键词
 * 3.每个关键词递归查询
 *
 * todo
 * 数据去重
 * 
 * 4.根据不同分类存储不同类型,如城市/地区
 * 5.查询n个返回
 */
class KeywordsAction extends Action{

	/**
	 * 入口
	 */
	public function Index(){
		echo '<h1>长尾关键词挖掘器</h1>';
		$this->collects();
	}

	public function collects(){
		$this->display('collects');
	}
}