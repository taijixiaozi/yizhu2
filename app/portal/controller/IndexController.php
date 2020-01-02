<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2019 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;

class IndexController extends HomeBaseController
{
    //主页
    public function index()
    {
        return $this->fetch(':index');
    }

    //案例页面
    public function villa_project()
    {
        return 'false';
        return $this->fetch(':villa_project');
    }

    //设计师页面
    public function designer()
    {
        return $this->fetch(':designer');
    }

    //施工工艺
    public function crafts()
    {
        return $this->fetch(':crafts');
    }

    //施工管理
    public function management()
    {
        return $this->fetch(':management');
    }

    //服务流程
    public function circuit()
    {
        return $this->fetch(':circuit');
    }

    //装修材料
    public function material()
    {
        return $this->fetch(':material');
    }

    //预约服务
    public function reservation()
    {
        return $this->fetch(':reservation');
    }


    //装修问答
    public function advisory()
    {
        return $this->fetch(':advisory');
    }

    //客户评价
    public function evaluate()
    {
        return $this->fetch(':evaluate');
    }

    //装修百科
    public function encyclopedia()
    {
        return $this->fetch(':encyclopedia');
    }

    //企业文化
    public function companyCulture()
    {
        return $this->fetch(':companyCulture');
    }

    //乂筑优势
    public function yzSuperiority()
    {
        return $this->fetch(':yzSuperiority');
    }

    //品牌历程
    public function brandHistory()
    {
        return $this->fetch(':brandHistory');
    }

    //招聘资讯
    public function recruitmentInformation()
    {
        return $this->fetch(':recruitmentInformation');
    }
}
