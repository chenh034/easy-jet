<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=cU5ztKSBLSRCpY2CcGYRZGa2"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/contact.css">

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
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=product/index">Product</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/intro">Introduction</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=active/index">Trends</a></li>
              <li><a class="current" href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=index/contact">Contact</a></li>
         </ul>
         
      </div>
    </div>
<!-- 头部结束 -->



<!-- 内容 -->
<div id="content" class="clear">
	<p class="title" >联系方式</p>

	<ul>
		<li>GUANGZHOU EASY-JET PACKAGING EQUIPMENT CO. LTD</li>
		<li>Address:Room 409.Maogang Road,Huangpu,Guangzhou,510700.China</li>
		<li>E-mail：sales@easy-jet.net</li>
		<li>Postcode：510700</li>
		<li>Tel:86 20 82207360</li>
		<li>Fax:86 20 82184923</li>
	</ul>


	<div id="allmap"></div>
</div>
<!-- 内容结束 -->

<script type="text/javascript">
         var map = new BMap.Map("allmap"); 
         var point = new BMap.Point(113.444896, 23.123894); // 需要标注的位置的经纬度 
         map.centerAndZoom(point, 15); // 中心位置和缩放倍数
         map.enableScrollWheelZoom(); // 添加滚动轴
         map.addControl(new BMap.NavigationControl()); // 添加左上角的标尺工具
         map.addControl(new BMap.NavigationControl()); 
         map.addControl(new BMap.ScaleControl()); 
         map.addControl(new BMap.OverviewMapControl()); 
         map.addControl(new BMap.MapTypeControl()); 
         map.setCurrentCity("广州");
         
         var opts = { 
         width : 200, // 信息窗口宽度 
         height: 20, // 信息窗口高度 
         title : "悦丰商务大厦" // 信息窗口标题 
         } 
         var infoWindow = new BMap.InfoWindow("广州易琦捷标识设备有限公司", opts); // 创建信息窗口对象 
         map.openInfoWindow(infoWindow, map.getCenter()); // 打开信息窗口 
         var marker = new BMap.Marker(point); // 创建标注,即地图上的小红点 
         map.addOverlay(marker); 
</script>