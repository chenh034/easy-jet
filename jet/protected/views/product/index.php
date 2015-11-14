<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/addclass.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/product.css">
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
              <li><a class="current" href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=product/index">产品</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/intro">公司介绍</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=active/index">公司动态</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/contact">联系方式</a></li>
           </ul>
            
        </div>
    </div>
<!-- 头部结束 -->


<!-- 内容 -->
    <div id="content" class="clear">
        <ul>
        <?php if (count($Infos)) {?>
            <?php foreach ($Infos as $key => $value): ?>
               <li>
                 <a href="<?php echo $this->createUrl('list', array('cid'=>$value->cid)) ?>">
                   <img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/category/<?php echo $value->thumb ?> ">
                 </a>
               </li>
            <?php endforeach ?>
        <?php }else{?>
            <div style="height:500px;" >
              <p style="text-align:center;font-size:26px;">抱歉，暂无产品。</p>
            </div>

        <?php  }?>
          
        </ul>
    </div>
<!-- 内容结束 -->