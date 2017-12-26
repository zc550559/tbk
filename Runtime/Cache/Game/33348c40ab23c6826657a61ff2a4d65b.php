<?php if (!defined('THINK_PATH')) exit();?><h1>关卡列表</h1>
<p>
	目前关卡:1
</p>
<div class="weui-grids">
	<a href="<?php echo U('Game/Poker/detail/',array('id'=>1));?>" class="weui-grid">
		<div class="weui-grid__icon">
            <img src="./Tpl/static/weui/images/icon_tabbar.png" alt="">
        </div>
        <p class="weui-grid__label">1</p>
	</a>
	<a href="<?php echo U('Game/Poker/detail/',array('id'=>2));?>" class="weui-grid">
		<div class="weui-grid__icon">
            <img src="./Tpl/static/weui/images/icon_tabbar.png" alt="">
        </div>
        <p class="weui-grid__label">2</p>
	</a>
	<a href="<?php echo U('Game/Poker/detail/',array('id'=>3));?>" class="weui-grid">
		<div class="weui-grid__icon">
            <img src="./Tpl/static/weui/images/icon_tabbar.png" alt="">
        </div>
        <p class="weui-grid__label">3</p>
	</a>
</div>