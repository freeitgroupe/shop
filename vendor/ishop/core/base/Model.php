<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.06.2018
 * Time: 15:54
 */

namespace ishop\base;


abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct(){

        
    }

}