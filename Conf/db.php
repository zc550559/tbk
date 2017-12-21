<?php
return array(
  'DB_TYPE' => 'pdo',
  'DB_DSN' => 'sqlite:./db/sqlite.db',
  'DB_NAME' =>  'tbk',
  'DB_PREFIX' => 'tp_', // 数据库表前缀
  'DB_CHARSET' => 'utf8', // 数据库编码默认采用utf8
  'DB_FIELDS_CACHE' => false, // 启用字段缓存
);
?>