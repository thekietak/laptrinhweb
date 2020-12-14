<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khuyenmai.php' ?>
<?php
$km = new khuyenmai();
if(!isset($_GET['id_km']) || $_GET['id_km']==NULL){
    echo "<script>window.location = 'kmlist.php'</script>";
}else{
    $id= $_GET['id_km'];
}
	if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){

		$updatekm = $km->update_km($_POST,$_FILES,$id) ;
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa khuyến mãi</h2>
        <div class="block"> 
        <?php

            $getkmbyid = $km->getkmbyid($id);
            if($getkmbyid){
                while($result_km = $getkmbyid->fetch_assoc()){
            
        ?>  

                
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên Khuyến mãi</label>
                    </td>
                    <td>
                        <input type="text" name="name_km" value="<?php echo $result_km['name_km'] ?>" class="medium"  onclick="return confirm('Không đươc đổi tên ?')"/>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày bắt đầu</label>
                    </td>
                    <td>
                        <input type="date" value="<?php echo $result_km['time_star'] ?>" name="time_star" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày kết thúc</label>
                    </td>
                    <td>
                        <input type="date" value="<?php echo $result_km['time_end'] ?>" name="time_end" class="medium" />
                    </td>
                </tr>
			
                <tr>
                    <td>
                        <label>discout</label>
                    </td>
                    <td>
                        <input type="text" name="discout" value="<?php echo $result_km['discout'] ?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Ghi chú</label>
                    </td>
                    <td>
                        <textarea name="ghichu"  class="tinymce" ><?php echo $result_km['ghichu']?> </textarea>
                    </td>
                </tr>
			
            
                <tr>
                    <td>
                        <label>Tải hình </label>
                    </td>
                    <td>
                    <img height="150" width ="150" src="../images/food/<?php echo $result_km['images'] ?>"><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<!-- <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="select">
                            <option>Select Type</option>
                            <option value="1">Featured</option>
                            <option value="2">Non-Featured</option>
                        </select>
                    </td>
                </tr> -->

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="update" /> <?php
                if(isset($updatekm)){
                    echo $updatekm;
                }
                ?>    
                    </td>
                </tr>
            </table>
            </form>
            <?php
            }
        }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


