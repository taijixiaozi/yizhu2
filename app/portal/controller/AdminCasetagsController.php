<?php
/**
 * Created by PhpStorm.
 * User: 51545
 * Date: 2019/12/24
 * Time: 11:42
 */

namespace app\portal\controller;


use app\portal\model\PortalCasetagsModel;
use app\portal\model\PortalSubCasetagsModel;
use cmf\controller\AdminBaseController;
use think\Request;

class AdminCasetagsController extends AdminBaseController
{
    /**
     * 主风格列表展示
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function mainindex()
    {
        $portalCasetagsModel = new PortalCasetagsModel();
        $caseTags           = $portalCasetagsModel->paginate(10);
        $this->assign("caseTags", $caseTags);
        $this->assign('page', $caseTags->render());
        return $this->fetch();
    }

    /**
     * 添加主风格
     */
    public function mainadd()
    {
        if($this->request->isPost()){
            $arrData = $this->request->param();
            $portalCasetagsModel = new PortalCasetagsModel();
            $res = $portalCasetagsModel->isUpdate(false)->allowField(true)->save($arrData['post']);
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
     * 添加主风格
     */
    public function mainedit($id = '')
    {
        //主风格的model
        $portalCasetagsModel = new PortalCasetagsModel();
        //如果是post的话那么就开始进行更新操作
        if($this->request->isPost()) {
            $arrData = $this->request->param();
            $res = $portalCasetagsModel->isUpdate(true)->allowField(true)->save($arrData['post']);
            //判断是否存入成功
            if(!$res){
                $this->success(lang("ADD_FAILED"));
            }else{
                $this->success(lang("ADD_SUCCESS"));
            }
        }
        //查出主风格对应id的数据
        $data = $portalCasetagsModel->where(["id"=>$id])->find();
        //委派变量
        $this->assign("maintag",$data);
        return $this->fetch();
    }
    /**
     * 子风格列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function subindex()
    {
        $portalSubCasetagsModel = new PortalSubCasetagsModel();
        $subCaseTags           = $portalSubCasetagsModel->paginate(10);
        $this->assign("subCaseTags", $subCaseTags);
        $this->assign('page', $subCaseTags->render());
        return $this->fetch();
    }

    /**
     * 子风格添加
     * @return mixed
     */
    public function subadd()
    {
        if($this->request->isPost()) {
            $arrData = $this->request->param();
            $portalSubCasetagsModel = new PortalSubCasetagsModel();
            $res = $portalSubCasetagsModel->isUpdate(false)->allowField(true)->save($arrData['post']);
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
     * 选择主风格
     * @return mixed
     */
    public function select()
    {
        $ids                 = $this->request->param('ids');
        $selectedIds         = explode(',', $ids);
        $portalCasetagsModel = new PortalCasetagsModel();

        $tpl = <<<tpl
<tr class='data-item-tr'>
    <td>
        <input type='checkbox' class='js-check' data-yid='js-check-y' data-xid='js-check-x' name='ids[]'
               value='\$id' data-name='\$name'>
    </td>
    <td>\$id</td>
    <td>\$spacer \$name</td>
</tr>
tpl;

        $caseTagsTree = $portalCasetagsModel->adminCasetagsTableTree($selectedIds, $tpl);
        $caseTags = $portalCasetagsModel->select();
        $this->assign('caseTags', $caseTags);
        $this->assign('selectedIds', $selectedIds);
        $this->assign('caseTagsTree', $caseTagsTree);
        return $this->fetch();
    }

    public function selectalltags()
    {
        $portalCasetagsModel = new PortalCasetagsModel();
        $tags = $portalCasetagsModel->getAllTags();
        $this->assign("tags",$tags);
        return $this->fetch();
    }
}