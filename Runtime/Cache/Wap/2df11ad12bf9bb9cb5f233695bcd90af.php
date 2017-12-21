<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="./Tpl/static/js/jquery.js"></script>
<script type="text/javascript" src="./Tpl/static/js/jquery.zclip.js"></script>
<script type="text/javascript">
$(function(){
	//关键词列表
	var keywordList = Array();
	//当前关键词下标
	var keywordIndex = 0;
	//定时器索引
	var thread;

	$('#searchButton').click(function(){
		if($(this).data('flag')=='pause'){
			clearInterval(thread);
			$(this).val('继续采集');
			$(this).data('flag','continue');
		}else{
			searchs();
			$(this).val('暂停采集');
			$(this).data('flag','pause');
		}
	});

	$('#copyKeywords').zclip({  
        path:'./Tpl/static/js/ZeroClipboard.swf',
        copy:function(){
            return $('#keywordList').val();  
        },
        afterCopy:function(){
            log("复制成功");
        }  
    });
	$('#clearKeywords').click(function(){
		keywordList = Array();
		keywordIndex = 0;
		$('#keywordList').html('');
	});
	$('#clearLogs').click(function(){
		$('#log').html('');
	});

	

	/**
	 * 定时采集关键词
	 * @return {[type]} [description]
	 */
	function searchs(){
		thread = setInterval(function(){search()},2000);
	}

	/**
	 * 采集关键词
	 * @return {[type]} [description]
	 */
	function search(){
		var keyword = $('#keyword').val();
		if(keywordList.length>0){
			keyword = keywordList[keywordIndex++];
		}
		log('当前采集关键词['+keywordIndex+']:'+keyword);
		$.getJSON('<?php echo U('Api/Keywords/collect');?>','keyword='+keyword,function(json){
			if(json.status>0){
				log(json.msg);
				clearInterval(thread);
				return;
			}
			var diff = arrayDiff(keywordList,json.data);
			keywordList = keywordList.concat(diff);
			$.each(diff,function(key,value){
				$('#keywordList').append(value+'\n');
			});
		});
	}

	/**
	 * 获取两个数组的差集
	 * @param  {[type]} a [description]
	 * @param  {[type]} b [description]
	 * @return {[type]}   [description]
	 */
	function arrayDiff(aArr,bArr){
		if(aArr.length==0){return bArr}
	　　var diff=[];
	　　var str=aArr.join("&quot;&quot;");
	　　for(var e in bArr){
	　　if(str.indexOf(bArr[e])==-1){
	　　　　diff.push(bArr[e]);
	　　　　}
	　　}
	　　return diff;
	}

	/**
	 * 获取当前格式化时间
	 * @return {[type]} [description]
	 */
	function getFormatDate(){    
	    var nowDate = new Date();     
	    var year = nowDate.getFullYear();    
	    var month = nowDate.getMonth() + 1 < 10 ? "0" + (nowDate.getMonth() + 1) : nowDate.getMonth() + 1;    
	    var date = nowDate.getDate() < 10 ? "0" + nowDate.getDate() : nowDate.getDate();    
	    var hour = nowDate.getHours()< 10 ? "0" + nowDate.getHours() : nowDate.getHours();    
	    var minute = nowDate.getMinutes()< 10 ? "0" + nowDate.getMinutes() : nowDate.getMinutes();    
	    var second = nowDate.getSeconds()< 10 ? "0" + nowDate.getSeconds() : nowDate.getSeconds();    
	    return year + "-" + month + "-" + date+" "+hour+":"+minute+":"+second;    
	}
	/**
	 * 打印日志
	 * @param  {[type]} str [description]
	 * @return {[type]}     [description]
	 */
	function log(str){
		$('#log').prepend('<li>'+getFormatDate()+':'+str+'</li>');
	}
});
</script>
<div><input id="keyword" value="美白"> <input id="searchButton" type="button" value="开始采集" /> </div>
<h3>关键词列表:</h3>
<div><input id="copyKeywords" type="button" value="复制(vip)" /> <input id="clearKeywords" type="button" value="清空" /></div>
<div><textarea id="keywordList" cols="30" rows="20">
</textarea></div>
<h3>日志:</h3>
<div><input id="clearLogs" type="button" value="清空" /></div>
<div id="log"></div>