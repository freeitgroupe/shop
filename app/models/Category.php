<?php
/**
 * Created by PhpStorm.
 * User: admin2
 * Date: 19.08.2018
 * Time: 22:35
 */

namespace app\models;
use ishop\App;

class Category extends AppModel
{
    public function getIds($id){
        $cats = App::$app->getProperty('cats');
        $ids = null;
        foreach($cats as $k => $v){
            if($v['parent'] == $id){
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }
        return $ids;
    }

    //Формирование дерева категорий
    public function getTreeCategory($data){
        $tree = [];
        foreach ($data as $id=>&$node){
            if(!$node['parent']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    public function cats_info($ids, $id = false){
        if(!$ids) return false;
        $query = "SELECT * FROM category WHERE `view` = '1' AND parent IN($ids)";
        //echo $query;
        $res = \R::getAll($query);
        if(!$res) return false;
        $data=[];
        foreach ($res as $k=>$v){
            $data[$v['alias']] = $v['title'];
        }
        return $res;
    }

    public function catsAllLevel($arrBreadcrumbs, $cats_info){
        $result =[];
        if(is_array($arrBreadcrumbs) && is_array($cats_info)){
            $result = array_merge ($arrBreadcrumbs, $cats_info);
        }
        if(!is_array($cats_info)){
            $result = $arrBreadcrumbs;
        }
        $data_arr = [];
        $result = (array)$result;
        foreach ($result as $item){
            $data_arr[$item['id']]=$item;
        }
        return $data_arr;
    }

    public function catsAllLineChilds($array, $id=false){
        if(!$id) return false;
        //debug_arr($array);
        $count = count($array);
        $breadcrumbs_array = [];
        for($i = 0; $i < $count; $i++){
            if(isset($array[$id])){
                $breadcrumbs_array[$array[$id]['id']] = $array[$id];
                $id = $array[$id]['parent'];
            }else break;
        }
        //return debug_arr($breadcrumbs_array);
        return array_reverse($breadcrumbs_array, true);
    }
}