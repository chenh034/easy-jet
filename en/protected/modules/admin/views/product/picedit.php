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

            $(".pic_del").live('click',function(){
                var pic_id = $(this).prev().attr("rel");
				var pic_url = $(this).prev().html();
				console.log(pic_id);console.log(pic_url);
				var this_tr = $(this).parent().parent();

				$.ajax({
	        		type: "post",
	        		url: "<?php echo Yii::app()->request->baseUrl ?>/index.php?r=admin/product/ajax",
	        		data: {id:pic_id, url:pic_url},
	        		dataType: "json",
	        		success:function(data){
	        			alert('删除成功');
	        		}
	        	});
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
	
	<?php 
		$form = $this->beginWidget('CActiveForm', array('htmlOptions'=>array('enctype'=>'multipart/form-data')));
	 ?>
	<table class="table">
		<tr >
			<td class="th" colspan="10">修改产品细节图片</td>
		</tr>
	
		<tr>
			<td>产品名称</td>
			<td>
				<?php echo $ProductInfos->name ?>
			</td>
		</tr>
        
        <?php foreach ($DepicInfos as $key => $value): ?>
			<tr>
			    <td>
			    	产品细节图片
			    </td>
				<td>
					  <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/org/ueditor/php/upload/<?php echo $value->img_src ?>" width="370" height="300" style="margin-bottom:20px;"> <br/>
					  <?php echo $form->fileField($value,'img_src',array('name'=>"pic_edit[$value->id]")) ?>
					  <a style="display:none;" rel="<?php echo $value->id ?>"><?php echo $value->img_src?></a>
					  <a href="Javascript:void(0)" class="pic_del">删除</a>
				</td>
			</tr>
		<?php endforeach ?>
		<tr>
		    <td>
		    	添加新图片
		    </td>
			<td id="detail-pic" height="60">
			   <input type="hidden" value="" id="picture" name="detail-pic" />
			   <a href="javascript:void(0);" style="float:right;" onclick="upImage();">上传图片</a>
            </td>
		</tr>

		<tr>
			<td colspan="10"><input type="submit" class="input_button" value="发布"/></td>
		</tr>
	</table>
	<?php $this->endWidget() ?>
</body>
</html>