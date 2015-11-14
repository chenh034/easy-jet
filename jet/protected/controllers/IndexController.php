<?php
/**
 * 前台控制器
 */
class IndexController extends Controller{
	public function filters(){
		return array(
				array(
					'system.web.widgets.COutputCache + index',
					'duration'	=> 30,

					),
			);
	}
	/**
	 * 默认方法
	 */
	public function actionIndex(){
		// 获取产品信息
		$ProductModel = Product::model();
		$cri = new CDbCriteria();
		$cri->limit = 4;
		$cri->offset = 0;
		$cri->order = 'id DESC';
		$ProductInfos = $ProductModel->findAll($cri);
        
        // 获取轮播图信息
        $ScrollModel = Scroll::model();
        $ScrollInfos = $ScrollModel->findAllByAttributes(array('is_show'=>1));

		

		$this->render('index',array('ProductInfos'=>$ProductInfos,'ScrollInfos'=>$ScrollInfos));
	}

	public function actionContact(){
		$this->render('contact');
	}

	public function actionIntro(){
		$IntroInfo = Intro::model();
		$IntroInfo = $IntroInfo->findByAttributes(array('is_show'=>1));


		$this->render('intro',array('IntroInfo'=>$IntroInfo));
	}
}