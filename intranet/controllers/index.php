<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->render('login/index',true);
    }
    
    function details() {
        $this->view->render('index/index');
    }
    
}