<?php
class HomeController {

    public function index(){
        echo "index method called </br>";
    }
    public function single($id){
        echo "showing single item with id: $id </br>";
    }
};