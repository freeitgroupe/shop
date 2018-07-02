<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.06.2018
 * Time: 15:54
 */

namespace ishop\base;
use ishop\Db;

abstract class Model
{
    public $attributes = [];// for table from db
    public $errors = [];//for err
    public $rules = [];//for validation data

    public function __construct()
    {
        Db::instance();

    }

}