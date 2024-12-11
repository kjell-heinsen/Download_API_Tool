<?php
namespace downapitool\app\core;
use downapitool\app\helpers\database;

class model
{

    protected $_db;
    public function __construct()
    {
        $this->_db = new database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

}