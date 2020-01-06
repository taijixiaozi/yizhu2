<?php
/**
 * Created by PhpStorm.
 * User: 51545
 * Date: 2019/12/25
 * Time: 14:17
 */

namespace app\portal\controller;
use app\portal\model\PortalCaseModel;
use cmf\controller\AdminBaseController;

class AdminCaseController extends AdminBaseController
{
    /**
     * 案例管理列表
     */
    public function index()
    {
        $portalCaseModel = new PortalCaseModel();
        $cases = $portalCaseModel->select()->toArray();
        $this->assign("cases",$cases);
        return $this->fetch();
    }

    public function add()
    {
        if($this->request->isPost()) {
            $arrData = $this->request->param();

            $arrData['post']['thumbnail'] = $arrData['post']['more']['thumbnail'];
            if (!empty($arrData['photo_names']) && !empty($arrData['photo_urls'])) {
                $arrData['post']['more']['photos'] = [];
                foreach ($arrData['photo_urls'] as $key => $url) {
                    $photoUrl = cmf_asset_relative_url($url);
                    array_push($arrData['post']['more']['photos'], ["url" => $photoUrl, "name" => $arrData['photo_names'][$key]]);
                }
            }
            //这个地方进行json数组的转换
            $arrData['post']['more'] = json_encode($arrData['post']['more']);
            $arrData['post']['create_time'] = time();
            $portalCaseModel = new PortalCaseModel();
            $res = $portalCaseModel->isUpdate(false)->allowField(true)->save($arrData['post']);
            //判断是否存入成功
            if(!$res){
                $this->success(lang("ADD_FAILED"));
            }else{
                $this->success(lang("ADD_SUCCESS"));
            }
        }
        return $this->fetch();
    }

    public function edit($id = '')
    {
        //设计师的model
        $portalCaseModel = new PortalCaseModel();
        //如果是post的话那么就开始进行更新操作
        if($this->request->isPost()) {
            $arrData = $this->request->param();
            $arrData['post']['thumbnail'] = $arrData['post']['more']['thumbnail'];
            if (!empty($arrData['photo_names']) && !empty($arrData['photo_urls'])) {
                $arrData['post']['more']['photos'] = [];
                foreach ($arrData['photo_urls'] as $key => $url) {
                    $photoUrl = cmf_asset_relative_url($url);
                    array_push($arrData['post']['more']['photos'], ["url" => $photoUrl, "name" => $arrData['photo_names'][$key]]);
                }
            }
            //这个地方进行json数组的转换
            $arrData['post']['more'] = json_encode($arrData['post']['more']);
            $arrData['post']['update_time'] = time();
            //发布时间必须进行时间戳转化
            $arrData['post']['update_time'] = strtotime($arrData['post']['create_time']);
            //保存操作
            $res = $portalCaseModel->isUpdate(true)->allowField(true)->save($arrData['post']);
            //判断是否存入成功
            if(!$res){
                $this->success(lang("ADD_FAILED"));
            }else{
                $this->success(lang("ADD_SUCCESS"));
            }
        }
        //查出设计师的数据对应id的数据
        $data = $portalCaseModel->where(["id"=>$id])->find()->toArray();
        $data['more'] = json_decode($data["more"],true);
        //委派变量
        $this->assign("case",$data);
        return $this->fetch();
    }
}