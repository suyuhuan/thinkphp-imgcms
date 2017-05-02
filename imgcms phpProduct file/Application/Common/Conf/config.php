<?php
return array(
	//'配置项'=>'配置值'
	
	/* 数据库设置 */
	'DB_TYPE'           =>  'mysql',     	// 数据库类型
	//'DB_HOST'           =>  '120.24.99.79', 	// 本地
	'DB_HOST'           =>  'localhost', 	// 服务器地址 120.24.99.79
	'DB_NAME'           =>  'imgcms',        // 数据库名
	'DB_USER'           =>  'root',     	// 用户名
	'DB_PWD'            =>  'root',     	// 密码 7bea8eacd0
	'DB_PORT'           =>  '3306',     	// 端口
	'DB_PREFIX'         =>  '',      	// 数据库表前缀
	'DB_DEBUG'  		=>  true, 			// 数据库调试模式 开启后可以记录SQL日志
	'SHOW_PAGE_TRACE'   =>	false,   		// 显示页面Trace信息	
	
	 'TMPL_PARSE_STRING'=>array(
		'SITE_TITLE' => '',
        'SITE_URL'   => 'http://www.xx.com/',
        '__ADCSS__'   => __ROOT__.'/Public/Admin/css/',
        '__ADJS__'   => __ROOT__.'/Public/Admin/js/',
        '__ADJS__'   => __ROOT__.'/Public/Admin/js/',
        '__ADIMG__'   => __ROOT__.'/Public/img/',
    ),
	 'DEFAULT_FILTER'        => 'strip_tags,htmlspecialchars',//对所有的I()里面的数值进行过滤
);