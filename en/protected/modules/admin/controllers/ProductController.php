<?php 

/**
* 
*/
class ProductController extends Controller
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
				'actions'=>array('index', 'del','add','edit','ajax','picedit'),
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
		$ProductModel = Product::model();
		$total = $ProductModel->count($cri);

		$pager = new CPagination($total);
		$pager->pageSize = 8;
		$pager->applyLimit($cri);

		$Infos = $ProductModel->findAll($cri);

		$data = array(
			'Infos'	=> $Infos,
			'pages'			=> $pager
			);

		$this->render('index', $data);
	}

	public function actionAdd(){
		// 获取模型
		$ProductModel = new Product();
		$categoryModel = Category::model();
		$cateInfo = $categoryModel->findAll();
		$cateArr[] = '请选择';
		if (count($cateInfo)) {
			foreach ($cateInfo as $key => $value) {
				$cateArr[$value->cid] = $value->cname;
			}
		}else{
			$cateArr = array();
		}

		// 处理传递过来的数据
		if (isset($_POST['Product'])) {
			$ProductModel->attributes = $_POST['Product'];
			// 上传缩略图
			$ProductModel->thumb = CUploadedFile::getInstance($ProductModel, 'thumb');

			if($ProductModel->thumb == null){
				echo "<script type='text/javascript'>
                            alert('上传头像不可为空');
                      </script>";die();

			}else{
	                $fileType = $ProductModel->thumb->type;
	                if( ($fileType == 'image/jpg')||($fileType == 'image/jpeg')
	                ||($fileType == 'image/png')||($fileType == 'imgage/gif') ){

	                	$preRand = 'img_' . time();
						$imgName = $preRand . '.' . $ProductModel->thumb->extensionName;
						$ProductModel->thumb->saveAs('uploads/product/' . $imgName);
						$ProductModel->thumb = $imgName;

						//缩略图
						$path = dirname(Yii::app()->BasePath) . '/uploads/product/';

						$thumb = Yii::app()->thumb;
						$thumb->image = $path . $imgName;
						$thumb->width = 208;
						$thumb->height=180;
						$thumb->mode = 1;
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

			if ($ProductModel->save()) {
				// 上传产品细节图片
				$pic_url = $_POST['detail-pic'];
				
				$replace = Yii::app()->request->hostInfo.Yii::app()->request->baseUrl.'/assets/admin/org/ueditor/php/upload/';
				$pic_name = explode($replace,$pic_url);
				unset($pic_name['0']);

				foreach ($pic_name as $key => $value) {
					$DepicModel = new Depic();
					$DepicModel->img_src = $value;
					$DepicModel->pid = $ProductModel->id;
					$DepicModel->save();
				}

				$this->redirect(array('index'));
			}else{
				echo "发布失败";
			}
		}

		$this->render('add',array('ProductModel'=>$ProductModel,'cateArr'=>$cateArr));
	}


	public function actionEdit($id){
		// 获取产品信息
		$categoryModel = Category::model();
		$cateInfo = $categoryModel->findAll();
		$cateArr[] = '请选择';
		foreach ($cateInfo as $key => $value) {
			$cateArr[$value->cid] = $value->cname;
		}
 
        $ProductModel = Product::model();
        $Infos = $ProductModel->findByPk($id);

        $imgName = $Infos->thumb;

        if (isset($_POST['Product'])) {
        	$ProductModel->thumb = CUploadedFile::getInstance($ProductModel, 'thumb');

			if($ProductModel->thumb === null){

			}else{
	                $fileType = $ProductModel->thumb->type;
	                if( ($fileType == 'image/jpg')||($fileType == 'image/jpeg')
	                ||($fileType == 'image/png')||($fileType == 'imgage/gif') ){

						$ProductModel->thumb->saveAs('uploads/product/' . $imgName);
						$ProductModel->thumb = $imgName;

						$preRand = substr($imgName, 0,14);

						//缩略图
						$path = dirname(Yii::app()->BasePath) . '/uploads/product/';

						$thumb = Yii::app()->thumb;
						$thumb->image = $path . $imgName;
						$thumb->width = 208;
						$thumb->height=180;
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
			$Infos->attributes = $_POST['Product'];
			if($Infos->save()){
				$this->redirect(array('product/index'));
			}
        }

		$this->render('edit',array('Infos'=>$Infos,'cateArr'=>$cateArr));
	}

	public function actionPicEdit($id){
		$ProductModel = Product::model();
        $ProductInfos = $ProductModel->findByPk($id);
        // 获取细节图片信息
        $DepicModel = Depic::model();
        $DepicInfos = $DepicModel->findAllByAttributes(array('pid'=>$id));
        if (count($_POST)) {

	        if (isset($_POST['pic_edit'])) {
	        	foreach ($_POST['pic_edit'] as $key => $value) {
	        		$pic_name = $DepicModel->findByPk($key)->img_src;
	        		$pic_folder = substr($pic_name, 0,8);
	        		$pic_name = substr($pic_name, 8);
	        		$pic_file = CUploadedFile::getInstanceByName("pic_edit[$key]");

					if($pic_file === null){

					}else{
			                $fileType = $pic_file->type;
			                if( ($fileType == 'image/jpg')||($fileType == 'image/jpeg')
			                ||($fileType == 'image/png')||($fileType == 'imgage/gif') ){

								$pic_file->saveAs('assets/admin/org/ueditor/php/upload/'.$pic_folder.$pic_name);



			                }else{
			                	echo "<script type='text/javascript'>
			                              alert('请上传jpg/png/gif格式的图片');
			                          </script>";die();
			                }
						
					}
	        	}

	        }
	        if (isset($_POST['detail-pic'])) {
	    		// 上传产品细节图片
				$pic_url = $_POST['detail-pic'];
				
				$replace = Yii::app()->request->hostInfo.Yii::app()->request->baseUrl.'/assets/admin/org/ueditor/php/upload/';
				$pic_name = explode($replace,$pic_url);
				unset($pic_name['0']);

				foreach ($pic_name as $key => $value) {
					$DepicModel = new Depic();
					$DepicModel->img_src = $value;
					$DepicModel->pid = $id;
					$DepicModel->save();
				}
				
	        }
	        $this->redirect(array('index'));
	    }

        $this->render('picedit',array('DepicInfos'=>$DepicInfos,'ProductInfos'=>$ProductInfos));
	}

	public function actionAjax(){
		$pic_id = $_POST['id'];
		$pic_url = $_POST['url'];
		
		//删除mysql表中的数据
		$DepicModel = Depic::model();
		$data_result = $DepicModel->deleteByPk($pic_id);
        
        // 删除文件
        $file =$_SERVER['DOCUMENT_ROOT'].'easy-jet/jet/assets/admin/org/ueditor/php/upload/'.$pic_url;
        if (file_exists($file)) {
        	$file_result = unlink($file);
        }


        if ($file_result && $data_result) {
        	echo 1;
        }else{
        	echo 0;
        }     
		
	}

	public function actionDel($id){
		$DepicModel = Depic::model();
		$ProductModel = Product::model();

		$thumb = $ProductModel->findByPk($id)->thumb;

       
		$DepicInfos = $DepicModel->findAllByAttributes(array('pid'=>$id));

		

		foreach ($DepicInfos as $key => $value) {
			$de_file =$_SERVER['DOCUMENT_ROOT'].'easy-jet/jet/assets/admin/org/ueditor/php/upload/'.$value->img_src;
			if (file_exists($de_file)) {
	        	if ($de_file_result = unlink($de_file)) {
	        		echo "删除成功";
	        	}else{
	        		echo "删除失败";die();
	        	};
	        }else{
	        	echo "文件不存在";die();
	        }
	        $DepicModel->deleteByPk($value->id);
		}
        $data_result= $ProductModel->deleteByPk($id);

		$file =$_SERVER['DOCUMENT_ROOT'].'easy-jet/jet/uploads/product/'.$thumb;
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

 ?>