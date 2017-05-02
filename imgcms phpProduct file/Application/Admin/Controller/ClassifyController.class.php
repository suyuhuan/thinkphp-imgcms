<?php
	namespace Admin\Controller;
	use Common\Controller\AuthController;
	use Think\Auth;
	class ClassifyController extends AuthController
	{
		public function index(){
			
			$this->display();
		}
		//父级列表
		public function classify(){
			$mod = M('img_phopto_classify');
			$where['pid'] = 0;
			$result = $mod ->where($where)->select();
			// dump($result);
			$this->assign('data',$result);
			$this->display();
		}
		public function class_list(){
			$this->display('Classify/list');
		}
		public function returnajax(){
			$where['pid'] =I('post.pid');
			$mod = M('img_phopto_classify');
			$result = $mod ->where($where)->select();
			echo  json_encode($result);
		}
		//新增分类
		public function add(){
			$mod = M("img_phopto_classify");
			if(!empty($_POST)){
				// dump(I("post."));exit;
				$mod ->create();
				$result = $mod->add();
				if($result){
					$this->success('添加成功');
				}else{
					$this->error('添加失败');
				}
			}else{
				$where['pid'] = 0 ;
				$result = $mod ->where($where)->select();
				$this->assign('data',$result);
				$this->display();
			}
		}
	}