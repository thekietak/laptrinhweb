<?php
include 'inc/header.php';
?>
<?php
if(!isset($_GET['monid']) || $_GET['monid']==NULL){
    echo "<script>window.location = '404.php'</script>";
}else{
    $id= $_GET['monid'];
}



if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id_mon'];
	$soluong= $_POST['soluong'];
    $addcart = $ct->insert_cart($id,$soluong);
    
    header('location:cartt.php');

}
 
?>


<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Specialties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Detail <i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <?php
					$get_detail= $sanpham->get_detail($id);
					if($get_detail){
						while($result_detail= $get_detail->fetch_assoc()){

					
				?>
				
            <div class="col-lg-6 mb-5 ftco-animate">
				
			<form action="" method="POST" >
                <a href="images/menu-2.jpg" class="image-popup"><img
                        src="images/sanpham/<?php echo $result_detail['images'] ?>" class="img-fluid"
                        alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h2><?php echo $result_detail['ten'] ?></h2>
                <h4>Loại món: <?php echo $result_detail['ten'] ; ?> </h4>
                <p class="price"><span><?php echo $fm->formatMoney($result_detail['gia']) ?> VNĐ</span></p>

                <p>
                    <?php echo $result_detail['ghichu'] ?>
                </p>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group d-flex">

                        </div>
					</div>
			
                    <div class="w-100"></div>
                    <div class="input-group col-md-6 d-flex mb-3">
							<div>
                            <input type="hidden" name="id_mon"  value="<?php echo $result_detail['id'] ?>" >

                            <input type="Number" name="soluong" class="form-control input-number" value="1" min="1"
								max="20">
							</div>
                            <input type="submit" name=submit value="Add to cart" class="btn btn-primary py-3 px-5">
                        </form>
                    </div>
                </div>
				<?php
			  	}

			}
			?>

        
            </div>
        </div>
    </div>
</section>

<?php
include 'inc/footer.php';
?>