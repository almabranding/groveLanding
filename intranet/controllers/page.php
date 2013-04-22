<?php

class Page extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('page/js/custom.js');
    }
    function index() { 
        $this->view->form = $this->model->form();
        $this->view->projectList = $this->model->getList();
        $this->view->render('page/index');  
    }
    public function view($id) 
    {
        $this->view->id=$id;
        $this->view->form=$this->model->form('edit',$id);
        $this->view->Gallery=$this->model->getGallery($id);
        $this->view->render('page/view');  
    }
    public function create() 
    {
        $this->model->create();
        header('location: ' . URL . 'page');
    }
    public function edit($id) 
    {
        $this->model->edit($id);
        header('location: ' . URL . 'page');
    }
    public function delete($id) 
    {
        $this->model->delete($id);
        header('location: ' . URL . 'page');
    }
    public function sort() 
    {
        $this->model->sort();
    }
}