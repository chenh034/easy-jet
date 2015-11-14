<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/public.css">
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/org/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/org/ueditor/ueditor.config.js"></script>
	
	<script type="text/javascript">
	    var editor;
		var _editor;
		$(function() {
		     editor = UE.getEditor('content', {
		         initialFrameWidth: 900,
		         initialFrameHeight: 600,
		     });


		    //重新实例化一个编辑器，防止在上面的editor编辑器中显示上传的图片或者文件
		    _editor = UE.getEditor('upload_ue');
		    _editor.ready(function () {
		        //设置编辑器不可用
		        _editor.setDisabled();
		        //隐藏编辑器，因为不会用到这个编辑器实例，所以要隐藏
		        _editor.hide();
		        //侦听图片上传
		        _editor.addListener('beforeInsertImage', function (t, arg) {
		        	var img_scr = $("#picture").val();
		        	
		        	var img_url = '';

		        	$.each(arg,function(index,value){
		        		img_scr+=value.src;
		        		img_url+="<img width='50' height='50'src=' "+value.src+"'>";

		        	});
		        	
		            //将地址赋值给相应的input,只去第一张图片的路径
		            $("#picture").attr("value",img_scr);
		            $("#detail-pic").append(img_url);
		            //图片预览
		            $("#preview").attr("src", arg[0].src);
		        })
		        //侦听文件上传，取上传文件列表中第一个上传的文件的路径
		        _editor.addListener('afterUpfile', function (t, arg) {
		            $("#file").attr("value", _editor.options.filePath + arg[0].url);
		        })
		    });
		});    
		//弹出图片上传的对话框
		function upImage() {
		    var myImage = _editor.getDialog("insertimage");
		    myImage.open();
		}
		//弹出文件上传的对话框
		function upFiles() {
		    var myFiles = _editor.getDialog("attachment");
		    myFiles.open();
		}
	</script>

	<style type="text/css">
        #detail-pic img{
        	border: 1px solid #959191;
        	margin-right: 10px;
        }
	</style>


	<title>Document</title>
</head>
<body>

    
	<script type="text/plain" id="upload_ue"></script>  
	
	<?php 
		$form = $this->beginWidget('CActiveForm', array('htmlOptions'=>array('enctype'=>'multipart/form-data')));
	 ?>
	<table class="table">
		<tr >
			<td class="th" colspan="10">发布产品</td>
		</tr>
	
		<tr>
			<td><?php echo $form->labelEx($Infos, 'name') ?></td>
			<td>
				<?php echo $form->textField($Infos, 'name', array('maxlength'=>50)) ?>
				<?php echo $form->error($Infos, 'name') ?>
			</td>
		</tr>
		
		<tr>
			<td><?php echo $form->labelEx($Infos, 'cid') ?></td>
			<td>
				<?php echo $form->dropDownList($Infos,'cid', $cateArr) ?>
				<?php echo $form->error($Infos, 'cid') ?>
			</td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($Infos, 'thumb') ?></td>
			<td>
				<?php echo $form->fileField($Infos, 'thumb') ?>
				<?php echo $form->error($Infos, 'thumb') ?>
			</td>
		</tr>
		<tr>
			<td>原缩略图</td>
			<td><img width="208" height="180" src="<?php echo Yii::app()->request->baseUrl ?>/uploads/product/<?php echo $Infos->thumb ?>"></td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($Infos, 'info') ?></td>
			<td>
				<?php echo $form->textArea($Infos, 'info', array('cols'=>50,'rows'=>10,'maxlength'=>100)) ?>
				<?php echo $form->error($Infos, 'info') ?>
			</td>
		</tr>

		<tr>
			<td>产品细节图片</td>
			<td>
			  <a href="<?php echo $this->createUrl('picEdit', array('id'=>$Infos->id)) ?>">
			     查看并编辑图片
			  </a>
		    </td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($Infos, 'content') ?></td>
			<td>
		
				<?php echo $form->textArea($Infos, 'content',array('id'=>'content')) ?>
				<?php echo $form->error($Infos, 'content') ?>
			</td>
		</tr>
		<tr>
			<td colspan="10"><input type="submit" class="input_button" value="发布"/></td>
		</tr>
	</table>
	<?php $this->endWidget() ?>
</body>
</html>