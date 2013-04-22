<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/custom.js','index/js/jquery.ez-bg-resize.js');
    }
    
    function index() {
        echo 1; 
        if(Auth::handleLogin()) header('location: '.URL.'building/view/gallery');
        $attr=array(
            'col'=>'name',
            'id' =>'home'
        );
        $template=$this->model->getTemplatebyCol($attr);
        $attr=array(
            'col'=>'template',
            'id' =>$template['id']
        );
        $this->view->page=$this->model->getPageByCol($attr);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);;
        $this->view->render('index/index',true);
    }
    
}