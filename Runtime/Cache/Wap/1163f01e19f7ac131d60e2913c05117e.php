<?php if (!defined('THINK_PATH')) exit();?><h1>:)</h1>
<p>欢迎使用 <b>ThinkPHP</b>！</p>
<div class="weui-panel">
	<div class="weui-panel__hd">配置列表</div>
	<div class="weui-panel__bd">
		<div class="weui-cell">
			<div class="weui-cell__bd">代理设置</div>
			<div class="weui-cell__ft">
	            <input class="weui-switch" type="checkbox" <?php if((C("PROXY_FLAG")) == "1"): ?>checked='checked'<?php endif; ?>>
	        </div>
        </div>
	</div>
</div>

<div class="weui-panel">
	<div class="weui-panel__hd">功能列表</div>
	<div class="weui-panel__bd">
		<div class="weui-media-box weui-media-box_small-appmsg">
			<div class="weui-cells">
				<a class="weui-cell weui-cell_access" href='<?php echo U('Game/Index/index');?>'>
					<div class="weui-cell__bd">游戏</div>
					<span class="weui-cell__ft"></span>
				</a>
				<a class="weui-cell weui-cell_access" href='<?php echo U('Chat/index');?>'>
					<div class="weui-cell__bd">聊天</div>
					<span class="weui-cell__ft"></span>
				</a>
				<a class="weui-cell weui-cell_access" href='<?php echo U('Keywords/collects');?>'>
					<div class="weui-cell__bd">长尾关键词采集</div>
					<span class="weui-cell__ft"></span>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="weui-panel">
	<div class="weui-panel__hd">后台列表</div>
	<div class="weui-panel__bd">
		<div class="weui-media-box weui-media-box_small-appmsg">
			<div class="weui-cells">
				<a class="weui-cell weui-cell_access" href='<?php echo U('Admin/Index/index');?>'>
					<div class="weui-cell__bd">首页</div>
					<span class="weui-cell__ft"></span>
				</a>
			</div>
		</div>
	</div>
</div>