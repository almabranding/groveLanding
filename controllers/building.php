<?php

class Building extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array(
            'building/js/modernizr.custom.17475.js',
            'building/js/jquerypp.custom.js',
            'building/js/jquery.elastislide.js',
            'building/js/jquery.masonry.js',
            'building/js/jquery.ez-bg-resize.js',
            'building/js/custom.js');
        /*$this->view->js = array(
            'building/js/modernizr.custom.17475.js',
            'building/js/jquery.elastislide.js',
            'building/js/jquery.masonry.min.js',
            'building/js/jquerypp.custom.js',
            'building/js/jquery.ez-bg-resize.js',
            'building/js/custom.js');*/
    }
    
    function index() {
        $this->view->msg = 'This page doesnt exist';
        $this->view->render('error/index'); 
    }
    public function view($url,$pic=true) {
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('building/index');
    }
    

}