<?php

namespace app\controllers;

use ishop\App;
use ishop\Cache;

class MainController extends AppController {


    public function indexAction()
    {
        $posts = \R::findAll('test');
       // debug($posts);

        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание', 'Ключивики');
        $age = 32;
        $name = 'Александр';
//        $lang = ['java', 'php', 'c#', 'javascript'];
//        $cache = Cache::instance();
//        $cache->set('test', $lang);
//        $data = $cache->get('test');
//        $cache->delete('test');
//        debug($data);
        $this->set(compact('name','age', 'posts'));

    }

}