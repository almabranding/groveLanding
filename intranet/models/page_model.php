<?php
class Page_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function form($type='add',$id='null') {
        $action=($type=='add')?URL.'page/create':URL.'page/edit/'.$id;
        if ($type=='edit')
            foreach ($this->getInfo($id) as $project);
        $atributes=array(
            'enctype'    => 'multipart/form-data',
        );
        $form = new Zebra_Form('addProject','POST',$action,$atributes);
        
        $form->add('hidden', '_add', 'project');

        $form->add('label', 'label_name', 'name', 'Name');
        $form->add('text', 'name', $project['name'], array('autocomplete' => 'off','required'  =>  array('error', 'Name is required!')));
        
        $form->add('label', 'label_template', 'template', 'Template');
        $obj = $form->add('select', 'template', $project['template'], array('autocomplete' => 'off'));
        foreach($this->getTemplate() as $key => $value) {
            $menu[$value['id']]=$value['name'];
        }
        $obj->add_options($menu);
        
        $form->add('label', 'label_menu', 'menu', 'Menu');
        $obj = $form->add('select', 'menu', $project['menu'], array('autocomplete' => 'off'));
        foreach($this->getMenu() as $key => $value) {
            $menu[$value['id']]=$value['name'];
        }
        $obj->add_options($menu);

        $form->add('label', 'label_description', 'description', 'Description');
        $obj=$form->add('textarea', 'description', $project['description'], array('autocomplete' => 'off'));

        if($type=='edit'){
            $obj=$form->add('label', 'label_content', 'content', 'Content');
            $obj->set_attributes(array(
                'style'    => 'float:none',
            ));
            $obj=$form->add('textarea', 'content', $project['content'], array('autocomplete' => 'off'));
            $obj->set_attributes(array(
                'class'    => 'wysiwyg',
            ));
        }
        
        
        $form->add('submit', '_btnsubmit', 'Submit');
        $form->validate();
        return $form;
    }
    
    public function getList() {
        $lista=$this->db->select("SELECT * FROM page");
        $b[0]=array(
           array(
               "value"  =>"Id",
               "width"  =>"5%"
           ),array(
               "value"  =>"Name",
               "width"  =>"10%"
           ),array(
               "value"  =>"Template",
               "width"  =>"20%"
           ),array(
               "value"  =>"Menu",
               "width"  =>"20%"
           ),array(
               "value"  =>"Description",
               "width"  =>"20%"
           ),array(
               "value"  =>"Options",
               "width"  =>"10%"
           ));
                     
        foreach($lista as $key => $value) {
            $b[]=
            array(
                "id"  =>$value['id'],
                "name"  =>$value['name'],
                "template"  =>$this->gettemplate($value['template'],'name'),
                "Menu"  =>$this->getMenu($value['menu'],'name'),
                "Description"  =>$value['description'],
                "Options"  =>'<a href="'.URL.'page/view/'.$value['id'].'"><div class="edit"></div></a><a href="'.URL.'page/delete/'.$value['id'].'"><div class="delete"></div></a>'
            );
        }
        return $b;
    }
    public function getInfo($id){
         $consulta=$this->db->select('SELECT * FROM page WHERE id = :id', 
            array('id' => $id));
         return $consulta;
    }
    public function getGallery($id){
         return $this->db->select('SELECT * FROM images WHERE page = :id ORDER by orden', 
            array('id' => $id));
    } 
    
    public function create() {
        
        $data = array(
            'name' => $_POST['name'],
            'template' => $_POST['template'],
            'description' => $_POST['description'],
            'url' => filter_var(urlencode(strtolower($_POST['name'])), FILTER_SANITIZE_URL)
        );
        $page=$this->db->insert('page', $data);
        $data = array(
            'name' => $_POST['name'],
            'url' => $url = filter_var(urlencode(strtolower($_POST['name'])), FILTER_SANITIZE_URL),
            'parent' => $_POST['menu'],
            'page' => $page
        );
        $this->db->insert('menu', $data);
    }
    public function edit($id){
        $data = array(
            'name' => $_POST['name'],
            'template' => $_POST['template'],
            'description' => $_POST['description'],
            'content' => stripslashes($_POST['content']),
            'url' => urlencode(strtolower($_POST['name'])),
            'menu' => $_POST['menu']
        );
        $this->db->update('page', $data, 
            "`id` = '{$id}'");
            
        $data = array(
            'name' => $_POST['name'],
            'url' => urlencode(strtolower($_POST['name'])),
            'parent' => $_POST['menu']
        );
        $this->db->update('menu', $data, 
            "`page` = '{$id}'");
    }
    public function delete($id){
        $this->db->delete('page', "`page` = {$id}");
         $this->db->delete('page', "`id` = {$id}");
         $this->delTree(UPLOAD.$id);
    }   
    public function sort(){
        foreach($_POST['foo'] as $key=>$value){
            $data = array(
                'orden' => $key
            );
             $this->db->update('images', $data, 
            "`id` = '{$value}'");
        }
        exit;
    }   
}