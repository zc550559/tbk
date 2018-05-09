tbk项目
======

#### 开发日志

时间|标题|备注
---|---|---
2018-05-03|创建|聊天模块
2018-04-27|创建|加入jquery-weui
2018-04-16|开发|分类管理
---|2018|---
2017-12-27|开发|把五十音图录入数据库并展示
2017-12-26|开发|把翻牌游戏改成日语主题
2017-12-26|创建|加入翻牌游戏
2017-12-26|创建|添加weui样式
2017-12-25|创建|商品表
2017-12-25|创建|分类表
2017-12-24|创建|添加商品思路
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
----|---
采集|采集长尾关键词
单品|创建单品页面(微信H5页面,可分享)
推送|微信每天推送5件单品(衣服,裤子,鞋子,小玩具,日记)
发帖|自动post发帖程序
文字|文章正文打字效果,逐个随机输出
微信|二维码支付和公众号支付
微信|获取access_token以及持久化,结合redis
weui|使用jquery-weui

#### 想实现的功能

名称|备注
----|---
代码|编写代码生成器
工具|工具列表
微信|接口开发
图像|一点点输出
视频|缓冲输出
通讯|即时聊天(长轮询)
用户|单点登录

#### 参考文档

> ThinkPHP完全开发手册3.1 http://doc.thinkphp.cn/manual/

> WeUI样式库 https://weui.io/

> jquery-weui组件 http://jqweui.com/components

> sqlite建表
``` sql
CREATE TABLE tp_test(
ID INTEGER PRIMARY KEY AUTOINCREMENT,
title NVARCHAR(100)
)
```

>git命令
``` git
克隆:git clone https://github.com/zc550559/tbk.git
更新:git pull
添加:git add *
提交:git commit -m '注释'
推送:git push origin master
```