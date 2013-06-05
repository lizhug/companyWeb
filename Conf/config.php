<?php
return array(
	/* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'team',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '19920828',          // 密码
    'DB_PORT'               => '3306',        // 端口
    'DB_PREFIX'             => 'm_',    // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    => false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       => true,        // 启用字段缓存
    'DB_CHARSET'            => 'utf8',      // 数据库编码默认采用utf8
	
	'DEFAULT_GROUP'         => 'Home',  // 默认分组
    'DEFAULT_MODULE'        => 'Home', // 默认模块名称
    'DEFAULT_ACTION'        => 'index', // 默认操作名称

	
    'URL_MODEL'             => 3,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式，提供最好的用户体验和SEO支持
	
    'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息
 
     TMPL_PARSE_STRING => array(    
        '__PUBLIC__' => '/Common'     // 更改默认的__PUBLIC__替换规则    
   
    )
  //  'TOKEN_ON'=>true,  // 是否开启令牌验证
   // 'TOKEN/_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
  //'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
  //  'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true
   // 'TMPL_ACTION_ERROR' => 'Public:error',
    //'TMPL_ACTION_SUCCESS' => 'Public:success'
)
?>
);
?>