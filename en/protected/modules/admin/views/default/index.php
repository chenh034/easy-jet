<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>后台管理首页</title>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/admin.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/admin.js"></script>
<!-- 默认打开目标 -->
<base target="iframe"/>
</head>
<body>
<!-- 头部 -->
	<div id="top_box">
		<div id="top">
			<p id="top_font">后台管理系统</p>
		</div>
		<div class="top_bar">
			<p class="adm">
				<span>管理员：</span>
				<span class="adm_pic">&nbsp&nbsp&nbsp&nbsp</span>
				<span class="adm_people">[<?php echo Yii::app()->user->name ?>]</span>
			</p>
			<p class="now_time">
				您的当前位置是：
				<span>首页</span>
			</p>
			<p class="out">
				<span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
				<a href="<?php echo $this->createUrl('login/out') ?>" target="_self">退出</a>
			</p>
		</div>
	</div>
<!-- 左侧菜单 -->
		<div id="left_box">
		    <div class="menu_box">
				<h2>首页轮播图管理</h2>
				<div class="text">
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('scroll/add') ?>" class="pos">添加轮播图</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('scroll/index') ?>" class="pos">查看轮播图</a>				        	
				        </li> 
				    </ul>

				</div>
			</div>

			<div class="menu_box">
				<h2>公司动态管理</h2>
				<div class="text">
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('active/add') ?>" class="pos">发表公司动态</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('active/index') ?>" class="pos">查看公司动态</a>				        	
				        </li> 
				    </ul>

				</div>
			</div>

			<div class="menu_box">
				<h2>产品类别管理</h2>
				<div class="text">
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('Category/add') ?>" class="pos">添加产品类别</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('Category/index') ?>" class="pos">查看产品类别</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>	

			<div class="menu_box">
				<h2>产品管理</h2>
				<div class="text">
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('product/add') ?>" class="pos">发布产品</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('product/index') ?>" class="pos">查看产品</a>				        	
				        </li> 
				    </ul>

				</div>
			</div>


			<div class="menu_box">
				<h2>公司介绍</h2>
				<div class="text">
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('intro/add') ?>" class="pos">添加公司介绍</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('intro/index') ?>" class="pos">查看公司介绍</a>				        	
				        </li> 
				    </ul>

				</div>
			</div>


			
			<div class="menu_box">
				<h2>常用菜单</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('/') ?>" class="pos" target="_blank">前台首页</a>				        	
				        </li> 
				    </ul>
				  	
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo $this->createUrl('user/passwd') ?>" class="pos">密码修改</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>			
		</div>
		<!-- 右侧 -->
		<div id="right">
			<iframe  frameboder="0" border="0" 	scrolling="yes" name="iframe" src="<?php echo $this->createUrl('default/copy') ?>"></iframe>
		</div>

</body>
</html>
<!--[if IE 6]>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.adm_pic, #left_box .pos, .span_server, .span_people', 'background');
    </script>
<![endif]-->
