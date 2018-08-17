<?php

namespace app\controllers;


class SearchController extends AppController
{
    public function typeaheadAction(){
        if($this->isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if($query){
                $products = \R::getAll('SELECT id, title, alias FROM products WHERE title LIKE ? AND mark_view = ? LIMIT 11', ["%{$query}%", '1']);
                echo json_encode($products);
            }
        }
        die;
    }

    public function indexAction(){
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if($query){
            $products = \R::find('products', "title LIKE ? AND mark_view = ?", ["%{$query}%", '1']);
        }
        $query = h($query);
        $this->setMeta('Search: ' . $query);
        $this->set(compact('products', 'query'));
    }



}