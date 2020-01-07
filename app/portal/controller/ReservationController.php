<?php
namespace app\portal\controller;

use app\portal\model\ReservationModel;
use cmf\controller\HomeBaseController;

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
                'create_time' => time(),
                'status' => 1
            ];
            $reservation = new ReservationModel();
            if ($reservation->insert($data)) {
                return $data = 1;
            }else{
                return $data = 2;
            }
       } else {
            return false;
        }
    }
}