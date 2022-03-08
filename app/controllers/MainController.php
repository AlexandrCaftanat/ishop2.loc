<?php

namespace app\controllers;

use ishop\App;

class MainController extends AppController {


    public function indexAction()
    {
        $posts = \R::findAll('test');
       // debug($posts);

        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание', 'Ключивики');
        $age = 32;
        $name = 'Александр';
        $this->set(compact('name','age', 'posts'));

    }

}