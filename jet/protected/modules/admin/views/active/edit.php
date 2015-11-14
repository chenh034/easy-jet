<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/public.css">
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/org/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "<?php echo Yii::app()->request->baseUrl ?>/assets/admin/org/ueditor/";
		window.onload = function(){
			window.UEDITOR_CONFIG.initialFrameWidth = 900;
			window.UEDITOR_CONFIG.initialFrameHeight = 600;
			UE.getEditor('content');
		}

	</script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/org/ueditor/ueditor.config.js"></script>
	<title>Document</title>
</head>
<body>
	
	<?php 
		$form = $this->beginWidget('CActiveForm', array('htmlOptions'=>array('enctype'=>'multipart/form-data')));
	 ?>
	<table class="table">
		<tr >
			<td class="th" colspan="10">发表文章</td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($activeModel, 'title') ?></td>
			<td>
				<?php echo $form->textField($activeModel, 'title', array('maxlength'=>20)) ?>
				<?php echo $form->error($activeModel, 'title') ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($activeModel, 'thumb') ?></td>
			<td>
				<?php echo $form->fileField($activeModel, 'thumb') ?>
				<?php echo $form->error($activeModel, 'thumb') ?>
			</td>
		</tr>

		<tr>
			<td>原图</td>
			<td><img src=" <?php echo Yii::app()->request->baseUrl ?>/uploads/active/<?php echo $activeModel->thumb ?> "></td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($activeModel, 'info') ?></td>
			<td>
				<?php echo $form->textArea($activeModel, 'info', array('cols'=>50,'rows'=>10,'maxlength'=>100)) ?>
				<?php echo $form->error($activeModel, 'info') ?>
			</td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($activeModel, 'content') ?></td>
			<td>
		
				<?php echo $form->textArea($activeModel, 'content',array('id'=>'content')) ?>
				<?php echo $form->error($activeModel, 'content') ?>
			</td>
		</tr>
		<tr>
			<td colspan="10"><input type="submit" class="input_button" value="修改"/></td>
		</tr>
	</table>
	<?php $this->endWidget() ?>
</body>
</html>