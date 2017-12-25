<?php if (!defined('THINK_PATH')) exit();?><h2>分类管理</h2>
<a href="<?php echo U('edit');?>">添加</a>
<table border="1">
	<tr>
		<th>序号</th><th>标题</th><th>排序</th><th>操作</th>
	</tr>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$each): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($each["id"]); ?></td><td><?php echo ($each["title"]); ?></td><td><?php echo ($each["sort"]); ?></td>
			<td>
				<a href="<?php echo U('edit',array('id'=>$each['id']));?>">修改</a>
				<a href="<?php echo U('del',array('id'=>$each['id']));?>" onclick="return confirm('确定删除?')">删除</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>