<?php
/*
 * userLogin用户登陆     
 */
require_once('./Config/Config.php');
try{
	$connect = Db::getInstance()->dbConnect();
}catch (Exception $e){
	return Response::show('400','数据库链接失败');
}
/*
 * 分页代码 需要传递两个参数    $page 当前页数    $pagesize 每页显示的最大条数
 */
$page = isset($_GET['page'])?$_GET['page']:1;  //当前页码
$pageSize = isset($_GET['pagesize'])?$_GET['pagesize']:6; //每页显示的数量
if(!is_numeric($page) || !is_numeric($pageSize)){
	return Response::show('401','数据不合法');
}
$offset = ($page - 1)*$pageSize;
$action = $_REQUEST['action'];
switch($action){
	// 用户登陆
	case 'userLogin':
		$username = trim($_REQUEST['username']);
		$password = trim($_REQUEST['password']);
		if (empty($username) || empty($password)) {
			return Response::show('400','用户名或密码不能为空');
		}
		$sql = "SELECT * FROM vv_adminuser WHERE username = '$username' AND password = '$password'";
		$query = @mysql_query($sql,$connect);
		$data = array();
		while($result = mysql_fetch_assoc($query)){
			$data[] = $result;
		}
		if(empty($data)){
			return Response::show('400','登陆失败');
		}
		return Response::show('200','登陆成功',$data);
		break;
	// 管控查询所有人员列表 根据   level 可选值        2客户       3AE   4 管控       6 安装供应商
	case 'selectUser':
		$level = trim($_REQUEST['level']);	
		if(!is_numeric($level)){
			return Response::show('400','level必须为数字');
		}
		$sql = "SELECT * FROM vv_adminuser WHERE level=".$level." LIMIT ".$offset. " , " .$pageSize;
		$query = @mysql_query($sql,$connect);
		$data = array();
		while($result = mysql_fetch_assoc($query)){
			$data[] = $result;
		}
		if(empty($data)){
			return Response::show('400','查询订单详情失败');
		}
		return Response::show('200','查询订单详情成功',$data);
		break;
		
	default:
		return Response::show('400','没有该请求方法');
}
