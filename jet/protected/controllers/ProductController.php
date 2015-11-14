<?php 

/**
* 
*/
class ProductController extends Controller
{
	
	public function actionindex(){
         $productModel = Category::model();

         $Infos = $productModel->findAll();

         $this->render('index',array('Infos'=>$Infos));
	}
	public function actionList($cid){
         $CategoryModel = Category::model();
         $CategoryInfos = $CategoryModel->findAll();
         

         $cri = new CDbCriteria();
         $cri->order = 'id DESC';
         $cri->addCondition("cid=$cid");
         $ProductModel = Product::model();
         $ProductInfos = $ProductModel->findAll($cri);

         $total = $ProductModel->count($cri);

		 $pager = new CPagination($total);
		 $pager->pageSize = 8;
		 $pager->applyLimit($cri);

		 $data = array(
			'ProductInfos'	=> $ProductInfos,
			'pages'	=> $pager,
			'cid'=>$cid,
			'CategoryInfos'=>$CategoryInfos,
			);


         $this->render('list',$data);
	}

	public function actionDetail($id){
        // 获取产品细节图片
        $DepicModel = Depic::model();
        $DepicInfos = $DepicModel->findAllByAttributes(array('pid'=>$id));
        
        // 获取产品信息
        $ProductModel = Product::model();
        $ProductInfos = $ProductModel->findByPk($id);

        // 查询下一条
        $sql = "select id,name from {{product}} Where id<$id order by id desc limit 1";
        $next = $ProductModel->findBySql($sql);

        // 查询上一条
        $sql = "select id,name from {{product}} Where id>$id order by id asc limit 1";
        $pre = $ProductModel->findBySql($sql);

		$this->render('detail',array('DepicInfos'=>$DepicInfos,'ProductInfos'=>$ProductInfos,'next'=>$next,'pre'=>$pre));
	}


}

 ?>