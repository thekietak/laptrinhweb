<?php
include 'inc/header.php';
if(!isset($_GET['id']) || $_GET['id']==NULL){
    echo "<script>window.location = '404.php'</script>";
}else{
    $id= $_GET['id'];
}
if($_SERVER['REQUEST_METHOD']==='POST'){
 
  $pass0= md5($_POST['pass0']);
  $pass1= md5($_POST['pass1']);
  $repass=md5($_POST['repass']);
  $result = $us->change_pass($id,$pass0,$pass1,$repass);
 
}


?>

<style>
  label{
    color: black;

    font-weight: bold;
  }
  </style>
    
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Đổi mật khẩu</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Đổi mật khẩu<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-6 pt-5 px-2 pb-2 p-md-5 order-md-last">
            <h2 class="h4 mb-2 mb-md-5 font-weight-bold">Đổi mật khẩu</h2>
            <span  > <?php 
				    if(isset($result))
				        {
				    	echo $result ;
				        }
			?></span>
            <form class="login-form" action="" method="post">
                            <div class="form-group">
                                <label  class="text-uppercase">Mật khẩu cũ</label>
                                <input type="password" name=pass0 class="form-control" placeholder="">
                            </div>
                           
                            <div class="form-group">
                                <label  class="text-uppercase">Mật khẩu mới</label>
                                <input type="password" name=pass1 class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label  class="text-uppercase">Nhập lại mật khẩu</label>
                                <input type="password" name=repass class="form-control" placeholder="">
                            </div>
                            <?php
                 
                            ?> 


                            <div class="form-check">
                                <!-- <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                <small></small>
                            </label> -->
   
                                 <input  type="submit" value="Đổi mật khẩu  " class="btn btn-primary py-3 px-5">
                            </div>

                        </form>
					</div>
			
				</div>
			</div>
		</section>
	
    <?php
  include 'inc/footer.php';
  ?>