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
}