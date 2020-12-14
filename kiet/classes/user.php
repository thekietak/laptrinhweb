<?php
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php

class user {
    private $db ;
    private $fm ;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format(); 
    }
    public function login_user($user,$pass)   
    {
        $user=$this->fm->validation($user);
        $pass=$this->fm->validation($pass);

        $user = mysqli_real_escape_string($this->db->link,$user);
        $pass = mysqli_real_escape_string($this->db->link,$pass);

        if(empty($user)|| empty($pass)){
            $alert ="<span class='error'>Phải nhập đầy đủ thông tin ! </span>";
            return $alert ;
        }
        else{
            $query = "SELECT * FROM khach_hang WHERE users='$user' AND passwords='$pass' LIMIT 1" ;
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                Session::set('userlogin',true);
                Session::set('id',$value['id']);
                Session::set('user',$value['users']);
                Session::set('name',$value['ten']);
                Session::set('phone',$value['phone']);
                Session::set('email',$value['email']);
                header('Location:index.php');

            }else{
                $alert ="<span class='error'> số điện thoại hoặc mật khẩu không đúng ! </span>";
                return $alert ;
            }
        }
    }
    public function test_user($user1){
        $user1=$this->fm->validation($user1);
        $user1 = mysqli_real_escape_string($this->db->link,$user1);
        $query = "SELECT * FROM khach_hang WHERE users='$user1'" ;
        $result = $this->db->select($query);
        return $result ;

    }
    public function test_pass($pass0){
        $pass0=$this->fm->validation($pass0);
        $pass0 = mysqli_real_escape_string($this->db->link,$pass0);
        $query = "SELECT * FROM khach_hang WHERE passwords ='$pass0'" ;
        $result = $this->db->select($query);
        return $result ;

    }
    public function insert_user($ten,$user1,$sdt,$email,$sex,$pass1,$repass)
    {   $a = $this->test_user($user1);
        $ten=$this->fm->validation($ten);
        $user1=$this->fm->validation($user1);
        $sdt=$this->fm->validation($sdt);
        $mail=$this->fm->validation($email);
        $sex=$this->fm->validation($sex);
        $pass1=$this->fm->validation($pass1);
        $repass=$this->fm->validation($repass);

        
        $ten = mysqli_real_escape_string($this->db->link,$ten);
        $user1 = mysqli_real_escape_string($this->db->link,$user1);
        $sdt = mysqli_real_escape_string($this->db->link,$sdt);
        $email = mysqli_real_escape_string($this->db->link,$email);
        $sex = mysqli_real_escape_string($this->db->link,$sex);
        $pass1 = mysqli_real_escape_string($this->db->link,$pass1);
        $repass = mysqli_real_escape_string($this->db->link,$repass);

        if(empty($ten)||empty($user1)||empty($pass1)){
            $alert ="<span class='error'>Chưa nhập đủ thông tin ! </span>";
            return $alert ;
        }
        else
        {   
            if($a){
                $alert = "<span class='error'> user name đã tồn tại ! </span>";
                return $alert ;
            }else{
            if($pass1==$repass){
            $query = "INSERT INTO khach_hang(ten,users,phone,email,gioitinh,passwords) VALUES('$ten','$user1','$sdt','$email','$sex','$pass1')" ;
            $result = $this->db->insert($query);
            if($result){
                $alert ="<span class='success'> Đăng ký thành công !</span>";
                return $alert ;
   
            }else{
                $alert ="<span class='success'> Đăng Ký không thành công !</span>";
                return $alert ;
                
                
            }
        }else
        $alert = "<span class='error'>Mật khẩu chưa khớp !</span>";
        return $alert;
    }
        }
    
    }
  
    public function show_thongtin($id){
        
        $query = "SELECT * FROM khach_hang Where id='$id'" ;
        $result = $this->db->select($query);
        return $result;

    }
    public function change_pass($id,$pass0,$pass1,$repass){
        $a = $this->test_pass($pass0);
        if($a){
            if($pass1==$repass){
                $query ="  UPDATE khach_hang SET 
                passwords='$pass1'
                wHERE id='$id'";
                $result = $this->db->insert($query);
                if($result){
                    $alert ="<span class='success'> Đổi mật khẩu thành công !</span>";
                    return $alert ;
                }else{
                    $alert ="<span class='success'> Đổi mật khẩu không thành công !</span>";
                    return $alert ;
                }

        }else{
            $alert ="<span class='error'> Mật khẩu không khớp !</span>";
                    return $alert ;
        }

    }else {
        $alert ="<span class='error'> Nhập sai mật khẩu cũ !</span>";
        return $alert ;
    }
}
public function update_user($ten,$user1,$sex,$id){
    $ten=$this->fm->validation($ten);
    $user1=$this->fm->validation($user1);
    $sex=$this->fm->validation($sex);
    $ten = mysqli_real_escape_string($this->db->link,$ten);
    $user1 = mysqli_real_escape_string($this->db->link,$user1);
    $sex = mysqli_real_escape_string($this->db->link,$sex);

    $query ="  UPDATE khach_hang SET 
    ten= '$ten',
    sodienthoai='$user1',
    gioitinh ='$sex'

    wHERE id='$id'";
    $result = $this->db->insert($query);
    if($result){
        $alert ="<span class='success'> Cập nhật thành công !</span>";
        return $alert ;

    }else{
        $alert ="<span class='error'> Cập nhật thất bại !</span>";
        return $alert ;
    }


}
    // public function show_loaimenu(){
        
    //     $query = "SELECT * FROM loai_mon " ;
    //     $result = $this->db->select($query);
    //     return $result;

    // }
    // public function update_loai($tenloai,$ghichu,$id){
    //     $tenloai=$this->fm->validation($tenloai);
    //     $ghichu=$this->fm->validation($ghichu);

    //     $tenloai = mysqli_real_escape_string($this->db->link,$tenloai);
    //     $ghichu = mysqli_real_escape_string($this->db->link,$ghichu);
    //     $id = mysqli_real_escape_string($this->db->link,$id);

    //     if(empty($tenloai)){
    //         $alert ="chưa nhập tên loại món ";
    //         return $alert ;
    //     }
    //     else{
    //         $query = "UPDATE  loai_mon SET name_loai='$tenloai',ghichu='$ghichu' Where id_loai='$id'" ;
    //         $result = $this->db->insert($query);
    //         if($result){
    //             $alert ="<span class='succsess'> Sửa thành công</span>";
    //             return $alert ;
    //         }else{
    //             $alert ="<span class='succsess'> Sửa không thành công</span>";
    //             return $alert ;
    //         }

    //         }
    // }
}

?>