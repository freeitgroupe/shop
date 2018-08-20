<?php
namespace app\models;

class User extends AppModel {

    //поля из формы для валидации
    public $attributes = [
        'reg_email' => '',
        'reg_pass' => '',
        'reg_pass_again' => '',
    ];

    //Массив правил валидации
    public $rules = [
        'required' => [
            ['email'],
            ['reg_pass'],
            ['reg_pass_again'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['reg_pass', 6],
            ['reg_pass_again', 6],
        ]
    ];

}