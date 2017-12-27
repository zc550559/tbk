<?php if (!defined('THINK_PATH')) exit();?><h1>关卡列表</h1>
<p>
	目前关卡:1
</p>
<div class="weui-grids">
	<?php if(is_array($pass)): $i = 0; $__LIST__ = $pass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$each): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Game/Poker/detail/',array('id'=>$each['id']));?>" class="weui-grid">
		<div class="weui-grid__icon">
            <img src="./Tpl/static/weui/images/icon_tabbar.png" alt="">
        </div>
        <p class="weui-grid__label"><?php echo ($each["id"]); ?></p>
	</a><?php endforeach; endif; else: echo "" ;endif; ?>
</div>