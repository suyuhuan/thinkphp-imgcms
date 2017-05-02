<?php
	namespace Home\Controller;
    use  Think\Controller;
    class PublicController extends Controller{
    	function login(){
    		if($_POST["username"] !="" && !empty($_POST["password"])){
	    		$_POST["username"] = trim(I("post.username")); 
	    		$_POST["password"] = md5(trim($_POST["password"]));
	    		$m  = M('img_user');
	    		
    		}else{
    			$this->display();
    		}
    	}
    }