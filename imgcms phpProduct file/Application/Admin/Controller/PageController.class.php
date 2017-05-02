<?php
	namespace Admin\Controller;
	use Common\Controller\AuthController;
	use Think\Auth;
	class PageController extends AuthController
	{
		public function idnex(){

		} 
		//单页管理
		public function add(){}
		public function list_class(){
			$this->display();
		}
		public function power(){
			$mod =M('img_page');
			if (!empty($_POST['power'])){
				$use['is_use'] =0;
				$mod ->where("is_use=1")->data($use)->save();
				$_POST['is_use'] =1;
				$mod ->create();
				$result = $mod ->add();
				if($result){
					$this->success('修改成功');
				}else{
					$this->error('修改失败');
				}
			}else{
				$where['is_use'] =1;
				$result = $mod->where($where)->find();
				$this->assign('data',$result);
				$this->display();
			}
		}
		// public function 
	}