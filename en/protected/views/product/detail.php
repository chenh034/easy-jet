<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/addclass.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/zoom.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/pro-detail.css">

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
        <p class="title" >Product</p>
        <?php if (count($DepicInfos)) { ?>
            <input style="display:none;" type="text" name="" id="">
            <div class="zoom">
              <div class="zoomMiddle">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/org/ueditor/php/upload/<?php echo $DepicInfos['0']->img_src ?>" alt="">
                <div class="mask"></div>
              </div>

              <div class="zoomSmall">
                <span class="left disable">&lt;</span>
                <div class="wrapSmallImg">
                  <ul>
                    
                    <?php foreach ($DepicInfos as $key => $value): ?>
                      <li>
                         <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/org/ueditor/php/upload/<?php echo $value->img_src ?>" alt="图片加载失败" >
                      </li>
                    <?php endforeach ?>
                    
                  </ul>
                </div>
                <span class="right">&gt;</span>
              </div>
              
              <div class="zoomLarge">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/org/ueditor/php/upload/<?php echo $DepicInfos['0']->img_src ?>" alt="图片加载失败">
              </div>

            </div>

        <?php }else{?>
            <div id="no-zoom">
               <img src="" alt="no image" width="300" height="330">
            </div>
        <?php } ?>
        

        <?php if ($ProductInfos!=null) {?>
            <p id="pro-name"><?php echo $ProductInfos->name ?></p>
            <div id="pro-info">
              <p><?php echo $ProductInfos->info ?></p>
            </div>

            <div id="pro-content">
              <?php echo $ProductInfos->content ?>
            </div>

            <div id="jump">
                    <p class="p-jump">
                       <?php if ($pre) { ?>
                         <a href="<?php echo $this->createUrl('detail', array('id'=>$pre->id)) ?>">
                           Prev： <?php echo $pre->name ?>
                         </a>
                       <?php } else {?>
                         Prev：It's the first one.
                       <?php } ?>
                    </p>

                    <p class="p-jump">
                       <?php if ($next) { ?>
                         <a href="<?php echo $this->createUrl('detail', array('id'=>$next->id)) ?>">
                           Next： <?php echo $next->name ?>
                         </a>
                       <?php }else{ ?>
                         Next：It's the last one.
                       <?php } ?>
                    </p>
                    
                </div>
                

                <a id="pre" href="javascript:history.go(-1);">Return</a> 
  
        <?php }else{?>
            <div style="height:500px;" >
              <p style="text-align:center;font-size:26px;">抱歉，暂无该产品的信息。</p>
              <a id="pre" href="javascript:history.go(-1);">Return</a> 
            </div>

        <?php  }?>
        
             
    </div>
<!-- 内容结束 -->