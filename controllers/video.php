<?php

class Video extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array(
            'video/js/modernizr.custom.17475.js',
            'video/js/jquerypp.custom.js',
            'video/js/jquery.elastislide.js',
            'video/js/jquery.masonry.js',
            'video/js/jquery.ez-bg-resize.js',
            'video/js/custom.js');
    }
    function index() {
        $this->view->msg = 'This page doesnt exist';
        $this->view->render('error/index'); 
    }
    public function view($url,$pic=true) {
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('video/index');
    }
    

}