<?php 

/**
* 公司简介控制器
*/
class IntroController extends Controller
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
            //  'deny',
            //  'actions'=>array('del','add'),
            //  'users' => array('admin')
            //  ),

            array(
                'allow',
                'actions'=>array('index', 'del','add','edit','show'),
                'users' => array('@')
                ),
            array(
                'deny',
                'users' => array('*')
                ),


            );
    }


	// 查看公司简介
	public function actionIndex(){
		$cri = new CDbCriteria();
		$IntroInfos = Intro::model();
		$total = $IntroInfos->count($cri);

		$pager = new CPagination($total);
		$pager->pageSize = 8;
		$pager->applyLimit($cri);

		$Infos = $IntroInfos->findAll($cri);

		$data = array(
			'Infos'	=> $Infos,
			'pages'	=> $pager
			);

		$this->render('index', $data);
	}
    

    // 添加公司简介
	public function actionAdd(){
        $IntroModel = new Intro();
        if (isset($_POST['Intro'])) {
        	$IntroModel->attributes = $_POST['Intro'];
        	$IntroModel->addtime = time();
        	$IntroModel->is_show = 0;

        	if ($IntroModel->save()) {
        		$this->redirect(array('intro/index'));
        	}else{
        		echo '添加失败';
        	}
        }
       
		$this->render('add',array('IntroModel'=>$IntroModel));
	}
    

    // 修改公司简介
	public function actionEdit($id){
        $IntroInfos = Intro::model();
        $IntroInfos = $IntroInfos->findByPk($id);

        if (isset($_POST['Intro'])) {
        	$IntroInfos->attributes = $_POST['Intro'];
        	if ($IntroInfos->save()) {
        		$this->redirect(array('intro/index'));
        	}else{
        		echo "修改失败";
        	}
        }

		$this->render('edit',array('IntroInfos'=>$IntroInfos));
	}
    

    // 删除一项公司简介
	public function actionDel($id){
		$IntroModel = Intro::model();

		if($IntroModel->deleteByPk($id)){
            Yii::app()->user->setFlash('del', '删除成功');
			$this->redirect(array('index'));
		}else{
            Yii::app()->user->setFlash('del', '删除失败');
            $this->redirect(array('index'));
        }
	}
    

    // 设置前端显示哪一项简介
	public function actionShow($id){
        $IntroInfos = Intro::model();
        $Infos = $IntroInfos->findByPk($id);
        $Infos->is_show = 1;

        $nowInfos = $IntroInfos->findByAttributes(array('is_show'=>1));
        if ($nowInfos!=null) {
            $nowInfos->is_show = 0;
            $nowInfos->save();
        }
        if ($Infos->save()) {
        	
    		$this->redirect(array('intro/index'));

        }else{
        	echo "修改失败";
        }
	}


}


 ?>