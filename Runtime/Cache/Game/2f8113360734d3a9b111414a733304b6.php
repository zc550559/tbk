<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
#main{
	margin: 0 auto;
	padding: 2px;
	width: 100%;
	height:90%;
	position: absolute;
	overflow: auto;
}
.poker{
	width: 23%;
	height:150px;
	margin: 0 5px 5px 0;
	float:left;
}
.poker div{
	width: 88px;
	transition: 0.3s;
	position: absolute;
}
.poker img{
	width: 88px;
	height:150px;
	border-radius: 5px;
}
.poker label{
	font-size:50px;
	height: 100px;
	line-height: 120px;
	text-align: center;
	border: solid 1px #666;
	border-radius:5px 5px 0 0;
	display: block;
}
.poker font{
	font-size:30px;
	margin:0;
	top:0;
	right:0;
	position: absolute;
}
.poker span{
	text-align: center;
	font-size: 25px;
	color: #666;
	background-color:#666;
	display: block;
}
.poker span.show{
	color:white;
}
</style>
<script type="text/javascript">
$(function(){

	//定义变量
	var dataList = [
		{'speak':'a','lower':'あ','high':'ア','color':'ff0000'},    
		{'speak':'i','lower':'い','high':'イ','color':'00ff00'}, 
		{'speak':'w','lower':'う','high':'ウ','color':'0000ff'}, 
		{'speak':'e','lower':'え','high':'エ','color':'ffff00'}, 
		{'speak':'o','lower':'お','high':'オ','color':'ff00ff'},
	];
	var pre = null;
	var success = false;
	var steps = 0;

	//数据加工
	var showList = [];
	for (var i = 0; i < dataList.length; i++) {
		var obj = dataList[i];
		obj.id = i;
		showList[i] = obj;
	};
	var showList = showList.concat(showList);
	showList.sort(function(){ return 0.5 - Math.random()});

	//数据填充
	for(var i=0;i<showList.length;i++){
		var obj = showList[i];
		$('#main').append(
			'<div class="poker" data="'+obj.id+'">'+
			'	<div>'+
			'		<img src="./Tpl/static/images/default.jpg">'+
			'	</div>'+
			'	<div style="transform:rotateY(-90deg)">'+
			'		<label style="color:#'+obj.color+'">'+obj.lower+'</label><font  style="color:#'+obj.color+'">'+obj.high+'</font>'+
			'		<span>'+obj.speak+'</span>'+
			'	</div>'+
			'</div>'
		);
	}

	//事件绑定
	$('.poker').each(function(){
		$(this).children().eq(0).click(function(){
			//设置总步数
			$('#steps').html(++steps);
			//重置之前poker
			if(success==false&&pre!=null){
				data = $(this).parent().attr('data');
				preData = $(pre).parent().attr('data');
				if(data!=preData){
					var tmp = pre;
					$(tmp).next().css('transform','rotateY(-90deg)');
					setTimeout(function(){
						$(tmp).css('transform','rotateY(0deg)');
					},300);
				}else{
					$(this).parent().find('span').addClass('show');
					$(pre).parent().find('span').addClass('show');
					success = true;
				}
			}else{
				success = false;
			}

			//翻转当前点击的poker
			$(this).css('transform','rotateY(90deg)');
			pre = this;
			setTimeout(function(){
				$(pre).next().css('transform','rotateY(0deg)');
			},300);
		});
	});
});
</script>
<div id="main">
	<h1>日语翻牌游戏</h1>
	<p>
	<h4>计分板</h4>
	总步数:<label id="steps">0</label>	
	</p>
	<div><a class="weui-btn weui-btn_plain-default" href="javascript:location.href=location.href+Math.random();">重玩</a></div>
	<br />
</div>