<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/js/addclass.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/active.css">
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
        <?php if (count($Infos)) {?>
            <ul>
            <?php foreach($Infos as $v): ?>
              <li class="clear">
                <div class="active-l">
                  <a href="<?php echo $this->createUrl('detail', array('aid'=>$v->aid)) ?>">
                    <img width="178" height="156" alt="图片加载失败" src="<?php echo Yii::app()->request->baseUrl ?>/uploads/active/<?php echo $v->thumb ?>">
                  </a>
                </div>
                <div class="active-r">
                  <h3> 
                     <a href="<?php echo $this->createUrl('detail', array('aid'=>$v->aid)) ?>"> <?php echo $v->title ?> </a>
                  </h3>
                  <p class="p-info"><?php echo $v->info ?></p>
                  <p class="p-time"><?php echo date('Y-m-d', $v->time) ?></p>
                </div>
              </li>
              
            <?php endforeach ?>
            </ul>

        <?php }else{?>
            <div style="height:500px;" >
              <p style="text-align:center;font-size:26px;">抱歉，暂无公司动态。</p>
            </div>

        <?php  }?>
        
        

        <div id="page">
          <?php 
            $this->widget('CLinkPager', array(
              'header'  =>  '',
              'firstPageLabel'  => '首页',
              'lastPageLabel' => '末页',
              'prevPageLabel' => '上一页',
              'nextPageLabel' => '下一页',
              'pages'     => $pages,
              'maxButtonCount'=> 5,
              ));
           ?>
        </div>
        
    </div>
<!-- 内容结束 -->