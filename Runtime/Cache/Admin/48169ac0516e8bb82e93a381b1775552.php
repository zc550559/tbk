<?php if (!defined('THINK_PATH')) exit();?><h1>分类管理</h1>
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
	<tr>
		<td colspan="4"><?php echo ($page); ?></td>
	</tr>
</table>

<div class="weui-panel">
	<div class="weui-panel__bd">
		<div class="weui-media-box weui-media-box_small-appmsg">
			<!-- <div class="weui-cells">
				<a class="weui-cell weui-cell_access" href='<?php echo U('edit',array('id'=>$each['id']));?>'>
					<div class="weui-cell__hd">序-</div>
					<div class="weui-cell__bd">标题</div>
					<span class="weui-cell__ft">排序</span>
				</a>
			</div> -->
			<div class="weui-cells">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$each): $mod = ($i % 2 );++$i;?><a class="weui-cell weui-cell_access" href='<?php echo U('edit',array('id'=>$each['id']));?>'>
					<div class="weui-cell__hd"><?php echo ($each["id"]); ?>-</div>
					<div class="weui-cell__bd"><?php echo ($each["title"]); ?></div>
					<span class="weui-cell__ft"><?php echo ($each["sort"]); ?></span>
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
				<a class="weui-cell" href='javascript:;'>
					<div class="weui-cell__bd"><?php echo ($page); ?></div>
					<span class="weui-cell__ft"></span>
				</a>
			</div>
		</div>
	</div>
</div>