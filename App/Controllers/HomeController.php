<?php
class HomeController {

    public function index(){
        loadView('index');
    }
    public function single($id){
        $person = (object)["name" => "Jane Doe $id", "age" => (18+$id), "gender" => "Female"];
        loadView('single', compact('person'));
    }
};