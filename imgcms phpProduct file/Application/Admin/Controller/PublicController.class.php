<?php
/*
 * @thinkphp3.2.2  auth认证
 * @wamp2.1a  php5.3.3  mysql5.5.8
 * @Created on 2015/08/18
 * @Author  夏日不热    757891022@qq.com
 *
 */
namespace Admin\Controller;
use Think\Controller;

//不验证的控制器
class PublicController extends Controller {
   
    //ajxa检查验证码
    public function check_code(){
    	$code = $_GET['code'];	//验证码
    	$verify = new \Think\Verify();
    	if($verify->check($code)){
    		$this->ajaxReturn(1);	//成功
    	}else{
    		$this->ajaxReturn(0);	//失败
    	}
    }
    
    //登录验证
    public function login(){
    	if(!empty($_POST)){
    		$map['account'] = I('username');   //用户名
    		$map['password'] = md5(I('password'));	//密码
    		$m = M('admin');
    		$result = $m->field('id,account,login_count,status')->where($map)->find();
    		if($result){
    			if($result['status'] == 0){
    				$this->error('登录失败，账号被禁用',U('Public/login'));
    			}
    			session('aid',$result['id']);	//管理员ID
    			session('account',$result['account']);	//管理员密码  				
    			//保存登录信息
    			$data['id'] = $result['id'];	//用户ID
    			$data['login_ip'] = get_client_ip();	//最后登录IP
    			$data['login_time'] = time();		//最后登录时间
    			$data['login_count'] = $result['login_count'] + 1;
    			$m->save($data);    				
    			$this->success('验证成功，正在跳转到首页',U('Index/index'));			
    		}else{
    			$this->error('账户或密码错误',U('Public/login'));
    		}
    	}else{
    		if(session('aid')){
    			$this->error('已登录，正在跳转到主页',U('Index/index'));
    		}
    		$this->display();
    	}
    }
    
    //验证码
    public function verify(){   	
    	ob_clean();		//清除缓存
    	$Verify = new \Think\Verify();
    	$Verify->fontSize = 30;	//验证码字体大小
    	$Verify->length = 4;	//验证码位数
    	$Verify->entry();
    }
	
	
	public function chacity(){

		$code=I('post.code');

		$city=M('area')->where(array('parentid'=>$code))->select();

		echo "<option value='0'>请选择城市</option>";

		if($city){

			foreach($city as $c){

				echo "<option value=".$c['id'].">".$c['areaname']."</option>";

			} 

		}

	}

	public function chaarea(){

		$code=I('post.code');

		$area=M('area')->where(array('parentid'=>$code))->select();

		echo "<option value='0'>请选择区</option>";

		if($area){

			foreach($area as $a){

				echo "<option value=".$a['id'].">".$a['areaname']."</option>";

			}

		}

	}
	public function provinceList(){

		$default=I('post.default');

		$area=M('area')->where(array('parentid'=>0))->select();

		echo "<option value='0'>请选择省</option>";
		$def = '';
		if($area){
			foreach($area as $a){
				if($default==$a['id']){
					$def = 'selected = "selected"';
				}
				echo "<option value=".$a['id']." ".$def.">".$a['areaname']."</option>";
				$def = '';
			}
		}
	}

	public function chacitydefault(){

		$parent_id=I('post.parent_id');
		$default_id=I('post.default_id');

		$city=M('area')->where(array('parentid'=>$parent_id))->select();
		$def = '';
		if($city){
			foreach($city as $c){
				if(intval($default_id)>0 && $default_id==$c['id']){
					$def = 'selected = "selected"';
				}
				echo "<option value=".$c['id']." ".$def.">".$c['areaname']."</option>";
				$def = '';
			}
		} 
	}
	
	public function chaareadefault(){

		$parent_id=I('post.parent_id');
		$default_id=I('post.default_id');
		$def = '';
		$area=M('area')->where(array('parentid'=>$parent_id))->select();

		if($area){
			foreach($area as $a){
				if(intval($default_id)>0 && $default_id==$a['id']){
					$def = 'selected = "selected"';
				}
				echo "<option value=".$a['id']." ".$def.">".$a['areaname']."</option>";
				$def = '';
			}
		} 
	}
	public function logout(){
		unset($_SESSION['aid']);
		if(!isset($_SESSION['aid'])){
			$this->success('注销成功');
		}else{
			session('aid',null);
			if(empty($_SESSION['aid'])){
				$this->success('退出成功');
			}
		}
	}

}




