<?php 
class Scroll extends CActiveRecord{


	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "{{scroll}}";
	}

	public function attributeLabels(){
		return array(
			'url'	=> '轮播图的链接地址',
			'img_src'=>'图片存放位置',
			'info'=>'简介'

			);
	}

	public function rules(){
		return array(

			array('url', 'required', 'message'=>'地址必填'),
			array('info','required', 'message'=>'简介必填'),
			);
	}

}