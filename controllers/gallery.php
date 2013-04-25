<?php

class Gallery extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('gallery/js/jquery.ez-bg-resize.js','gallery/js/custom.js');
    }
    
    function index() {
        $this->view->render('gallery/index');
    }
    
}