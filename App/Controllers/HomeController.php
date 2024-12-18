<?php
class HomeController {

    public function index(){
        Session::onEveryRequestMiddleware();
        loadView('index');
    }
    public function single($id){
        Session::onEveryRequestMiddleware();
        $person = (object)["name" => "Jane Doe $id", "age" => (18+$id), "gender" => "Female"];
        loadView('single', compact('person'));
    }
    public function active(){
        Session::onEveryRequestMiddleware();
        $number = Session::sessions5Minutes();
        loadView('active', compact("number"));
    }
};