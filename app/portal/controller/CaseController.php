<?php
/**
 * Created by PhpStorm.
 * User: 51545
 * Date: 2019/12/25
 * Time: 11:10
 */

namespace app\portal\controller;


use app\portal\model\PortalCaseModel;
use app\portal\model\PortalCategoryModel;
use app\portal\model\PortalDesignerModel;
use cmf\controller\HomeBaseController;

class CaseController extends HomeBaseController
{

    public function index()
    {
        $id  = $this->request->param('id', 0, 'intval');
        $portalCategoryModel = new PortalCategoryModel();
        $category = $portalCategoryModel->where('status', 1)->find();
        $this->assign('category', $category);

        //$listTpl = empty($category['list_tpl']) ? 'list' : $category['list_tpl'];

        return $this->fetch(':cases');
    }

    public function content()
    {
        $id  = $this->request->param('id', 0, 'intval');

        $case = new PortalCaseModel();
        $caseData = $case->getDesignerCasePhotos($id);

        $interrelatedCase = $case->getInterrelatedCase($caseData['did']['id']);

        $designer = new PortalDesignerModel();
        $designerInfo = $designer->findDesigner($caseData['did']['id']);

        //this is case photos
        $this->assign('casePhotos',json_decode($caseData['more'],true));
        //this is case info
        $this->assign('caseInfo',$caseData);
        //this is case interrelated
        $this->assign('interrelatedCase',$interrelatedCase);
        //this is designer info
        $this->assign('designerInfo',$designerInfo);

        return $this->fetch(':case_content');
    }
}