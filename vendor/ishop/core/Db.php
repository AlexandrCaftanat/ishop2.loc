<?php

namespace ishop;

class Db{

    use Tsingletone;

    protected function __construct(){
        $db = require_once CONF . '/db_config.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['password']);
        if (!\R::testConnection()){
            throw new \Exception("Нет соидения с Бд", 500);
        }
        \R::freeze(true);
        if (DEBUG){
            \R::debug(true, 1);
        }

    }

}