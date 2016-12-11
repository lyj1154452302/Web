<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE' => 'mysql',
	'DB_HOST' => '127.0.0.1',
	'DB_NAME' => 'bookstore',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_PORT' => 3306,
	'DB_PREFIX'=>'bookstore_',
	'DB_CHARSET' => 'utf8',
	'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
    'DB_SQL_BUILD_CACHE'    =>  false, // 数据库查询的SQL创建缓存
    'DB_SQL_BUILD_QUEUE'    =>  'file',   // SQL缓存队列的缓存方式 支持 file xcache和apc
    'DB_SQL_BUILD_LENGTH'   =>  20, // SQL缓存的队列长度
    'DB_SQL_LOG'            =>  false, // SQL执行日志记录
    'DB_BIND_PARAM'         =>  false, // 数据库写入数据自动参数绑定
	// 'TMPL_ACTION_SUCCESS'=>'Public:success_jump',
	// 'TMPL_ACTION_ERROR'=>'Public:error_jump',
	'TMPL_PARSE_STRING'     =>array(
        //,自定义路径常量，用于后台样式加载
        '__HOME__'             =>  __ROOT__.'/Application/Home/Common/',
        //,自定义路径常量，用于后台JS样式加载
        '__HOMEJS__'             =>  __ROOT__.'/Application/Home/Common/Js/',
        //,自定义路径常量，用于后台css样式加载
        '__HOMECSS__'             =>  __ROOT__.'/Application/Home/Common/Css/',
        //,自定义路径常量，用于后台image加载
        '__HOMEIMG__'             =>  __ROOT__.'/Application/Home/Common/Images/',

        '__HOMEINDEX__'             =>  __ROOT__.'/Application/Home/View/Index/',

       /* '__ADMINCONFIG__'       =>  __ROOT__.'/Application/Admin/Common/'//定义后台所需引入文件的路径*/
    )
);