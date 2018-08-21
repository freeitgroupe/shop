<?php

namespace ishop\base;

use ishop\Db;
use Valitron\Validator;

abstract class Model{

    public $attributes = [];
    public $attrMatchCheck = [];
    public $errors = [];
    public $rules = [];

    public function __construct(){
        Db::instance();
    }

    //Загрузка данных из формы в модель на ообработку
    public function load($data){
        foreach($this->attributes as $name => $value){
            if(isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    //Сохраняем данные
    public function save($table){
        $tbl = \R::dispense($table);
        foreach ($this->attributes as $name=>$value){
            $tbl->$name = $value;
        }
        //возвращает id записи из бд
        return \R::store($tbl);
    }


    //Валидация данных
    public function validate($data){
        Validator::langDir(WWW . '/validator/lang');
        Validator::lang('en');
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }
    //Формирование ошибок
    public function getErrors(){
        $errors = '<ul>';
        foreach($this->errors as $error){
            foreach($error as $item){
                $errors .= "<li>$item</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }

}