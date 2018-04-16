<?php if (!defined('THINK_PATH')) exit();?><h2>分类管理</h2>
<a href="<?php echo U('index');?>">列表</a>
<form action="<?php echo U('save');?>" method="post">
<input name="id" type="text" value="<?php echo ($id); ?>" />
<table border="0">
	<tr>
		<th>名称:</th><td><input name="title" value="<?php echo ($each["title"]); ?>" /></td>
	</tr>
	<tr>
		<th>排序:</th><td><input name="sort" value="<?php echo ($each["sort"]); ?>" /></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="保存" /></td>
	</tr>
</table>
</form>