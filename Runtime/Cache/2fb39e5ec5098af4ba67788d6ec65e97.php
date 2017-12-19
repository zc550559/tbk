<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="./Tpl/static/js/jquery.js"></script>
<script type="text/javascript">
$(function(){
	var keywordList = Array();
	var keywordIndex = 0;
	var thread;

	$('#searchButton').click(function(){searchs()});

	function searchs(){
		thread = setInterval(function(){search()},2000);
	}

	function search(){
		var keyword = $('#keyword').val();
		if(keywordList.length>0){
			keyword = keywordList[keywordIndex++];
		}
		$.getJSON('<?php echo U('Keywords/collect');?>','keyword='+keyword,function(json){
			if(json.status>0){
				log(json.msg);
				clearInterval(thread);
				return;
			}
			$.each(json.data,function(key,value){
				$('#keywordList').append(value+'\n');
			});
			keywordList = keywordList.concat(json.data);
			$.unique(keywordList);
		});
	}
	function log(str){
		$('#log').append(now()+':'+str+'\n');
	}
});
</script>
<input id="keyword" value="美白"> <input id="searchButton" type="button" value="百度搜索"><br /><br />
<textarea id="keywordList" cols="30" rows="20">
</textarea>
<h3>日志:</h3>
<div id="log"></div>