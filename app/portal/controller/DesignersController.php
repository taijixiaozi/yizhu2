<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/5
 * Time: 16:30
 */
namespace app\portal\controller;

use app\portal\model\PortalCaseModel;
use app\portal\model\PortalDesignerModel;
use app\portal\taglib\Portal;
use cmf\controller\HomeBaseController;

class DesignersController extends HomeBaseController{
    //设计师团队页
    public function index()
    {
        $params=$this->request->param();
        $portalDesignerModel = new PortalDesignerModel();
        $designer = $portalDesignerModel->paginate(16);
        $this->assign('designers', $designer);
        $designer->appends($params);
        $this->assign('page', $designer->render());
        return $this->fetch(':designers');
    }

    //设计师介绍页
    public function content()
    {
        $id=$this->request->param('id');
        //设计师信息
        $portalDesignerModel = new PortalDesignerModel();
        $designerInfo = $portalDesignerModel->findDesigner($id);

        //设计师相关案例
        $designerCase = new  PortalCaseModel();
        $caseInfo = $designerCase->getInterrelatedCase($id);

        //推荐设计师
        $queryRecommendation= $portalDesignerModel->queryRecommendation();
        //推荐案例
        $queryCase = $designerCase->queryCase();
        $this->assign('designerInfo', $designerInfo);
        $this->assign('caseInfo', $caseInfo);
        $this->assign('queryRecommendation', $queryRecommendation);
        $this->assign('queryCase', $queryCase);
        return $this->fetch(':designer_content');
    }
}