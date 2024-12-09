<?php
namespace App\Controllers;
use App\Models\User;
use App\Providers\View;
use App\Providers\Validator;

class AuthController {

    public function index(){

        session_start();
        print_r($_SESSION);
        return View::render('login');
    }

    public function store($data){
        $validator = new Validator;
        $validator->field('username', $data['username'])->min(2)->max(50);
        $validator->field('password', $data['password'])->min(6)->max(20);

        if($validator->isSuccess()){
            $user = new User;
            $user = $user->unique('username', $data['username']);

            if($user){
                if(password_verify($data['password'],$user['password'])){
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['privilege_id'] = $user['privilege_id'];
                    $_SESSION['finger_print'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);
                    print_r($_SESSION);
                }else{
                    echo "wrong pass";
                }

            }else{
                echo 'can t find user.';
            }



        }else{
            $errors = $validator->getErrors();
            return View::render('login', ['errors'=>$errors, 'inputs'=>$data]);
        }
    }

}

?>