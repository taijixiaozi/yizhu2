<?php
namespace app\portal\controller;

use cmf\controller\HomeBaseController;
use think\Db;
use think\Request;

class ReservationController extends HomeBaseController{
    public function reservation(Request $request)
    {

        if($request->isAjax()){
            $name=input('name');
            $name=input('plot_name');
            $name=input('house_area');
            $name=input('user_phone');
            Db::table('yz_reservation')->insert($name);
       }
        return 111;
    }
}