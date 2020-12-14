<?php
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php

class cart {
    private $db ;
    private $fm ;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format(); 
    }
   public function insert_cart($id,$soluong){
    $soluong=$this->fm->validation($soluong);

    $soluong = mysqli_real_escape_string($this->db->link,$soluong);
    $id = mysqli_real_escape_string($this->db->link,$id);
    $sid= session_id();

    $query = " SELECT * FROM sanpham where id='$id'";
    $result = $this->db->select($query)->fetch_assoc();
   
    $namesp = $result['ten'];
    $giamon = $result['gia'] ;
    $image = $result['images'];

    $query_insert = "INSERT INTO cart(id_mon,sesid,name_mon,gia_mon,soluong,images)
     VALUES('$id','$sid','$namesp','$giamon','$soluong','$image')";
    $result_insert = $this->db->insert($query_insert);
    if($result_insert){
        header('Location:cartt.php');
    }else{
       header('Location:404.php');
    }
}
 public function get_cart(){
    $sid= session_id();
    $query = "SELECT * FROM cart where sesid ='$sid'";
    $result= $this->db->select($query);
    return $result;

 }
 public function update_cart($soluong,$id_cart){
     
    $soluong = mysqli_real_escape_string($this->db->link,$soluong);
    $id_cart = mysqli_real_escape_string($this->db->link,$id_cart);

    $query ="  UPDATE cart SET 
    soluong = '$soluong'
    wHERE cart_id='$id_cart'";
    $result= $this->db->update($query);
 }
 public function del_loai($id){
    $query = "DELETE FROM  cart  Where cart_id ='$id'" ;
    $result = $this->db->delete($query);
 }
 public function check(){
    $sid= session_id();
    $query = "SELECT * FROM cart where sesid ='$sid'";
    $result= $this->db->select($query);
    return $result;
 }
 public function sum(){
    $query = "SELECT SUM(gia_mon)FROM cart";
    $result= $this->db->select($query);
    $a = $result ['SUM(gia_mon)'];
    return $a;
 }
 public function insert_order($diachi,$userid){
    $sid= session_id();
    $query = "SELECT * FROM cart WHERE sesid ='$sid'";
    $get_mon= $this->db->select($query);
    if($get_mon){
        while($result= $get_mon->fetch_assoc()){
            $id_mon = $result['id_mon'];
            $namemon= $result['name_mon'];
            $soluong= $result['soluong'];
            $gia =$result['gia_mon'];
            $thanhtien=$result['gia_mon']*$result['soluong'];
            $images = $result['images'];
            $customid = $userid;
           
            
            $query_order = "INSERT INTO hopdong(sesis,id_mon,name_mon,id_user,soluong,gia,thanhtien,images)
            VALUES('$sid','$id_mon','$namemon','$customid','$soluong','$gia','$thanhtien','$images')";
            $insert = $this->db->insert($query_order);
            if($insert){
                header('Location:success.php');
            }else{
               header('Location:404.php');
            }
   
        }
    }

 }
 public function del_all_cart()
 {
     $query="DELETE FROM cart ";
     $result = $this->db->delete($query);
     return $result;

 }
 public function show(){
    $query="SELECT * FROM hopdong ";
    $result = $this->db->delete($query);
    return $result;
     
 }
 public function show_thongtin($id){
    $query = "SELECT sesis,dates,so_user,noidung,tg,dates,tinhtrang,Sum(thanhtien) FROM hopdong Where id_user='$id' Group by sesis,dates,so_user,noidung,tg,dates,tinhtrang" ;
    $result = $this->db->select($query);
    return $result;
 }
 public function show_thongtin1($id){
   $query = "SELECT  FROM hopdong Where sesis='$id'";
   $result = $this->db->select($query);
   return $result;
}
public function show_thongtinid($id){
   $query = "SELECT sesis,dates,khach_hang.ten ,so_user,noidung,tg,dates,tinhtrang,name_mon,soluong,gia,thanhtien,Sum(thanhtien) FROM hopdong 
   INNER JOIN khach_hang ON hopdong.id_user = khach_hang.id where sesis='$id' Group by sesis,dates,khach_hang.ten ,so_user,noidung,tg,dates,tinhtrang,name_mon,soluong,gia,thanhtien " ;
     $result = $this->db->select($query);
   return $result;
}
 public function show_hopdong(){
   $query = "SELECT sesis,dates,khach_hang.ten ,so_user,noidung,tg,dates,tinhtrang,Sum(thanhtien) FROM hopdong 
   INNER JOIN khach_hang ON hopdong.id_user = khach_hang.id
    Group by sesis,dates,khach_hang.ten ,so_user,noidung,tg,dates,tinhtrang" ;
   $result = $this->db->select($query);
   return $result;
}

public function update_tinhtrang($id,$tinhtrang){
   $tinhtrang=$this->fm->validation($tinhtrang);
   

   $tinhtrang = mysqli_real_escape_string($this->db->link,$tinhtrang);
   $id = mysqli_real_escape_string($this->db->link,$id);

  
      $query = "UPDATE hopdong SET 
      tinhtrang='$tinhtrang'
      where sesis='$id'";
       $result = $this->db->insert($query);
       if($result){
           $alert ="<span class='succsess'> Sửa thành công</span>";
           return $alert ;
       }else{
           $alert ="<span class='succsess'> Sửa không thành công</span>";
           return $alert ;
       }

       
}
}

?>