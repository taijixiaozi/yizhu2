<?php
/**
 * Created by PhpStorm.
 * User: 51545
 * Date: 2019/12/31
 * Time: 10:46
 */

namespace app\portal\controller;


use app\portal\model\PortalDesignerModel;
use cmf\controller\AdminBaseController;
use think\Request;

class AdminDesignerController extends AdminBaseController
{
    public function index()
    {
        $portalDesignerModel = new PortalDesignerModel();
        $designers = $portalDesignerModel->paginate();
        $this->assign("designers",$designers);
        return $this->fetch();
    }

    public function select()
    {

        $portalDesignerModel = new PortalDesignerModel();
        $designers = $portalDesignerModel->select();
        $ids                 = $this->request->param('ids');
        $selectedIds         = explode(',', $ids);
//
//        $caseTagsTree = $portalCasetagsModel->adminCasetagsTableTree($selectedIds, $tpl);
//        $caseTags = $portalCasetagsModel->select();
//        $this->assign('caseTags', $caseTags);
        $this->assign('selectedIds', $selectedIds);
        $this->assign("designers",$designers);
        return $this->fetch();
    }


    /**
     * 添加案例
     * @return mixed
     */
    public function add()
    {
        if($this->request->isPost()) {
            $arrData = $this->request->param();
            $portalDesignerModel = new PortalDesignerModel();
            $res = $portalDesignerModel->isUpdate(false)->allowField(true)->save($arrData['post']);
            //判断是否存入成功
            if(!$res){
                $this->success(lang("ADD_FAILED"));
            }else{
                $this->success(lang("ADD_SUCCESS"));
            }
        }
        return $this->fetch();
    }

    /**
     *
     */
    public function edit($id)
    {
        //设计师的model
        $portalDesignerModel = new PortalDesignerModel();
        //查出设计师的数据对应id的数据
        $data = $portalDesignerModel->where(["id"=>$id])->find();

        //如果是post的话那么就开始进行更新操作
        if($this->request->isPost()) {
            $arrData = $this->request->param();
            $portalDesignerModel = new PortalDesignerModel();
            $res = $portalDesignerModel->isUpdate(false)->allowField(true)->save($arrData['post']);
            //判断是否存入成功
            if(!$res){
                $this->success(lang("ADD_FAILED"));
            }else{
                $this->success(lang("ADD_SUCCESS"));
            }
        }
        //委派变量
        $this->assign("designer",$data);
        return $this->fetch();
    }

}