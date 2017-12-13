<?php
/**
 * 长尾关键词挖掘器
 * 采集百度长尾关键词
 * 1.通过关键词搜索
 * 2.过滤长尾关键词
 * 
 * todo
 * 3.每个关键词递归查询
 * 4.根据不同分类存储不同类型,如城市/地区
 * 5.查询n个返回
 */
class KeywordsAction extends BaseAction{

	//api地址
	private $api = 'http://www.baidu.com/s?wd={wd}';
	
	/**
	 * 入口
	 */
	public function Index(){
		echo '<h1>长尾关键词挖掘器</h1>';
		$this->collect("美白");
	}

	/**
	 * 采集关键词
	 * @return [type]
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
		$this->showData($matches[1]);
	}


	/**
	 * 发送http请求
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
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

    public function test(){

    }
}