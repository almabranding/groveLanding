<?php

class Gallery extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('gallery/js/jquery.ez-bg-resize.js','gallery/js/sly.js','gallery/js/custom.js');
        //$this->view->css = array('gallery/css/horizontal.css');
    }
    
    function index() {
        $this->view->render('gallery/index');
    }
    
}