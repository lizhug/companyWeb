<?php
	class AdminModel extends Model {
		//数据库表名重定义
		protected $tableName = 'info'; 
	
	  //自动完成
		protected $_auto = array(
			array('date', 'getTime', self::MODEL_INSERT, 'callback')
		);
		//返回时间的函数
		public function getTime (){
			return date("Y-m-d h:i:s");
		}
	}
?>