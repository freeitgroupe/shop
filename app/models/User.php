<?php
namespace app\models;

class User extends AppModel {

    //поля из формы для валидации
    public $attributes = [
        'email' => '',
        'pass' => '',
        'ip' => '',
        'code'=>'',
        'datetime'=>''
    ];


    //поля для проверки на совпадение значений
    public $attrMatchCheck = [
        'pass_again'=> '',
    ];

    //Массив правил валидации
    public $rules = [
        'required' => [
            ['email'],
            ['pass']
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['pass', 6]
        ]
    ];

    public function checkUnique(){
        $user = \R::findOne('users', 'email = ?', [$this->attributes['email']]);
        if($user){
            if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'Please enter a valid email!';
            }
            return false;
        }
        return true;
    }

    //Проверка на не соответствие данных в полях
    //dataMatchCheck([$data['pass']], [$data['pass_againe'], ['message for error']])
    public function dataMatchCheck($data=[], $dataArr=[], $mess=[]){
        $keyMess = 0;//считаем ключ для соответствующего сообщения
        foreach ($data as $name=>$value){
            foreach ($dataArr as $k=>$v) {
                if($value != $v){
                    $this->errors['dataMatch'][] = "{$mess[$keyMess]} do not match!";
                }
            }
        $keyMess++;
        }
        if (!array_key_exists('dataMatch',$this->errors)){
            return true;
        }
        return false;
    }

    public function login($isAdmin = false){
        $email = !empty(trim($_POST['email'])) ? trim($_POST['email']) : null;
        $pass = !empty(trim($_POST['pass'])) ? trim($_POST['pass']) : null;
        if($email && $pass){
            if($isAdmin){
                $user = \R::findOne('users', "email = ? AND role = 1", [$email]);
            }else{
                $user = \R::findOne('users', "email = ?", [$email]);
            }
            if($user){
                if(password_verify($pass, $user->pass)){
                    foreach($user as $k => $v){
                        if($k != 'pass') $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
        return false;
    }


}