<?php

class uploadFile extends Controller {

    function __construct() {
        parent::__construct();
    }
    function upload($project=0) {
       $page=$this->model->getPageInfo($project);
       $img=$this->model->upload($project);
       $img['video']=($page[0]['template']==4)?'1':0;
       $this->model->insertImg($img,$project);
    }
    function crop() {
       $this->model->crop();
       header('location: ' . URL . 'image/view/'.$_POST['id']);
    }
}