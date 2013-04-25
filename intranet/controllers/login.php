<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();    
    }
    
    function index() 
    {    
        $this->view->render('login/index');
    }
    
    function run()
    {
       
        $this->model->run();
    }
    function out()
    {
       
        $this->model->out();
    }
    function error() {
        $this->view->try='User/Password incorrect';
        $this->view->render('login/index',true);
    }
    

}