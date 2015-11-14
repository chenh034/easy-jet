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
		        		img_url+="<img width='50' height='50'src='"+value.src+"'"+"id='img"+index+"'>";
		        		img_url+="<a class='del' href='Javascript:void(0)' id='a"+index+"'>删除</a>";

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
            $("#detail-pic .del").live('click',function(){
            	var img = $(this).prev().attr("src");
            	var all_src = $("#detail-pic #picture").attr("value");
            	all_src = all_src.replace(img,'');
            	$("#picture").attr("value",all_src);
            	$(this).prev().remove();
            	$(this).remove();
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
        .del{
        	margin-right: 10px;
        }
	</style>


	<title>Document</title>
</head>
<body>

    
	<script type="text/plain" id="upload_ue"></script>

	<?php if (count($cateArr)) {?>

	   <?php 
			$form = $this->beginWidget('CActiveForm', array('htmlOptions'=>array('enctype'=>'multipart/form-data')));
		 ?>
		<table class="table">
			<tr >
				<td class="th" colspan="10">发布产品</td>
			</tr>
		
			<tr>
				<td><?php echo $form->labelEx($ProductModel, 'name') ?></td>
				<td>
					<?php echo $form->textField($ProductModel, 'name', array('maxlength'=>50)) ?>
					<?php echo $form->error($ProductModel, 'name') ?>
				</td>
			</tr>
			
			<tr>
				<td><?php echo $form->labelEx($ProductModel, 'cid') ?></td>
				<td>
					<?php echo $form->dropDownList($ProductModel,'cid', $cateArr) ?>
					<?php echo $form->error($ProductModel, 'cid') ?>
				</td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($ProductModel, 'thumb') ?></td>
				<td>
					<?php echo $form->fileField($ProductModel, 'thumb') ?>
					<?php echo $form->error($ProductModel, 'thumb') ?>
				</td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($ProductModel, 'info') ?></td>
				<td>
					<?php echo $form->textArea($ProductModel, 'info', array('cols'=>50,'rows'=>10,'maxlength'=>100)) ?>
					<?php echo $form->error($ProductModel, 'info') ?>
				</td>
			</tr>

			<tr>
			    <td>
			    	产品细节图片
			    </td>
				<td id="detail-pic" height="60">
				   <input type="hidden" value="" id="picture" name="detail-pic" />
				   <a href="javascript:void(0);" style="float:right;" onclick="upImage();">上传图片</a>
	            </td>
			</tr>

			<tr>
				<td><?php echo $form->labelEx($ProductModel, 'content') ?></td>
				<td>
			
					<?php echo $form->textArea($ProductModel, 'content',array('id'=>'content')) ?>
					<?php echo $form->error($ProductModel, 'content') ?>
				</td>
			</tr>
			<tr>
				<td colspan="10"><input type="submit" class="input_button" value="发布"/></td>
			</tr>
		</table>
		<?php $this->endWidget() ?>

	
	<?php }else{?>
	    <div style="height:500px;" >
           <p style="text-align:center;font-size:26px;">抱歉，产品类别为空，请先至少添加一个产品类别。</p>
        </div>

	<?php  }?>  
	
	
</body>
</html>