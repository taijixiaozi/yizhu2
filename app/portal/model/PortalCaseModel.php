<?php
/**
 * Created by PhpStorm.
 * User: 51545
 * Date: 2020/1/1
 * Time: 20:43
 */

namespace app\portal\model;


use think\Db;
use think\Model;

class PortalCaseModel extends Model
{
    /**
     * 这个是did取出
     * @param $value
     * @param $data
     */
    public function getDidAttr($value){
        //用设计师id去查询设计师
        $designer = PortalDesignerModel::findDesigner($value);
        //返回设计师id与name
        return ['id'=>$value,'name'=>$designer['name']];
    }

    /**
     * this is Cose info
     * @param $id
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getDesignerCasePhotos($id)
    {
        return self::where('id',$id)->find()->toArray();
    }


    public static function getInterrelatedCase($id)
    {
        return self::where('did',$id)->field('id,thumbnail,name')->select()->toArray();
    }

    public static function queryCase()
    {
        return self::where('is_recommend', '1')->select()->toArray();
    }
}