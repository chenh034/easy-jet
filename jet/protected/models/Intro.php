<?php 

/**
* 
*/
class Intro extends CActiveRecord
{
	
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "{{intro}}";
	}

	public function attributeLabels(){
		return array(
            'id'=>'序号',
            'introduce'=>'公司介绍',
            'is_show'=>'是否显示',
            'addtime'=>'添加时间',
            'title'=>'标题',
			);
	}

	public function rules(){
		return array(
            
            array('introduce', 'required', 'message'=>'内容不可为空'),
            array('is_show','required','message'=>'此项必填'),
            array('title','required','message'=>'标题不可为空'),

			);
	}
}

 ?>