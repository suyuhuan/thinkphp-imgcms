<?php
	namespace Admin\Controller;
	use Common\Controller\AuthController;
	use Think\Auth;
	class GoodsController extends AuthController
	{
		public function index(){
			
		}
		public function Goods_list(){
			$this->display();
		}
		public function Add_pic(){
			if(!empty($_FILES["img_path"]['name'])){
				  $upload = new \Think\Upload();// 实例化上传类    
				  $upload->maxSize   =     3145728 ;// 设置附件上传大小   
				  $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
				  $upload->rootPath  =      './Public/upload/'; // 设置附件上传目录   
				  $upload->saveName =      'time';
				  $upload->autoSub = false;
				  // 上传文件 
				  if(!empty($_POST)){   
					  $info   =   $upload->upload();    
					  if(!$info) {
					  		// 上传错误提示错误信息        
					 		 $this->error($upload->getError());  
					    }else{
					    	$data =I('post.');
					    	$data['img_path'] =$info['img_path']['savename'];				    	
					    	$image = new \Think\Image();
					    	$img = "./Public/upload/".$info['img_path']['savename'];
					        $image->open($img);
					        $data['img_s_img'] = 's_'.$data['img_path'];
					        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
					        $image->thumb(395, 260)->save("./Public/upload/".$data['img_s_img']);					    	
					        $image->thumb(100, 100)->save("./Public/upload/s".$data['img_s_img']);					    	
					    	$data['file_time'] = time();
					    	$m =M("img_phopto");
					    	$m ->create();
					    	// 上传成功
					    	if($m ->add($data)){    
					 		    $this->success('上传成功！'); 
					 		}else{
					 			$this->error();
					 		}
					   }
					}else{
						$this->error('必须填写所有数据');
					}
			}else{
				$mod = M('img_phopto_classify');
				$where['pid'] =0; 
				$result = $mod->where($where)->select();
				$this->assign('data',$result);
				$this->display();
			}
		}
		public function returnajax(){
			$pid = I('post.pid');
			$where['pid'] =$pid ;
			$mod = M('img_phopto_classify');
			$result = $mod ->where($where)->select();
			echo  json_encode($result);
		}
		public function  pic(){
			$m = M('img_phopto');
			$table ="img_user u ,img_phopto p,img_phopto_classify c";
			$where = "u.id=p.uid and p.img_classify=c.id and is_del =0";
			$result = $m->field('p.id,u.username,p.type,p.img_title,p.img_key_words,c.name,p.img_s_img,p.img_path,p.img_price,p.img_content,p.status,p.file_time')->table($table)->where($where)->select();
			$this->assign('data',$result);
			$this->display("pic_list");
		}
		public function edit_pic(){
			if(is_numeric($_GET['id'])){
				$m = M('img_phopto');
				$where['id'] =$_GET['id'];
				$result1 = $m ->where($where)->find();
				if(!$result1){
					die('非法数值');
				}
				$this->assign('data',$result1);
				$mod = M('img_phopto_classify');
				$where1['pid'] =0; 
				$shuju= $mod->where($where1)->select();
				$this->assign('resu',$shuju);
				$this->display("Goods/edit");
			}else{
				// dump($_POST);
				if (!empty($_POST) && $_POST["img_classify"] != "请选择" ){
					$m = M('img_phopto');
					$m->create();
					$res =$m->save();
					if($res){
						$this->success('成功');
						die();
					}else{
						$this->error('失败');
						die();
					}
				}elseif ($_POST["img_classify"] == "请选择") {
					$this->error('请选择图片分类');
					die();
				}
				$this->error('失败');
			}
		}
		public function del_act(){
			if(is_numeric($_GET['id'])){
				$m =M("img_phopto");
				$where['id'] =$_GET['id'];
				$data['is_del'] = 1;
				$res = $m ->where($where)->save($data);
				// echo $m->_sql();exit;
				if($res){
					$this->success('修改成功');
					die();
				}else{
					$this->error('修改失败');
					die();
				}
			}else{
				$m = M('img_phopto');
				$table ="img_user u ,img_phopto p,img_phopto_classify c";
				$where = "u.id=p.uid and p.img_classify=c.id and p.is_del =1";
				$res = $m->field('p.id,u.username,p.type,p.img_title,p.img_key_words,c.name,p.img_s_img,p.img_path,p.img_price,p.img_content,p.status,p.file_time')->table($table)->where($where)->select();
				 // echo $m->_sql();exit;
				if($res){
					$this->assign('data',$res);
					$this->display('Goods/del_list');
				}else{
					die('没有数据在回收站');
				}
			}
		}
		//图片恢复
		public function remove_pic(){
			if(is_numeric($_GET['id'])){
				$m =M("img_phopto");
				$where['id'] =$_GET['id'];
				$data['is_del'] = 0;
				$res = $m ->where($where)->save($data);
				
				if($res){
					$this->success('修改成功');
					die();
				}else{
					$this->error('修改失败');
					die();
				}
			}
		}
	}