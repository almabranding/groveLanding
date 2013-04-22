<?php

class Map extends Controller {

    function __construct() {
        parent::__construct();
         $this->view->js = array(
            'map/js/modernizr.custom.17475.js',
            'map/js/jquerypp.custom.js',
            'map/js/jquery.elastislide.js',
            'map/js/jquery.masonry.js',
            'map/js/jquery.ez-bg-resize.js',
            'map/js/jquery.smoothzoom.js',
            'map/js/jquery.scrollTo.min.js',
            'map/js/custom.js');
        //$this->view->js = array('map/js/jquery.smoothzoom.js','map/js/custom.js');
        
    }
    function index() {
        $this->view->render('map/index');
    }
    public function view($url,$pic=true) {
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('map/index');
    }
    

}