<?php if (!defined('THINK_PATH')) exit();?><h1>后台管理</h1>
<p>欢迎使用</p>
<div class="weui-grids">
	<a href="<?php echo U('Cat/index');?>" class="weui-grid">
		<div class="weui-grid__icon">
            <img src="./Tpl/static/weui/images/icon_tabbar.png" alt="">
        </div>
        <p class="weui-grid__label">分类管理</p>
	</a>
	<a href="<?php echo U('Goods/index');?>" class="weui-grid">
		<div class="weui-grid__icon">
            <img src="./Tpl/static/weui/images/icon_tabbar.png" alt="">
        </div>
        <p class="weui-grid__label">商品管理</p>
	</a>
</div>