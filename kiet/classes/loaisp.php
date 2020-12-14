<?php
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php

class loaisp
 {
    private $db ;
    private $fm ;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format(); 
    }
    public function insert_loai($tenloai,$ghichu)   
    {
        $tenloai=$this->fm->validation($tenloai);
        $ghichu=$this->fm->validation($ghichu);

        $tenloai = mysqli_real_escape_string($this->db->link,$tenloai);
        $ghichu = mysqli_real_escape_string($this->db->link,$ghichu);

        if(empty($tenloai)){
            $alert ="chưa nhập tên loại món ";
            return $alert ;
        }
        else{
            $query = "INSERT INTO loaisp(ten,ghichu) VALUES('$tenloai','$ghichu')" ;
            $result = $this->db->insert($query);
            if($result){
                $alert ="<span class='succsess'> Thêm thành công</span>";
                return $alert ;
            }else{
                $alert ="<span class='succsess'> Thêm không thành công</span>";
                return $alert ;
            }

            }
    
    }
    public function show_loai(){
        $query = "SELECT * FROM loaisp order by id_loai desc" ;
        $result = $this->db->select($query);
        return $result;

    }
    public function show_loaimenu(){
        
        $query = "SELECT * FROM loaisp " ;
        $result = $this->db->select($query);
        return $result;

    }
    public function update_loai($tenloai,$ghichu,$id){
        $tenloai=$this->fm->validation($tenloai);
        $ghichu=$this->fm->validation($ghichu);

        $tenloai = mysqli_real_escape_string($this->db->link,$tenloai);
        $ghichu = mysqli_real_escape_string($this->db->link,$ghichu);
        $id = mysqli_real_escape_string($this->db->link,$id);

        if(empty($tenloai)){
            $alert ="chưa nhập tên loại món ";
            return $alert ;
        }
        else{
            $query = "UPDATE  loai_mon SET name_loai='$tenloai',ghichu='$ghichu' Where id_loai='$id'" ;
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
    public function del_loai($id){
        $query = "DELETE FROM  loai_mon  Where id_loai='$id'" ;
            $result = $this->db->delete($query);
            if($result){
                $alert ="<span class='succsess'> Xóa thành công</span>";
                return $alert ;
            }else{
                $alert ="<span class='succsess'> Xóa không thành công</span>";
                return $alert ;
            }

    }
    public function getloaibyid($id){
        $query = "SELECT * FROM loai_mon where id_loai='$id'" ;
        $result = $this->db->select($query);
        return $result;
        
    }
}

?>