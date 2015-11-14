<?php 
class Depic extends CActiveRecord{


	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "{{depic}}";
	}

	public function attributeLabels(){
		return array(
			'img_src'	=> '图片位置',
			'pid'=>'所属产品id',

			);
	}

	public function rules(){
		return array(
             array('img_src','safe')
			
			);
	}

}