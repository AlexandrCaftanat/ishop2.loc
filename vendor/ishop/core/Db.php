<?php

namespace ishop;

class Db{

    use Tsingletone;

    protected function __construct(){
        $db = require_once CONF . '/db_config.php';
    }

}