<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/loaisp.php';?>
<?php
$loai = new loaisp();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$tenloai = $_POST['tenloai'];
		$ghichu = $_POST['ghichu'];

		$insertloai = $loai->insert_loai($tenloai,$ghichu) ;
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Loại món</h2>
             
               <div class="block copyblock"> 
               <?php
                if(isset($insertloai)){
                    echo $insertloai;
                }
                ?>
                 <form action ="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="tenloai" placeholder="Thêm loại món" class="medium" />
                            </td>
                            <td>
                                <input type="text" name="ghichu" placeholder="Thêm ghi chú" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>