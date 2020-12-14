<?php
include 'inc/header.php';
?>
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_cart = $_POST['cartid'];
	$soluong= $_POST['soluong'];
	$updatecart = $ct->update_cart($soluong,$id_cart);
	header('location:cartt.php');

}
if(isset($_GET['delid'])){
	$id= $_GET['delid'];
	$delcart = $ct->del_loai($id);
	header('location:cartt.php');

}





?>

    <!-- END nav -->

	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Specialties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Cart <i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

		
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Món ăn</th>
						        <th>Giá</th>
						        <th>Số lượng</th>
						        <th>Thành tiền</th>
						      </tr>
							</thead>
							<?php
							$get_cart = $ct->get_cart();
							if($get_cart){
								$subtotal=0;
								while($result=$get_cart->fetch_assoc()){
									
									
							?>

						    <tbody>
						      <tr class="text-center">
						        <td class="product-remove"><a onclick="return confirm('bạn muốn xóa món ăn khỏi giỏ hàng ?')" href="?delid=<?php echo $result['cart_id']?>">X</a></td>
						        
						        <td class="image-prod"><img width="100" height="50"  src="images/sanpham/<?php echo $result['images']?>" ></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $result['name_mon'] ?></h3>
						        </td>
						        
						        <td class="price"><?php echo $fm->formatMoney($result['gia_mon'])."VNĐ" ?></td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
										<form action="" method=post >
									<input type="hidden" name="cartid" value="<?php echo $result['cart_id'] ?>" >
					             	<input type="Number" name="soluong" class=" form-control " value="<?php echo $result['soluong'] ?>" min="1" max="50">
									 <input type="submit"  value="update" class="btn btn-primary py-3 px-5">	
								</form>
								</div>
					          </td>
						        
						        <td class="total">
									<?php
									$total = $result['soluong']* $result['gia_mon'];
									echo $fm->formatMoney($total)."VNĐ";
									$subtotal += $total;
								
									?>
								</td>
						      </tr><!-- END TR-->
							</tbody>
							<?php		
									
						}
							}
							?>
						  </table>
						  
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span> Subtotal :</span>
							<span><?php 
							if(isset($subtotal)){
							echo $fm->formatMoney($subtotal);}
							else{
								echo"0";
							}
							$sub = isset($subtotal)?$subtotal:'';
							session ::set('sum',$sub); 
							?> VNĐ</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>: 0</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
							<span>: <?php	if(isset($subtotal)){
							echo $fm->formatMoney($subtotal);}
							else{
								echo"0";
							}  ?> VNĐ</span>
    					</p>
    				</div>
    				<p class="text-center"><a href="thongtin.php?idorder=order" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>

<?php
include 'inc/footer.php';
?>