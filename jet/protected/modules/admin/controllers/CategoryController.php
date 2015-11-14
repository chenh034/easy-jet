<?php 
class CategoryController extends Controller{
	public function filters(){
		return array(
				'accessControl',
			);
	}

	public function accessRules(){
		return array(
			//更加具体化
			// array(
			// 	'allow',
			// 	'actions'=>array('del','add'),
			// 	'users'	=> array('admin')
			// 	),

			array(
				'allow',
				'actions'=>array('index', 'del','add', 'edit'),
				'users'	=> array('@')
				),
			array(
				'deny',
				'users' => array('*')
				),


			);
	}

	/**
	 * 查看栏目
	 */
	public function actionIndex(){
		$categoryModel = Category::model();
		$sql = "SELECT cid,cname FROM {{category}}";
		$categoryInfo = $categoryModel->findAllBySql($sql);

		$this->render('index', array('categoryInfo'=>$categoryInfo));
	}

	/**
	 * 添加栏目
	 */
	public function actionAdd(){
		$categoryModel = new Category();

		if(isset($_POST['Category'])){

			$categoryModel->attributes = $_POST['Category'];

			$categoryModel->thumb = CUploadedFile::getInstance($categoryModel, 'thumb');

			if ($categoryModel->thumb == null) {
				echo "<script type='text/javascript'>
                            alert('上传头像不可为空');
                      </script>";die();
			}else{
				$fileType = $categoryModel->thumb->type;
				if (($fileType == 'image/jpg')||($fileType == 'image/jpeg')
	                ||($fileType == 'image/png')||($fileType == 'imgage/gif')) {

					$preRand = 'img_' . time();
						$imgName = $preRand . '.' . $categoryModel->thumb->extensionName;
						$categoryModel->thumb->saveAs('uploads/category/' . $imgName);
						$categoryModel->thumb = $imgName;

						//缩略图
						$path = dirname(Yii::app()->BasePath) . '/uploads/category/';

						$thumb = Yii::app()->thumb;
						$thumb->image = $path . $imgName;
						$thumb->width = 960;
						$thumb->height=364;
						$thumb->mode = 4;
						$thumb->directory = $path;
						$thumb->defaultName = $preRand;

						$thumb->createThumb();
						$thumb->save();
				}else{
					echo "<script type='text/javascript'>
	                              alert('请上传jpg/png/gif格式的图片');
	                          </script>";die();
				}
			}

			if($categoryModel->save()){
				$this->redirect(array('index'));
			}

		}
		// p($_POST);
		$this->render('add', array('categoryModel'=>$categoryModel));
	}



	/**
	 * 编辑栏目
	 */
	public function actionEdit($cid){
		$categoryModel = Category::model();
		$categoryInfo = $categoryModel->findByPk($cid);
		$imgName = $categoryInfo->thumb;
		
		// p($_POST);
		if(isset($_POST['Category'])){

			$categoryModel->thumb = CUploadedFile::getInstance($categoryModel, 'thumb');


			if($categoryModel->thumb === null){

			}else{
	                $fileType = $categoryModel->thumb->type;
	                if( ($fileType == 'image/jpg')||($fileType == 'image/jpeg')
	                ||($fileType == 'image/png')||($fileType == 'imgage/gif') ){

						$categoryModel->thumb->saveAs('uploads/category/' . $imgName);
						$categoryModel->thumb = $imgName;

						$preRand = substr($imgName, 0,14);

						//缩略图
						$path = dirname(Yii::app()->BasePath) . '/uploads/category/';

						$thumb = Yii::app()->thumb;
						$thumb->image = $path . $imgName;
						$thumb->width = 960;
						$thumb->height=364;
						$thumb->mode = 4;
						$thumb->directory = $path;
						$thumb->defaultName = $preRand;

						$thumb->createThumb();
						$thumb->save();

	                }else{
	                	echo "<script type='text/javascript'>
	                              alert('请上传jpg/png/gif格式的图片');
	                          </script>";die();
	                }
				
			}
            $categoryInfo->attributes = $_POST['Category'];
            $categoryInfo->thumb = $imgName;
			if($categoryInfo->save()){
				$this->redirect(array('index'));
			}
		}

		$this->render('edit', array('categoryModel'=>$categoryInfo));
	}


	/**
	 * 删除栏目
	 */
	public function actionDel($cid){
		$ProductModel = Product::model();

		$sql = "SELECT id FROM {{product}} WHERE cid=$cid";
		$ProductInfo = $ProductModel->findBysql($sql);

		if(is_object($ProductInfo)){
			Yii::app()->user->setFlash('hasPro', '该类别下还有产品，请先删除产品');
			$this->redirect(array('index'));
			
		}


        $CategoryModel = Category::model();
		$thumb = $CategoryModel->findByPk($cid)->thumb;
		$data_result= $CategoryModel->deleteByPk($cid);

		$file =$_SERVER['DOCUMENT_ROOT'].'easy-jet/jet/uploads/Category/'.$thumb;
        if (file_exists($file)) {
        	$file_result = unlink($file);
        }

		if ($file_result && $data_result) {
        	Yii::app()->user->setFlash('del', '删除成功');
			$this->redirect(array('index'));
        }else{
        	Yii::app()->user->setFlash('del', '删除失败');
			$this->redirect(array('index'));
        }




	}


}















