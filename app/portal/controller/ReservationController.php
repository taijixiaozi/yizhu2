<?php
namespace app\portal\controller;

use cmf\controller\HomeBaseController;
use think\Db;
use think\Request;

class ReservationController extends HomeBaseController{
    public function reservation(Request $request)
    {

        if($request->isAjax()){
            $data = [
                'name' =>  trim(htmlspecialchars(input('name'))),
                'plot_name' => trim(htmlspecialchars(input('plot_name'))),
                'house_area' => trim(htmlspecialchars(input('house_area'))),
                'user_phone' => trim(htmlspecialchars(input('user_phone'))),
            ];

       } else {
            return false;
        }
    }
}