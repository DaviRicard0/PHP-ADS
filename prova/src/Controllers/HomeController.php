<?php

namespace php\projeto\Controllers;

class HomeController {
    public function index(){
        require_once("../src/Views/home/index.html");
    }
}