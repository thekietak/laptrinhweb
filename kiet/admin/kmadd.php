<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khuyenmai.php' ?>

<?php
$khuyenmai = new khuyenmai();
	if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){

		$inserkm = $khuyenmai->insert_km($_POST,$_FILES) ;
    }
   
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Khuyến mãi</h2>
        <div class="block">   
                
         <form action="kmadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên khuyến mãi</label>
                    </td>
                    <td>
                        <input type="text" name="name_km" placeholder="Enter Name..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày bắt đầu</label>
                    </td>
                    <td>
                        <input type="date" name="time_star" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày kết thúc</label>
                    </td>
                    <td>
                        <input type="date" name="time_end" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>discout</label>
                    </td>
                    <td>
                        <input type="text" name="discout" placeholder="vd: 50 " class="medium" />
                    </td>
                </tr>
			
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Ghi chú</label>
                    </td>
                    <td>
                        <textarea name="ghichu" class="tinymce"></textarea>
                    </td>
                </tr>
			
            
                <tr>
                    <td>
                        <label>Tải hình </label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" /> <?php

                if(isset($insert_km)){
                    echo $insert_km;
                }
                ?>    
                    </td>
                </tr>
            </table>
            </form>
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


