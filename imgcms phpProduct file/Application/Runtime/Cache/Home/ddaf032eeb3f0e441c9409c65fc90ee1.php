<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>首页</title>
    <link rel="stylesheet" href="/imgcms/Public/Home/Index/css/style1.css">
  </head>
  <body>
  	<div id="top">
  		<div class="container">
  		<?php echo (session('uid')); if($_SESSION['uid']!= null ): ?><div class="user">您好，<span><?php echo (session('name')); ?></span><img src="/imgcms/Public/Home/Index/images/icon-1.png" alt="">  <a href="louout">退出</a></div>
  			<div class="shop">购物车：<span>(1)</span>| 收藏夹：<span>(0)</span>| 账户余额：<span>(0)</span></div><?php else: ?> <div class="user">我要<a href="/imgcms/index.php/Home/public/login">登录</a><a href="">|注册</a></div><?php endif; ?>
  			<div class="wx"><a href="#">手机客服</a></div>
  			<div class="ss"><a href="#">销售客服</a></div>
  			<div class="sj"><a href="#">4008 222 123</a></div>
  		</div>
  	</div>
	<div id="logo">
		<div class="container">
			<a href="#"><img src="/imgcms/Public/Home/Index/images/logo.png" class="logo" alt=""></a>
			<img src="/imgcms/Public/Home/Index/images/logo-r.png" class="logo-r" alt="">
			<p>精美炫酷的图片网上家园！</p>
		</div>
	</div>
	<div id="nav">
		<div class="container">
			<ul>
				<li><a href="#" class="active">首页</a></li>
				<li><a href="#">购买图片</a></li>
				<li><a href="#">出售图片</a></li>
				<li><a href="#">我的账户</a></li>
			</ul>
		</div>
	</div>
  
	<div class="main">
		<div class="container">
			<div class="login">
				<h1><span>用户登陆</span><div class="r">还没账号? <a href="#">注册</a></div></h1>
				<form action="" method="post">
					<div class="row">
						<label for="username">账户</label>
						<input type="text" name="username" class="text" placeholder="邮箱或者用户名或者手机号">
					</div>
					<div class="row">
						<label for="password">密码</label>
						<input type="password" name="password" class="text" placeholder="请输入密码">
						<a href="#" class="forget_pw">忘记密码?</a>
					</div>
					<div class="row jzw">
						<label>&nbsp;</label>
						<input type="checkbox" checked="checked"> 记住我(下次自动登陆)
					</div>
					<div class="row">
						<label>&nbsp;</label>
						<input type="submit" class="btn" value="登陆">
					</div>
				</form>
			</div>
		</div>
	</div>
	
  <div id="bottom">
		<div class="container">
			<div class="about">
				<div class="tit">关于我们</div>
				<i></i>
				<ul>
					<li><a href="#">版权注册</a></li>
					<li><a href="#">代理协议</a></li>
					<li><a href="#">版权注册公示</a></li>
					<li><a href="#">关于我们</a></li>
					<li><a href="#">联系我们</a></li>
				</ul>
			</div>
			<div class="about">
				<div class="tit">关于我们</div>
				<i></i>
				<ul>
					<li><a href="#">上传图片</a></li>
					<li><a href="#">质量标准</a></li>
					<li><a href="#">出售条款</a></li>
					<li><a href="#">常见问题</a></li>
				</ul>
			</div>
			<div class="about">
				<div class="tit">关于我们</div>
				<i></i>
				<ul>
					<li><a href="#">购图合同</a></li>
					<li><a href="#">常见问题</a></li>
				</ul>
			</div>
			<div class="sys">
				<div class="tit">扫一扫</div>
				<div class="ewm">
					<img src="/imgcms/Public/Home/Index/images/aewm.jpg" alt="">
					<p>安卓客户端</p>
				</div>
				<div class="ewm">
					<img src="/imgcms/Public/Home/Index/images/aewm.jpg" alt="">
					<p>苹果客户端</p>
				</div>
			</div>
			<div class="copyright">
				<p>Copyright © 2004-2015  深圳XXX网络科技有限公司版权所有<br>ICP证沪B2－20070020 沪ICP备07006315号 <img src="/imgcms/Public/Home/Index/images/dd.png" alt=""></p>
			</div>
		</div>
	</div>
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
  </body>
</html>