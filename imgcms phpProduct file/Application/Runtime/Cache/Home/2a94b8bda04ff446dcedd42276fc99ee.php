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
  
	<div id="banner">
			<img src="/imgcms/Public/Home/Index/images/ad-1.jpg" class="ad-1" alt="">	
			<div class="container">
				<div class="search">
					<form action="">
						<label>美女</label>
						<input type="text" class="text" name="keyword">
						<div class="select">
							<select name="leibie" id="leibie">
								<option value="0">所有图片</option>
								<option value="1">美女</option>
							</select>
						</div>
						<input type="submit" class="btn">
					</form>
				</div>
			</div>
	</div>
	<div id="title-1">
		<div class="color1"></div>
		<div class="color2"></div>
		<div class="container">
			<span>中国风景</span>
			<a href="#" class="more"></a>
		</div>
	</div>
	<div id="index-pics">
		<div class="container">
			<ul>
				<li><a href="#"><img src="/imgcms/Public/Home/Index/images/pic-1.jpg" alt=""></a></li>
				<li><a href="#"><img src="/imgcms/Public/Home/Index/images/pic-2.jpg" alt=""></a></li>
				<li><a href="#"><img src="/imgcms/Public/Home/Index/images/pic-3.jpg" alt=""></a></li>
				<li><a href="#"><img src="/imgcms/Public/Home/Index/images/pic-1.jpg" alt=""></a></li>
				<li><a href="#"><img src="/imgcms/Public/Home/Index/images/pic-2.jpg" alt=""></a></li>
				<li><a href="#"><img src="/imgcms/Public/Home/Index/images/pic-3.jpg" alt=""></a></li>
			</ul>
		</div>
	</div>
	<div id="box-2">
		<div class="container">
			<div class="txt"><span class="num">1,898,764,531</span>张摄影作品在AMAZING发布</div>
			<div class="post-d"><a href="">发布你的作品</a></div>
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