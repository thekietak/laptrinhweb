<?php
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php

class adminlogin {
    private $db ;
    private $fm ;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format(); 
    }
    public function login_admin($adminuser,$adminpass)   
    {
        $adminuser=$this->fm->validation($adminuser);
        $adminpass=$this->fm->validation($adminpass);

        $adminuser = mysqli_real_escape_string($this->db->link,$adminuser);
        $adminpass = mysqli_real_escape_string($this->db->link,$adminpass);

        if(empty($adminuser)|| empty($adminpass)){
            $alert =" User and pass not empty";
            return $alert ;
        }
        else{
            $query = "SELECT * FROM tb_admin WHERE adminuser='$adminuser' AND adminpass='$adminpass'LIMIT 1" ;
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                Session::set('adminlogin',true);

                
                Session::set('idadmin',$value['id_admin']);
                Session::set('adminuser',$value['adminuser']);
                Session::set('adminname',$value['Name_admin']);
                header('Location:index.php');

            }else{
                $alert =" User and pass not khop";
                return $alert ;
            }
        }
    }
}

?>