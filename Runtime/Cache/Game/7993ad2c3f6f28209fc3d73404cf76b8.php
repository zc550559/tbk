<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
*{font-size: 12px}
img{
	width: 95px;
	height:150px;
	border-radius: 5px;
}
a{
	text-decoration: none;
}
#main{
	margin: 0 auto;
	padding: 2px;
	height:100%;
	overflow: scroll;
}
.poker{
	width: 30%;
	height:150px;
	margin: 0 5px 5px 0;
	float:left;
}
.poker div{
	width: 95px;
	transition: 0.3s;
	position: absolute;
}
.poker span{
	width: 95px;
	text-align: center;
	margin-top: -16px;
	color: white;
	background-color:#333;
	position: absolute;
}
.button{
	width: 40px;
	height: 40px;
	text-align: center;
	font-weight: bold;
	line-height: 40px;
	border-radius: 20px;
	color:white;
	background-color:#3398de;
	display: block;
	z-index: 9;
	position: fixed;
	top:70;
	right: 5;
}
</style>
<script type="text/javascript">
$(function(){

	//定义变量
	var dataList = [
		{'name':'拔丝苹果','file':'bspg.jpg'},
		{'name':'四喜丸子','file':'sxwz.jpg'},
		{'name':'家常黄焖鸡','file':'jchmj.jpg'},
		{'name':'葱烧海参','file':'cshs.jpg'},
		{'name':'泡椒凤爪','file':'pjfz.jpg'},
		{'name':'济南把子肉','file':'jnbzr.jpg'},
		{'name':'豆角小炒肉','file':'djxcr.jpg'},
		{'name':'蒜泥拌白肉','file':'snbbr.jpg'},
		{'name':'麻粉肘子','file':'mfzz.jpg'},
	];
	var pre = null;
	var success = false;

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
			'		<img src="./Tpl/static/images/'+obj.file+'">'+
			'		<span>'+obj.name+'</span>'+
			'	</div>'+
			'</div>'
		);
	}

	//事件绑定
	$('.poker').each(function(){
		$(this).children().eq(0).click(function(){

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
<div>
	<a href="javascript:location.href=location.href+Math.random();" class="button">重玩</a>
</div>
<div id="main">
	
</div>