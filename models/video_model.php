<?php
class Video_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function viewProject($id){
         return $this->db->select('SELECT * FROM page WHERE id = :id', 
            array('id' => $id));
    }
    public function picsProject($id){
         return $this->db->select('SELECT * FROM images WHERE project = :id', 
            array('id' => $id));
    }
    
    
}