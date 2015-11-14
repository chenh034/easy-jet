<?php 
class Product extends CActiveRecord{


	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "{{product}}";
	}

	public function attributeLabels(){
		return array(
			'name'	=> '产品名称',
			'thumb'=>'产品缩略图',
			'content'=>'产品详细信息',
			'info'=>'简略描述',
			'cid'=>'所属产品类别',
			);
	}

	public function rules(){
		return array(

			array('name', 'required', 'message'=>'产品名称必填'),
			array('content','safe'),
			array('info','safe'),
			array('cid','required','message'=>'产品类别必填'),


			);
	}

}