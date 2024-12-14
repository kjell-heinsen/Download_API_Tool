<?php
namespace downapitool\app\controllers;

use downapitool\app\core\controller;



class csrf extends Controller
{

public function __construct()
{
parent::__construct();
}


public function index():void{
    $form = json_decode($_POST['formdata']);
    $data['x'] = '';
    $this->_view->render('json_header',$data);
    $status['status'] = 'ok';
    $status['token'] = \downapitool\app\core\csrf::getToken();
    try {

    } catch(\Exception $e){

    }

    echo json_encode($status);


}
}