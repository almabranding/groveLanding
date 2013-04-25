<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/jquery.ez-bg-resize.js','index/js/custom.js');
    }
    
    function index() {
        $this->view->render('index/index');
    }
    
}