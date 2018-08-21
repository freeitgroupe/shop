<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController {

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique() || !$user->dataMatchCheck([$data['pass']], [$data['pass_again']], ['Passwords'])){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            }else{
                $user->attributes['pass'] = password_hash($user->attributes['pass'], PASSWORD_DEFAULT);
                $user->attributes['ip'] = $_SERVER['REMOTE_ADDR'];
                $user->attributes['code'] = gen_code(10);
                $user->attributes['datetime'] = date("Y-m-d H:i:s");
                if($user->save('users')){
                    $_SESSION['success'] = 'Success!';
                }else{
                    $_SESSION['error'] = 'Error!';
                }
            }
            redirect();
        }

        $this->setMeta('Signup');
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Success!';
            }else{
                $_SESSION['error'] = 'Email or password are not correct!';
            }
            redirect();
        }
        //debug($_SESSION);
        $this->setMeta('Sign In');
    }


    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }


}