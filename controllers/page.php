<?php

class Page extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('page/js/custom.js');
    }
    
    function index() {
        $this->view->msg = 'This page doesnt exist';
        $this->view->render('error/index');
    }
    function view($url) {
        $this->model->url=$url;
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->render('page/index');
    }
    
}