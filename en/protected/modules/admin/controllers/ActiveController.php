<?php
/**
 * 文章管理控制器
 */
class ActiveController extends Controller{

	public function filters(){
		return array(
				'accessControl',
			);
	}

	public function accessRules(){
		return array(
			//更加具体化
			// array(
			// 	'deny',
			// 	'actions'=>array('del','add'),
			// 	'users'	=> array('admin')
			// 	),

			array(
				'allow',
				'actions'=>array('index', 'del','add','edit'),
				'users'	=> array('@')
				),
			array(
				'deny',
				'users' => array('*')
				),


			);
	}


	/**
	 * 查看文章
	 */
	public function actionIndex(){
		$cri = new CDbCriteria();
		$cri->order = 'aid DESC';
		$activeModel = Active::model();
		$total = $activeModel->count($cri);

		$pager = new CPagination($total);
		$pager->pageSize = 8;
		$pager->applyLimit($cri);

		$activeInfo = $activeModel->findAll($cri);

		$data = array(
			'activeInfo'	=> $activeInfo,
			'pages'			=> $pager
			);

		$this->render('index', $data);
	}
	/**
	 * 添加文章
	 */
	public function actionAdd(){
		// $activeModel->thumb;
		// echo Yii::app()->BasePath;die;
		$activeModel = new Active();

		$data = array(
			'activeModel'	=> $activeModel,
			);

		if(isset($_POST['Active'])){

			$activeModel->attributes = $_POST['Active'];
			$activeModel->time = time();
            
			$activeModel->thumb = CUploadedFile::getInstance($activeModel, 'thumb');

			if($activeModel->thumb == null){
				echo "<script type='text/javascript'>
                            alert('上传头像不可为空');
                      </script>";die();

			}else{
	                $fileType = $activeModel->thumb->type;
	                if( ($fileType == 'image/jpg')||($fileType == 'image/jpeg')
	                ||($fileType == 'image/png')||($fileType == 'imgage/gif') ){

	                	$preRand = 'img_' . time();
						$imgName = $preRand . '.' . $activeModel->thumb->extensionName;
						$activeModel->thumb->saveAs('uploads/active/' . $imgName);
						$activeModel->thumb = $imgName;

						//缩略图
						$path = dirname(Yii::app()->BasePath) . '/uploads/active/';

						$thumb = Yii::app()->thumb;
						$thumb->image = $path . $imgName;
						$thumb->width = 180;
						$thumb->height=156;
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

			if($activeModel->save()){
				$this->redirect(array('index'));
			}
		}

		$this->render('add', $data);
	}

	public function actionEdit($aid){
		$activeModel = Active::model();
		$activeInfos = $activeModel->findByPk($aid);
		$imgName = $activeInfos->thumb;

		if (isset($_POST['Active'])) {
			$activeModel->thumb = CUploadedFile::getInstance($activeModel, 'thumb');

			if($activeModel->thumb === null){

			}else{
	                $fileType = $activeModel->thumb->type;
	                if( ($fileType == 'image/jpg')||($fileType == 'image/jpeg')
	                ||($fileType == 'image/png')||($fileType == 'imgage/gif') ){

						$activeModel->thumb->saveAs('uploads/active/' . $imgName);
						$activeModel->thumb = $imgName;

						$preRand = substr($imgName, 0,14);

						//缩略图
						$path = dirname(Yii::app()->BasePath) . '/uploads/active/';

						$thumb = Yii::app()->thumb;
						$thumb->image = $path . $imgName;
						$thumb->width = 180;
						$thumb->height=156;
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

			$activeInfos->attributes = $_POST['Active'];
			if($activeInfos->save()){
				$this->redirect(array('active/index'));
			}
		}


		$this->render('edit',array('activeModel'=>$activeInfos));

	}


	public function actionDel($aid){

		$ActiveModel = Active::model();
		$thumb = $ActiveModel->findByPk($aid)->thumb;
		$data_result= $ActiveModel->deleteByPk($aid);

		$file =$_SERVER['DOCUMENT_ROOT'].'easy-jet/jet/uploads/Active/'.$thumb;
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









