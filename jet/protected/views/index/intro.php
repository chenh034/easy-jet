<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/intro.css ">

<!-- 头部 -->
    <div id="header" class="clear">
    	<div id="logo">
    		<div id="easy-jet"></div>
    	</div> 
             
    	<div id="nav">
    	   <div id="language">
    	   	   <a href="http://easy-jet.net">简体中文</a>&nbsp;/&nbsp;<a href="http://en.easy-jet.net">English</a>
    	   </div>

    	   <ul>
    	   	  <li style="margin-left:0px;"><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/index">主页</a></li>
    	   	  <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=product/index">产品</a></li>
    	   	  <li><a class="current" href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/intro">公司介绍</a></li>
    	   	  <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=active/index">公司动态</a></li>
    	   	  <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/contact">联系方式</a></li>
    	   </ul>
    		
    	</div>
    </div>
<!-- 头部结束 -->

<div id="content">

    <p class="title" >公司简介</p>
    <div id="introduce">
        <?php if ($IntroInfo!=null) {?>
           <?php echo $IntroInfo->introduce ?>
    
        <?php }else{?>
           <p style="text-align:center;font-size:26px;display:block;height:500px;">抱歉：暂无公司介绍</p>

        <?php  }?>
    </div>
</div>