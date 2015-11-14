<!DOCTYPE html>
<html>
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
			<td class="th" colspan="10">修改公司介绍</td>
		</tr>
        
        <tr>
			<td><?php echo $form->labelEx($IntroInfos, 'title') ?></td>
			<td>
				<?php echo $form->textField($IntroInfos, 'title', array('maxlength'=>30)) ?>
				<?php echo $form->error($IntroInfos, 'title') ?>
			</td>
		</tr>
		
		
		<tr>
			<td><?php echo $form->labelEx($IntroInfos, 'introduce') ?></td>
			<td>
		
				<?php echo $form->textArea($IntroInfos, 'introduce',array('id'=>'content')) ?>
				<?php echo $form->error($IntroInfos, 'introduce') ?>
			</td>
		</tr>
		<tr>
			<td colspan="10"><input type="submit" class="input_button" value="修改"/></td>
		</tr>
	</table>
	<?php $this->endWidget() ?>
</body>
</html>