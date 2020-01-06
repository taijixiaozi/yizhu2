<?php
/**
 * Created by PhpStorm.
 * User: 51545
 * Date: 2019/12/25
 * Time: 11:10
 */

namespace app\portal\controller;


use app\portal\model\PortalCasetagsModel;
use app\portal\model\PortalCategoryModel;
use cmf\controller\HomeBaseController;

class CaseController extends HomeBaseController
{

    public function index()
    {
        $id                  = $this->request->param('id', 0, 'intval');
        //实例化案例标签类
        $tagsModel = new PortalCasetagsModel();
        $allTags = $tagsModel->getAllTags();
        //委派变量
        $this->assign('tags', $allTags);

        return $this->fetch('/cases');
    }

    public function content()
    {
        $id  = $this->request->param('id', 0, 'intval');
        return $this->fetch(':case_content');
    }
}