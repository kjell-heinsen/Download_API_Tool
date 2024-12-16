<?php
namespace downapitool\app\controllers;
use downapitool\app\core\controller;
use downapitool\app\helpers\url;


class add extends controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        url::redirect('',303);
    }
}

