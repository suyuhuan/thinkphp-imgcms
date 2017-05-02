<?php
	namespace Admin\Controller;
	use Common\Controller\AuthController;
	use Think\Auth;
	class UserController extends AuthController{
		public function index(){
			$this->display();
		}
		public function adduser(){
			if(!empty($_POST)){
				if($_POST['username']!="" && $_POST['password']!=""){
					for($i=0;$i<10;$i++){
						 $user = $_POST['username'];
						 $user =$user.rand(1,5);
						 $_POST['username'] =$user;
						 $pass = trim($_POST['password']);
						$_POST['password'] = md5($pass);
						M('img_user')->create();
						M('img_user')->add();
						$this->success('插入成功');
					}
					
					// $pass = trim($_POST['password']);
					// $_POST['password'] = md5($pass);
					// M('img_user')->create();
					// M('img_user')->add();
					// $this->success('插入成功');
				}else{
					$this->display();
				}
			}else{
				$this->display();
			}
		}
		// 会员列表
		public function user_list(){
			// $where['user.state'] ='0';
			// dump($where);
			// exit;
			$where = 'user.state=0 and user.id = money.uid';
			$table =array('img_user'=>'user','img_user_money'=>'money');
			$mod =M('img_user');
			$count = $mod ->table($table)->where($where)->count();
			$page  = new \Think\Page($count,5);
			$show  = $page->show();
			//获取分页数
			$p =isset($_GET['p'])?$_GET['p']:1;
			$result = $mod ->table($table)->order("user.id")->page($p.',5')->where($where)->select();
			// echo $mod->_sql();
			// dump($result);
			$this->assign('data',$result);
			$this->assign('page',$show);
			$this->display();
		}

		//会员回收站页面
		public function del(){
			$mod = M('img_user');
			$data['id'] =I('get.id');
			$data['state'] =1;
			$mod ->create();
			$result = $mod ->save($data);
			if($result){
				$this->success('回收成功');
			}else{
				$this->error('回收失败');
			}
		}

		//会员回收站列表
		public function del_list(){
			$where['state'] =1;
			$mod =M('img_user');
			$count = $mod ->where($where)->count();
			$page  = new \Think\Page($count,5);
			$show  = $page->show();
			//获取分页数
			$p =isset($_GET['p'])?$_GET['p']:1;
			$result = $mod ->order("id")->page($p.',5')->where($where)->select();
			$this->assign('data',$result);
			$this->assign('page',$show);
			$this->display();
		}
		//恢复会员
		public function up2(){
			$mod = M('img_user');
			$data['id'] =I('get.id');
			$data['state'] =0;
			$mod ->create();
			$result = $mod ->save($data);
			if($result){
				$this->success('恢复成功');
			}else{
				$this->error('恢复失败');
			}
		}
		//会员认证
		public function get_state(){
			$mod = M('img_user');
			$data['id'] =I('get.id');
			$data['status'] =1;
			$mod ->create();
			$result = $mod ->save($data);
			if($result){
				$this->success('认证成功');
			}else{
				$this->error('认证失败');
			}
		} 
		//修改会员信息
		public function  edit(){
			if($_GET['id']!=""){
				$where =I('get.id');
				$where = "user.state=0 and user.id = money.uid and user.id=".$where;
				$mod = M('img_user');
				$table =array('img_user'=>'user','img_user_money'=>'money');
				$result = $mod->table($table)->where($where)->find();
				$this->assign('data',$result);
				$this->display();
			}elseif($_POST['id']!=""){
				$mod = M('img_user');
				$modle = M('img_user_money'); 
				$mod ->create();
				$resultt = $mod->save();
				if($resultt){
					$modle->create();
					$_POST['uid'] = I('post.id');
					$id= I('post.id');
					unset($id);
					$result =$modle->save();
				}else{
					$this->error('修改失败了',U('user/user_list'));
				}
				if($result){
					$this->success('修改成功',U('user/user_list'));
				}else{
					$this->error('修改失败',U('user/user_list'));
				}
			}else{
				echo 'edit404';
			}
		}
		public function reseach(){
			$mod = M("img_user");
			$type =I('post.types');
			$qu =trim(I('post.qu'));
			$table =array('img_user'=>'user','img_user_money'=>'money');
			$where = "user.state=0 and user.id = money.uid";
			if($qu==null){
				$this->error('请输入数据');
				die();
			}
			switch($type){
				case 0:
					$where = $where." and user.username like '%{$qu}%' ";
					$result = $mod ->table($table)->where($where)->select();
					if($result){
						$this->assign('data',$result);
						$this->display();
					}else{
						$this->error('名字里面含有该字的用户不存在');
					}
				break;
				case 1:
					echo '注册时间';
					// $where = $where." and login_time="
				break;
				case 2:
					echo '登录ip';
				break;
				case 3:
					echo '手机号';
				break;
				case 4:
					$where = $where." and user.id='{$qu}' ";
					$result = $mod ->table($table)->where($where)->select();
					if($result){
						$this->assign('data',$result);
						$this->display();
					}else{
						$this->error('该用户不存在');
					}
				break;
			}
		}
	}