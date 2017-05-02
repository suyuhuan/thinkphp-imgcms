<?php
/*
 * 管控
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
$pageSize = isset($_GET['pagesize'])?$_GET['pagesize']:10; //每页显示的数量
if(!is_numeric($page) || !is_numeric($pageSize)){
	return Response::show('400','数据不合法');
}
$offset = ($page - 1)*$pageSize;
$sql = "select * from user limit ".$offset. " , " .$pageSize;
$action = $_REQUEST['action'];
switch($action){
	// 管控查询未审核订单列表
	case 'checkOrder':
		$sql = "SELECT * FROM vv_order WHERE status='未审核' ORDER BY id ASC LIMIT ".$offset. " , " .$pageSize;    //此出差了一个要审核的订单的状态 where 未审核状态
		$query = @mysql_query($sql,$connect);
		$data = array();
		while($result = mysql_fecth_array($query)){
			$data[] = $result;
		}
		if(empty($data)){
			return Response::show('400','查询订单失败');
		}
		return Response::show('200','查询订单成功',$data);
		break;
	// 管控查询未审核订单详情
	case 'checkOrderDesc':
		$orderId = $_REQUEST['orderId'];    //订单ID
		if(!is_numeric($orderId)){
			return Response::show('400','订单ID不合法');
		}
		$sql = "SELECT * FROM vv_order WHERE id = ".$orderId;
		$query = @mysql_query($sql,$connect);
		$data = array();
		while($result = mysql_fecth_array($query)){
			$data[] = $result;
		}
		if(empty($data)){
			return Response::show('400','查询订单详情失败');
		}
		return Response::show('200','查询订单详情成功',$data);
		break;
	
	/*
	 * 查询管控下面的客户列表在 user.php 下面的selectUser 根据 level 的可选值来查询
	 */
	
	//培训资料列表
	case 'infomation':
		$sql = "SELECT * FROM vv_ziliao LIMIT ".$offset. " , " .$pageSize;
		$query = @mysql_query($sql,$connect);
		$data = array();
		while($result = mysql_fecth_array($query)){
			$data[] = $result;
		}
		if(empty($data)){
			return Response::show('400','查询订单详情失败');
		}
		return Response::show('200','查询订单详情成功',$data);
		break;
	//发起补货
	case 'buhuoAdd':		
		$order_id = $_REQUEST['order_id'];   //订单id
		
	default:
		return Response::show('400','没有该请求方法');
}
