<?php
/**
 * Created by PhpStorm.
 * User: 51545
 * Date: 2019/12/25
 * Time: 11:10
 */

namespace app\portal\controller;


use app\portal\model\PortalCategoryModel;
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
        return $this->fetch(':case_content');
    }
}