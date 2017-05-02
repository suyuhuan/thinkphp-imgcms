<?php
/*
 * @thinkphp3.2.2  auth认证   php5.3以上
 * @Created on 2015/08/18
 * @Author  夏日不热(老屁)   757891022@qq.com
 * @如果需要公共控制器，就不要继承AuthController，直接继承Controller
 */
   namespace Home\Controller;
   use  Think\Controller;
   class IndexController extends Controller
   {
	   	public function Index()
	   	{
	   		$this->display();
	   	}
	   	// public function 
   }