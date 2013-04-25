<?php
class Model {
    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }
    function getPage($url){
        $sth = $this->db->prepare("SELECT * FROM page WHERE url = :url");
        $sth->execute(array(
            ':url' => $url
        ));
        $data = $sth->fetch();
        return $data;
    }
    function getPageById($id){
        $sth = $this->db->prepare("SELECT * FROM page WHERE id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
        $data = $sth->fetch();
        return $data;
    }
    
    function getPageByCol($attr){
        $sth = $this->db->prepare("SELECT * FROM page WHERE ".$attr['col']." = :id");
        $sth->execute(array(
            ':id'  => $attr['id']
        ));
        $data = $sth->fetch();
        return $data;
    }
    function getGallery($id){
        return $this->db->select('SELECT * FROM images WHERE page = :page', 
            array('page' => $id));
    }
    function getTemplate($id){
        $sth = $this->db->prepare("SELECT * FROM template WHERE id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
        $data = $sth->fetch();
        return $data['URL'];
    }
    function getTemplatebyCol($attr){
        $sth = $this->db->prepare("SELECT * FROM template WHERE ".$attr['col']." = :id");
        
        $sth->execute(array(
            ':id'  => $attr['id']
        ));
        $data = $sth->fetch();
        return $data;
    }
    function setLang($lang){
        $this->lang=$lang;
    }
    public function getMenu($url=''){
            $m.='<ul class="header_menu">';
                $m.='<li class="menuTitle"><ul>';
                $m.='<li class="menuOpt">Architecture</li>';
                $m.='<li class="menuOpt">Amenities</li>';
                $m.='<li class="menuOpt">Residences</li>';
                $m.='<li class="menuOpt">Floorplans</li>';
                $m.='<li class="menuOpt">Team</li>';
                $m.='<li class="menuOpt">Inspiration</li>';
                $m.='</ul></li>';
                $m.='<li class="menuTitle"><ul>';
                $m.='<li class="menuOpt">Living</li>';
                $m.='<li class="menuOpt">Area</li>';
                $m.='</ul></li>';
                
        return $m;
    }
    public function ValidarDatos($campo){
	
	//Array con las posibles cabeceras a utilizar por un spammer
	$badHeads = array("Content-Type:",
	"MIME-Version:",
	"Content-Transfer-Encoding:",
	"Return-path:",
	"Subject:",
	"From:",
	"Envelope-to:",
	"To:",
	"bcc:",
	"cc:");
	
	//Comprobamos que entre los datos no se encuentre alguna de
	//las cadenas del array. Si se encuentra alguna cadena se
	//dirige a una página de Forbidden
	foreach($badHeads as $valor){
		
		if(strpos(strtolower($campo), strtolower($valor)) !== false){
			header("HTTP/1.0 403 Forbidden");
			exit;
		}
	
	}
}
}