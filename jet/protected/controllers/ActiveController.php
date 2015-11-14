<?php 

/**
* 
*/
class ActiveController extends Controller
{
	
	
	public function actionIndex(){
		$cri = new CDbCriteria();
		$cri->order ='aid desc';
		$cri->select = 'aid,thumb,title,time,info';

		$ActiveModel = Active::model();

		$total = $ActiveModel->count($cri);

		$pager = new CPagination($total);
		$pager->pageSize = 4;
		$pager->applyLimit($cri);

		$Infos = $ActiveModel->findAll($cri);

		foreach ($Infos as $key => $value) {
			$str = $value->info;
			$Infos[$key]->info = $this->truncate_utf8_string($str,70);
		}



		$data = array(
			'Infos'	=> $Infos,
			'pages'	=> $pager
			);

		$this->render('index', $data);

	}

	public function actionDetail($aid){
        $ActiveModel = Active::model();
        $Infos = $ActiveModel->findByPk($aid);

        // 查询下一条
        $sql = "select aid,title from {{active}} Where aid<$aid order by aid desc limit 1";
        $next = $ActiveModel->findBySql($sql);

        // 查询上一条
        $sql = "select aid,title from {{active}} Where aid>$aid order by aid asc limit 1";
        $pre = $ActiveModel->findBySql($sql);
        


        $this->render('detail',array('Infos'=>$Infos,'next'=>$next,'pre'=>$pre));
	}

	public function actionTest(){
		
	}
}

 ?>