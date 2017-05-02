<?php
	namespace Admin\Controller;
	use Common\Controller\AuthController;
	use Think\Auth;
	class RechargeController extends AuthController
	{
		public function  index(){

		} 
		public function top(){

		}
		public function recharge_list(){
			$mod = M('img_log');
			$table ="img_log log,img_user user";
			$where = "log.uid=user.id";
			$field = "user.username, log.id,log.time,log.money,log.status";
			$result = $mod ->field($field)->table($table)->where($where)->select();
			$this->assign('data',$result);
			$this->display("recharge/list");
		}
	}