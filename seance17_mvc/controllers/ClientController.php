<?php
namespace App\Controllers;
use App\Models\Client;
use App\Models\City;
use App\Providers\View;
use App\Providers\Validator;

class ClientController {
    
    public function index(){
       $client = new Client;

       $clients = $client->select('name');
       if($clients){
            //include('views/client/index_old.php');

            return View::render('client/index', ['clients'=>$clients]);
       }else{
        echo "error";
       }
    }

     public function show($data =[]){
        if(isset($data['id']) && $data['id']!=null){
            $client = new Client;
            $selectId = $client->selectId($data['id']);
            if($selectId){
                return View::render('client/show', ['client'=> $selectId]);
            } else {
                return View::render('error', ['msg'=>'Could not find this client']);
            }
        }
        return View::render('error');
    }

    public function create(){
        $city = new City;
        $cities = $city->select('city');

        return View::render('client/create', ['cities'=>$cities]);
    }

    public function store($data){
      // print_r($data);
       $validator = new Validator;
       $validator->field('name', $data['name'])->min(2)->max(10);
       $validator->field('address', $data['address'])->required();
       $validator->field('phone', $data['phone'])->required();
       $validator->field('zip_code', $data['zip_code'], 'Zip Code')->required();
       $validator->field('email', $data['email'])->required();
       $validator->field('city_id', $data['city_id'], 'City')->required()->number();
       
       if($validator->isSuccess()){
            $client = new Client;
            $insert = $client->insert($data); 
    
            if($insert){
                return View::redirect('clients');
            }else{
                return View::render('error');
            }
       }else{
        $errors = $validator->getErrors();
        // print_r( $errors);
        $city = new City;
        $cities = $city->select('city');

        return View::render('client/create', ['errors'=>$errors, 'inputs'=>$data, 'cities'=>$cities]);
       }

    }

    public function edit($data =[]){
        if(isset($data['id']) && $data['id']!=null){

            $client = new Client;
            $selectId = $client->selectId($data['id']);
            if($selectId){
                $city = new City;
                $cities = $city->select('city');
                //print_r($selectId);
                return View::render('client/edit', ['cities'=>$cities, 'inputs'=>$selectId]);
            }
        }
        return View::render('error');
    }

    public function update($data = [], $get = []){
        if(isset($get['id']) && $get['id']!=null){
            $validator = new Validator;
            $validator->field('name', $data['name'])->min(2)->max(10);
            $validator->field('address', $data['address'])->required();
            $validator->field('phone', $data['phone'])->required();
            $validator->field('zip_code', $data['zip_code'], 'Zip Code')->required();
            $validator->field('email', $data['email'])->required();
            $validator->field('city_id', $data['city_id'], 'City')->required()->number();
            
            if($validator->isSuccess()){
                $client = new Client;
                $update = $client->update($data, $get['id']);

               if($update){
                return View::redirect('client/show?id='.$get['id']);
               }

            }else{
                $errors = $validator->getErrors();
                // print_r( $errors);
                $city = new City;
                $cities = $city->select('city');
        
                return View::render('client/edit', ['errors'=>$errors, 'inputs'=>$data, 'cities'=>$cities]);
            }
        }
        return View::render('error');

    }

    public function delete($data){
        $client = new Client;
        $delete = $client->delete($data['id']);
        if($delete){
            return View::redirect('clients');
        }
        return View::render('error');
    }
}

?>