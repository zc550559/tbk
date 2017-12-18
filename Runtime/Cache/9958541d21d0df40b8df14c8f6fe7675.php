<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="./Tpl/static/js/jquery.js"></script>
<script type="text/javascript">
$.ajax('<?php echo U('Keywords/testData');?>',function(data){
	document.write(data);
});	
</script>