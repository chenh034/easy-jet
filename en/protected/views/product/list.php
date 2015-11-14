<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/addclass.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/list.css">
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
              <li style="margin-left:0px;"><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/index">Home</a></li>
              <li><a class="current" href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=product/index">Product</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/intro">Introduction</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=active/index">Trends</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/contact">Contact</a></li>
           </ul>
    		
    	</div>
    </div>
    <!-- 头部结束 -->


     
    <!-- 内容 -->
    <div id="content" class="clear">
    	<p class="title" class="clear">
    		<span>Product Type：</span>
            <?php foreach ($CategoryInfos as $key => $value): ?>
                <?php if ($value->cid==$cid){ ?>
                    <a class="current_pro" href="<?php echo $this->createUrl('list', array('cid'=>$value->cid)) ?>"><?php echo $value->cname ?></a>
                <?php } else{?>
                    <a href="<?php echo $this->createUrl('list', array('cid'=>$value->cid)) ?>"><?php echo $value->cname ?></a>
                <?php } ?>
                
            <?php endforeach ?>
    		
    	</p>
        
        <div id="product">
	    	<ul>
                <?php foreach ($ProductInfos as $key => $value): ?>
                    <li>
                        <a href="<?php echo $this->createUrl('detail', array('id'=>$value->id))?>"> 
                            <img width="198" height="196" src="<?php echo Yii::app()->request->baseUrl ?>/uploads/product/<?php echo $value->thumb ?>" alt="图片加载失败">
                        </a>
                        <span><?php echo $value->name ?></span>
                    </li>
                <?php endforeach ?>
	    		
	    	</ul>

            <div id="page">
              <?php 
                $this->widget('CLinkPager', array(
                  'header'  =>  '',
                  'firstPageLabel'  => 'First',
                  'lastPageLabel' => 'Last',
                  'prevPageLabel' => 'Prev',
                  'nextPageLabel' => 'Next',
                  'pages'     => $pages,
                  'maxButtonCount'=> 5,
                  ));
               ?>
            </div>
        
	    </div>
    </div>
    <!-- 内容结束 -->
