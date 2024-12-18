<?php
class HomeController {

    public function index(){
        loadView('index');
    }
    public function single($id){
        loadView('single');
    }
};