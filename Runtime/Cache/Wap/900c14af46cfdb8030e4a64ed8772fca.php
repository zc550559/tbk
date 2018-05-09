<?php if (!defined('THINK_PATH')) exit();?><h1>Chat</h1>
<p>Welcome!!!</p>
<style type="text/css">
#content{
	width:90%;
	height:400px;
	border:solid 1px gray;
	background-color:white;
	overflow-y:scroll;
}
#text{
	width:75%;
}
</style>
<div id="content">
	
</div>
<div>
	<input id="text" />
	<input id="send" type="button" value="发送" />
</div>
<script type="text/javascript">
$(function(){
	var text = $('#text');
	var content = $('#content');
	var index=0;
	get();
	$('#send').click(function(){
		save();
	});
	function save(){
		var txt = text.val();
		saveLocal(txt);
		saveRemote(txt);
		text.val('');
		index++;
	}
	function saveLocal(time,txt){
		content.append('['+time+']:');
		content.append(txt+'<br />');
		content.scrollTop(content[0].scrollHeight);
	}
	function saveRemote(txt){
		$.post('<?php echo U("Chat/save");?>',{'text':txt});
	}
	function get(){
		$.ajax({
			url:'<?php echo U("Chat/get");?>',
			data:{'index':index},
			timeout:3*1000,
			dataType:'json',
			success:function(data){
				if(data){
					$.each(data,function(key,val){
						saveLocal(val.ctime,val.text);
						index = val.id;
					});
				}
				get();
			},
			error:function(){
				get();
			}
		});
	}
});
</script>