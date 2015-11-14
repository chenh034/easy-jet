<?php 

/**
* 
*/
class ScrollController extends Controller
{

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
				'actions'=>array('index', 'del','add','edit','show'),
				'users'	=> array('@')
				),
			array(
				'deny',
				'users' => array('*')
				),


			);
	}
	
	public function actionIndex(){
		$cri = new CDbCriteria();
		$cri->order = 'id DESC';
		$ScrollModel = Scroll::model();
		$total = $ScrollModel->count($cri);

		$pager = new CPagination($total);
		$pager->pageSize = 8;
		$pager->applyLimit($cri);

		$ScrollInfo = $ScrollModel->findAll($cri);

		$data = array(
			'Infos'	=> $ScrollInfo,
			'pages'	=> $pager
			);

		$this->render('index', $data);
	}

	public function actionAdd(){
		$ScrollModel = new Scroll();
		if (isset($_POST['Scroll'])) {
			$ScrollModel->attributes = $_POST['Scroll'];
			$ScrollModel->is_show = 1;
			$ScrollModel->img_src = CUploadedFile::getInstance($ScrollModel, 'img_src');

			if($ScrollModel->img_src == null){
				echo "<script type='text/javascript'>
                            alert('上传头像不可为空');
                      </script>";die();

			}else{
	                $fileType = $ScrollModel->img_src->type;
	                if( ($fileType == 'image/jpg')||($fileType == 'image/jpeg')
	                ||($fileType == 'image/png')||($fileType == 'imgage/gif') ){

	                	$preRand = 'img_' . time();
						$imgName = $preRand . '.' . $ScrollModel->img_src->extensionName;
						$ScrollModel->img_src->saveAs('uploads/scroll/' . $imgName);
						$ScrollModel->img_src = $imgName;

	                }else{
	                	echo "<script type='text/javascript'>
	                              alert('请上传jpg/png/gif格式的图片');
	                          </script>";die();
	                }
				
			}
			if ($ScrollModel->save()) {
				$this->redirect(array('index'));
			}
		}

		$this->render('add',array('ScrollModel'=>$ScrollModel));

	}

	public function actionEdit($id){
		$ScrollModel = Scroll::model();
		$Infos = Scroll::model()->findByPk($id);

		if (isset($_POST['Scroll'])) {

			$ScrollModel->img_src = CUploadedFile::getInstance($ScrollModel, 'img_src');

			if($ScrollModel->img_src == null){
				

			}else{
	                $fileType = $ScrollModel->img_src->type;
	                if( ($fileType == 'image/jpg')||($fileType == 'image/jpeg')
	                ||($fileType == 'image/png')||($fileType == 'imgage/gif') ){

	                	$imgName = $Infos->img_src;
						$ScrollModel->img_src->saveAs('uploads/scroll/' . $imgName);
						

	                }else{
	                	echo "<script type='text/javascript'>
	                              alert('请上传jpg/png/gif格式的图片');
	                          </script>";die();
	                }
				
			}
			$Infos->attributes = $_POST['Scroll'];

		}
		$this->render('edit',array('Infos'=>$Infos));
	}

	public function actionDel($id){
		$ScrollModel = Scroll::model();
		$img_src = $ScrollModel->findByPk($id)->img_src;
		$data_result= $ScrollModel->deleteByPk($id);

		$file =$_SERVER['DOCUMENT_ROOT'].'easy-jet/jet/uploads/scroll/'.$img_src;
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

	public function actionShow($id){
        $ScrollModel = 	Scroll::model();
        $Infos = $ScrollModel->findByPk($id);
        if ($Infos->is_show) {
        	$Infos->is_show = 0;
        }else{
        	$Infos->is_show = 1;
        }

        
        if ($Infos->save()) {
        	$this->redirect(array('index'));
        }else{
        	echo '修改失败';
        }
	}
}
 ?>