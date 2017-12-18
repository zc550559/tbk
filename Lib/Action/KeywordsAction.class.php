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
class KeywordsAction extends BaseAction{

	//api地址
	private $api = 'http://www.baidu.com/s?wd={wd}';
	//关键词列表
	private static $keywordList = array();
	//关键词下标
	private static $keywordIndex = 0;
	
	/**
	 * 入口
	 */
	public function Index(){
		echo '<h1>长尾关键词挖掘器</h1>';
		$this->collects();
	}

	/**
	 * 采集关键词
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function collect($keyword){
		//替换关键词
		$url = str_replace("{wd}", $keyword, $this->api);
		//请求接口获取所有关键词
		$html = $this->http_request($url);
		//过滤出关键词
		$reg = '/tt">相关搜索([\s\S]*)"page"/';
		$matches = array();
		preg_match($reg,$html,$matches) or $this->showError(101,"没有搜索到长尾关键词");
		$keywors = $matches[1];
		//dump($keywors);

		//过滤出关键词
		$reg = '/>([^<]*)<\/a/';
		preg_match_all($reg, $keywors, $matches) or $this->showError(102,"没有匹配到长尾关键词");
		return $this->showData($matches[1]);
	}

	public function collects(){
		$this->display('collects');
	}


	/**
	 * 递归采集关键词
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function _collects($keyword){
		set_time_limit(0);
		//1.本地调用
		$this->showLocal();
		//2.采集关键词
		$data = $this->collect($keyword);
		//3.存储到list
		self::$keywordList = array_merge(self::$keywordList, $data);

		ob_flush();
		flush();
		dump(self::$keywordList);

		//4.从list中取下一个关键词
		$keyword = self::$keywordList[self::$keywordIndex++];

		sleep(1);

		//5.递归调用
		if(self::$keywordIndex<count(self::$keywordList)){
			$this->collects($keyword);
		}
	}


	/**
	 * 发送http请求
	 * @param  [type] $url  [description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
    function http_request($url, $data = null)
    {  
        $curl = curl_init();  
        curl_setopt($curl, CURLOPT_URL, $url);  
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);  
        if (! empty($data)) {  
            curl_setopt($curl, CURLOPT_POST, 1);  
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);  
        $output = curl_exec($curl);  
        curl_close($curl);  
        return $output;  
    }

    public function testData(){
    	for($i=0;$i<10;$i++){
    		echo $i;
    		ob_flush();
    		flush();
    		sleep(1);
    	}
    }

    public function test(){
    	$this->display();
    	/*
    	if(self::$keywordIndex++<10){
    		var_dump(self::$keywordIndex);
    		ob_flush();
    		flush();
    		sleep(1);
    		$this->test();
    	}*/
    }
}