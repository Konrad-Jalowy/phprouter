<?php
class HomeController {

    public function index(){
        loadView('index');
    }
    public function single($id){
        echo "showing single item with id: $id </br>";
    }
};