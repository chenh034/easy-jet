<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/addclass.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/index.css">

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
              <li style="margin-left:0px;"><a class="current" href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/index">Home</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=product/index">Product</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/intro">Introduction</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=active/index">Trends</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/contact">Contact</a></li>
           </ul>
            
        </div>
    </div>
<!-- 头部结束 -->


<!-- 内容 -->
    <div id="content" class="clear">
    	<div id="banner">
          <?php if (count($ScrollInfos)) {?>
             <ul>
               <?php foreach ($ScrollInfos as $key => $value): ?>
                 <li>
                   <a href="">
                     <img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/scroll/<?php echo $value->img_src ?>" alt="图片加载失败">
                   </a>
                 </li>
                 
               <?php endforeach ?>
                 
              </ul>
              <ol>
                  <?php foreach ($ScrollInfos as $key => $value): ?>
                    <li></li>
                  <?php endforeach ?>
              </ol>
              <p class="introduce">111111</p>
            
          <?php }else{?>
              <div style="width:960px;height:324px; font-size:24px; text-align:cneter">
                暂无轮播图
              </div>
          <?php  }?>
            
    		
    	</div>

    	<div id="product">
    		<ul>
           <?php if (count($ProductInfos)) {?>
              <?php foreach ($ProductInfos as $key => $value): ?>
                  <li style="margin-left:14px;">
                      <a href="<?php echo $this->createUrl('product/detail', array('id'=>$value->id)) ?>">
                        <img width="208" height="180" src="<?php echo Yii::app()->request->baseUrl ?>/uploads/product/<?php echo $value->thumb ?>">
                      </a>
                      <p><?php echo $value->name ?></p>
                      <a href="<?php echo $this->createUrl('detail', array('id'=>$value->id)) ?>">READ MORE ></a>
                  </li>
              <?php endforeach ?>           
          <?php }else{?>
              <li style="margin-left:14px;line-height:244px;font-size:24px;text-align:center;">
                  暂时无产品
              </li>
              <li style="margin-left:14px;line-height:244px;font-size:24px;text-align:center;">
                  暂时无产品
              </li>
              <li style="margin-left:14px;line-height:244px;font-size:24px;text-align:center;">
                  暂时无产品
              </li>
              <li style="margin-left:14px;line-height:244px;font-size:24px;text-align:center;">
                  暂时无产品
              </li>

          <?php  }?>
    			
    		</ul>
    	</div>
    </div>
<!-- 内容结束 -->