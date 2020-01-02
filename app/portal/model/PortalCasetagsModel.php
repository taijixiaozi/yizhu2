<?php
/**
 * Created by PhpStorm.
 * User: 51545
 * Date: 2019/12/24
 * Time: 12:08
 */

namespace app\portal\model;


use Couchbase\TermRangeSearchQuery;
use think\Model;
use tree\Tree;

class PortalCasetagsModel extends Model
{

    public function subtag()
    {
        return $this->hasMany("PortalSubCasetagsModel","tid","id");
    }
    public function adminCasetagsTableTree($currentIds = 0, $tpl = '')
    {
        $caseTags = $this->select()->toArray();
        $tree       = new Tree();
        $tree->icon = ['&nbsp;&nbsp;│', '&nbsp;&nbsp;├─', '&nbsp;&nbsp;└─'];
        $tree->nbsp = '&nbsp;&nbsp;';

        if (!is_array($currentIds)) {
            $currentIds = [$currentIds];
        }
        $tree->init($caseTags);
        if (empty($tpl)) {
            $tpl = "<tr id='node-\$id' style='\$style'  data-id='\$id'>
                        <td style='padding-left:20px;'>
                        <input type='checkbox' class='js-check' data-yid='js-check-y' data-xid='js-check-x' name='ids[]' value='\$id' data-parent_id='\$parent_id' data-id='\$id'>
                        </td>
                        <td><input name='list_orders[\$id]' type='text' size='3' value='\$list_order' class='input-order'></td>
                        <td>\$id</td>
                        <td>\$spacer <a href='\$url' target='_blank'>\$name</a></td>
                        <td>\$description</td>
                        <td>\$status_text</td>
                        <td>\$str_action</td>
                    </tr>";
        }
        $treeStr = $tree->getNewTree(0, $tpl);
        return $treeStr;
    }

    public function getAllTags()
    {
        return self::with(["subtag"])->select()->toArray();
    }
}