<?php 
class Category extends CActiveRecord{


	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "{{category}}";
	}

	public function attributeLabels(){
		return array(
			'cname'	=> '栏目名称',
			'thumb'=>'类别图片',

			);
	}

	public function rules(){
		return array(

			array('cname', 'required', 'message'=>'栏目必填'),
			array('thumb','safe'),
			);
	}

}