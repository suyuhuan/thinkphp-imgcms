<?php
/*
 * @thinkphp3.2.2  auth认证
 * @wamp2.1a  php5.3.3  mysql5.5.8
 * @Created on 2015/08/18
 * @Author  夏日不热    757891022@qq.com
 *
 */
namespace Admin\Controller;
use Common\Controller\AuthController;
use Think\Auth;

//权限控制类
class IndexController extends AuthController {
	
	//首页
	public function index(){
		$m = M('auth_rule');
		$field = 'id,name,title';
	    $data = $m->field($field)->where('pid=0 AND status=1')->select();	   
	    $auth = new Auth();
	    //没有权限的菜单不显示
    	foreach ($data as $k=>$v){
    		if(!$auth->check($v['name'], session('aid')) && session('aid') != 1){
    			unset($data[$k]);
    		}else{
    			// status = 1    为菜单显示状态
    			$data[$k]['sub'] = $m->field($field)->where('pid='.$v['id'].' AND status=1')->select();
    			foreach ($v['sub'] as $k2 => $v2){
    				if(!$auth->check($v2['name'], session('aid')) && session('aid') != 1){
    					unset($v['sub'][$k2]);
    				}
    			}
    		}
	    }
	    $this->assign('data',$data);	// 顶级
    	$this->display();
	}
	
	//后台首页
    public function main(){
    	//服务器IP
    	$data['server_ip'] = GetHostByName($_SERVER['SERVER_NAME']);	
    	//版本号
    	$data['apache_php'] = apache_get_version();						
    	//最大上传限制
    	$data['max_upload'] = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled";
    	$mod = M('img_user');
        //统计总条数
        $data['count'] = $mod->count('id');
        $where['id'] = session('aid');
        $where['status'] =1;
        $result = $mod->table('admin')->field('login_count,login_time')->where($where)->find(); 
        // $data['login_time'] = $result['login_time'];
        $data['login_count'] = $result['login_count'];
        $data['admin'] = session('account');
        $this->assign('data',$data);
    	$this->display();
    }
    public function menu(){
        $this->display();
    }
     public function top(){
        $this->display();
    }
    //修改密码
    public function edit_pwd(){
    	if(!empty($_POST)){
    		$m = M('admin');
    		$where['id'] = session('aid');
    		$where['password'] = md5(I('old_pwd'));
    		$new_pwd = md5(I('new_pwd'));
    		$data = $m->field('id')->where($where)->find();
    		if(empty($data)){
    			$this->ajaxReturn(0);	//失败，原密码错误
    		}else{
    			$result = $m->where('id='.$where['id'])->data('password='.$new_pwd)->save();
    			if($result){
    				session('aid',null);
    				session('account',null);
    				$this->ajaxReturn(1);	//修改成功
    			}else{
    				$this->ajaxReturn(2);	//更新失败
    			}
    		}
    	}else{
    		$this->display();
    	}   	
    }

    //循环删除目录和文件函数
    function delDirAndFile($dirName){
    	if ( $handle = opendir( "$dirName" ) ) {
    		while ( false !== ( $item = readdir( $handle ) ) ) {
    			if ( $item != "." && $item != ".." ) {
    				if ( is_dir( "$dirName/$item" ) ) {
    					delDirAndFile( "$dirName/$item" );
    				} else {
    					unlink( "$dirName/$item" );
    				}
    			}
    		}
    		closedir( $handle );
    		if( rmdir( $dirName ) ) return true;
    	}
    }
 
    //清除缓存
    public function clear_cache(){
    	$str = I('clear');	//防止搜索到第一个位置为0的情况
    	if($str){
			//strpos 参数必须加引号
    		//删除Runtime/Cache/admin目录下面的编译文件
    		if(strpos("'".$str."'", '1')){   			
    			$dir = APP_PATH.'Runtime/Cache/Admin/';
    			$this->delDirAndFile($dir);
    		}
    		//删除Runtime/Cache/Home目录下面的编译文件
    		if(strpos("'".$str."'", '2')){    			
    			$dir = APP_PATH.'Runtime/Cache/Home/';
    			$this->delDirAndFile($dir);
    		}
    		//删除Runtime/Data/目录下面的编译文件
    		if(strpos("'".$str."'", '3')){
    			$dir = APP_PATH.'Runtime/Data/';
    			$this->delDirAndFile($dir);
    		}
    		//删除Runtime/Temp/目录下面的编译文件
    		if(strpos("'".$str."'", '4')){	
    			$dir = APP_PATH.'Runtime/Temp/';
    			$this->delDirAndFile($dir);
    		}
    		$this->ajaxReturn(1);	//成功
    	}else{
    		$this->display();
    	}
    }

    //退出登录
    public function logout(){
    	session('aid',null);	//注销 uid ，account
    	session('account',null);
    	$this->success('退出登录成功',U('Public/login'));
    }    
}




