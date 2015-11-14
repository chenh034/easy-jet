<?php
/**
 * 文章管理模型
 */
class Active extends CActiveRecord{


	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "{{active}}";
	}

	public function attributeLabels(){
		return array(
			'title'	=> '标题',
			'thumb'	=> '缩略图',
			'info'	=> '摘要',
			'content'=> '内容'

			);
	}

	public function rules(){
		return array(
			array('title','required','message'=>'标题必填'),
			array('info','required', 'message'=>'摘要必填'),
			// array('thumb','file','types'=>'jpg,gif,png,jpeg', 'message'=>'没有上传或者类型不符'),
			array('content','required','message'=>'内容必填'),
			// array('num','match','pattern'=>'/^13\d{9}/','message'=>'号码不正确')
			// array('content,info','safe'),
			);
	}


	public function common(){
		$common = array();
		$sql = "SELECT cname,cid FROM {{category}} LIMIT 5";
		$common['nav'] = Category::model()->findAllBySql($sql);
		$sql = "SELECT title,aid FROM {{article}} ORDER BY time DESC LIMIT 5";
		$common['title'] = $this->findAllBySql($sql);
		return $common;
	}

}










