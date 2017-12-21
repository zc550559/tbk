tbk项目
======

#### 开发日志

时间|标题|备注
---|---|---
2017-12-21|创建|创建sqlite数据库并连接
2017-12-21|开发|后端分组,开发复制清空功能
2017-12-19|开发|开发长尾递归关键词递归挖掘功能
2017-12-17|开发|开发长尾递归关键词挖掘功能
2017-12-13|开发|开发长尾关键词挖掘功能 http://localhost/index.php?m=Keywords&a=Index
2017-12-13|开发|包装返回数据为JSON格式
2017-12-13|开发|创建基类
2017-12-12|创建|建立github版本库
2017-12-12|创建|thinkphp空项目


#### 项目计划

名称|备注
---|---
采集|采集长尾关键词
单品|创建单品页面(微信H5页面,可分享)
推送|微信每天推送5件单品(衣服,裤子,鞋子,小玩具,日记)
发帖|自动post发帖程序
文字|文章正文打字效果,逐个随机输出


#### 参考文档

> ThinkPHP完全开发手册3.1 http://doc.thinkphp.cn/manual/
> sqlite建表
<code>
CREATE TABLE tp_test(
ID INTEGER PRIMARY KEY AUTOINCREMENT,
title NVARCHAR(100)
)
</code>