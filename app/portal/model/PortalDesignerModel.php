<?php
/**
 * Created by PhpStorm.
 * User: 51545
 * Date: 2019/12/31
 * Time: 16:31
 */

namespace app\portal\model;


use think\Model;

class PortalDesignerModel extends Model
{
    public static function findDesigner($id){
        return self::where(['id'=>$id])->find()->toArray();
    }

    public static function allDesigner(){
        return self::order('id', 'desc')->paginate(1);
    }
}