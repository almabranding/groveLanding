<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT * FROM users WHERE 
                name = :name AND passcode = :passcode");
        $sth->execute(array(
            ':name' => $_POST['login'],
            ':passcode' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));
        $data = $sth->fetch();
        $count =  $sth->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            Session::set('userid', $data['userid']);
            header('location: '.URL.'page');
        } else {
            header('location: '.URL.'login/error');
        }
        
    }
    public function out()
    {
        Session::init();
        Session::set('loggedIn', false);
        Session::destroy();
        header('location: '.URL);
        exit;
        
    }
    
}