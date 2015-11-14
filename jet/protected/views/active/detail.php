<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/addclass.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/active-detail.css">

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
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/intro">公司介绍</a></li>
              <li><a class="current" href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=active/index">公司动态</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/contact">联系方式</a></li>
           </ul>
            
        </div>
    </div>
<!-- 头部结束 -->


<!-- 内容 -->
    <div id="content" class="clear">
        <p class="title" >公司动态</p>

        <div id="main-active">
            <?php if ($Infos!=null) {?>
                <h3 id="p-title"><?php echo $Infos->title ?></h3>
                <p id="p-time">发布时间：<?php echo date('Y-m-d', $Infos->time) ?></p>

                <div id="active">
                  <?php echo $Infos->content ?>
                </div>

                <div id="jump">
                    <p class="p-jump">
                       <?php if ($pre) { ?>
                         <a href="<?php echo $this->createUrl('detail', array('aid'=>$pre->aid)) ?>">
                           上一篇： <?php echo $pre->title ?>
                         </a>
                       <?php } else {?>
                         上一篇：已是第一篇
                       <?php } ?>
                    </p>

                    <p class="p-jump">
                       <?php if ($next) { ?>
                         <a href="<?php echo $this->createUrl('detail', array('aid'=>$next->aid)) ?>">
                           下一篇： <?php echo $next->title ?>
                         </a>
                       <?php }else{ ?>
                         下一篇：已是最后一篇
                       <?php } ?>
                    </p>
                    
                </div>
              
            <?php }else{?>
               <div style="height:500px;" >
                <p style="text-align:center;font-size:26px;">抱歉，暂无动态。</p>
              </div>

            <?php  }?>

            
            

            <a id="pre" href="javascript:history.go(-1);">返回</a>
        </div>
        
        
        
    </div>
<!-- 内容结束 -->