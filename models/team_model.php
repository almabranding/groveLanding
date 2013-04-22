<?php
class Team_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function addProject() {
        $addProject = new Zebra_Form('addProject','POST',URL.'project/create');
        
        $obj = $addProject->add('hidden', '_add', 'project');

        $addProject->add('label', 'label_name', 'name', 'Name');
        $obj = $addProject->add('text', 'name', '', array('autocomplete' => 'off','required'  =>  array('error', 'Name is required!')));
        
        $addProject->add('label', 'label_menu', 'menu', 'Menu');
        $obj = $addProject->add('select', 'menu', '', array('autocomplete' => 'off'));
        foreach($this->getMenu() as $key => $value) {
            $menu[$value['id']]=$value['name'];
        }
        $obj->add_options($menu);
        
        $addProject->add('label', 'label_info', 'info', 'Information');
        $obj = $addProject->add('textarea', 'info', '', array('autocomplete' => 'off'));

        $addProject->add('submit', '_btnsubmit', 'Submit');
        $addProject->validate();
        return $addProject;
    }
    public function editProject($id) {
        $project=$this->viewProject($id);
        $addProject = new Zebra_Form('addProject','POST',URL.'project/create');
        
        $obj = $addProject->add('hidden', '_add', 'project');

        $addProject->add('label', 'label_name', 'name', 'Name');
        $obj = $addProject->add('text', 'name', $project[0]['name'], array('autocomplete' => 'off','required'  =>  array('error', 'Name is required!')));
        
        $addProject->add('label', 'label_menu', 'menu', 'Menu');
        $obj = $addProject->add('select', 'menu', '', array('autocomplete' => 'off'));
        foreach($this->getMenu() as $key => $value) {
            $menu[$value['id']]=$value['name'];
        }
        $obj->add_options($menu);
        
        $addProject->add('label', 'label_info', 'info', 'Information');
        $obj = $addProject->add('textarea', 'info', $project[0]['info'], array('autocomplete' => 'off'));

        $addProject->add('submit', '_btnsubmit', 'Submit');
        $addProject->validate();
        return $addProject;
    }
  /*  public function editImage($id) {
        $addProject = new Zebra_Form('addProject','POST',URL.'project/create');
        
        $obj = $addProject->add('hidden', '_add', 'project');

        $addProject->add('label', 'label_name', 'name', 'Name');
        $obj = $addProject->add('text', 'name', $id, array('autocomplete' => 'off','required'  =>  array('error', 'Name is required!')));
        
        $addProject->add('label', 'label_info', 'info', 'Information');
        $obj = $addProject->add('textarea', 'info', $id, array('autocomplete' => 'off'));

        $addProject->add('submit', '_btnsubmit', 'Submit');
        $addProject->validate();
        $addProject->render();
    }*/
    
    public function projectList() {
        $lista=$this->db->select("SELECT id,name,menu FROM project");
        $b[0]=array(
           array(
               "value"  =>"Id",
               "width"  =>"10%"
           ),array(
               "value"  =>"Name",
               "width"  =>"20%"
           ),array(
               "value"  =>"Menu",
               "width"  =>"20%"
           ),array(
               "value"  =>"Description",
               "width"  =>"20%"
           ),array(
               "value"  =>"Options",
               "width"  =>"20%"
           ));
                     
        foreach($lista as $key => $value) {
            $b[]=
            array(
                "id"  =>$value['id'],
                "name"  =>$value['name'],
                "password"  =>$value['id'],
                "port"  =>$value['id'],
                "port2"  =>'<a href="'.URL.'project/edit/'.$value['id'].'"><div class="edit"></div></a><a href="'.URL.'project/delete/'.$value['id'].'"><div class="delete"></div></a>'
            );
        }
        return $b;
    }
    public function createProject($data) {
        $this->db->insert('project', array(
            'name' => $data['name'],
            'info' =>  $data['info'],
            'menu' => $data['menu']
        ));
    }
    public function deleteProject($id){
         $this->db->delete('project', "`id` = {$id}");
         $this->delTree(UPLOAD.$id);
    }
    public function viewProject($id){
         return $this->db->select('SELECT * FROM project WHERE id = :id', 
            array('id' => $id));
    }
    public function picsProject($id){
         return $this->db->select('SELECT * FROM images WHERE project = :id', 
            array('id' => $id));
    }
    public function selectImg($id){
         return $this->db->select('SELECT * FROM images WHERE id = :id', 
            array('id' => $id));
    }
    public function delImg($id){
         $img=$this->db->select('SELECT * FROM images WHERE id = :id', 
            array('id' => $id));
         $this->db->delete('images', "`id` = {$id}");
         unlink(UPLOAD.$img[0]['project'].'/'.$img[0]['img']);
    }
    
    
}