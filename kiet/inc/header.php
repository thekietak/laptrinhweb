<?php
    require_once 'session.php';
    session::init();
include './lib/database.php';
include './helpers/format.php';
spl_autoload_register(function($class){
    include_once "classes/".$class.".php";});
        $db= new Database();
        $fm= new Format();
        $ct= new cart();
        $us = new user();
        $loaisp = new loaisp();
        $sanpham = new sanpham(); 

  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GS restaurant</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
		.text{
			color: black;
		}
	</style>
  </head>
 
  <body>
    <div class="py-1  top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+<?php echo session::get('sdt') ?></span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
							<a href="userblog.php?id=<?php echo session::get('id') ?>"><span class="text"><?php echo session::get('name') ?></span></a>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 text"><span>Open hours:</span> <span>Monday - Sunday</span> <span>8:00AM - 9:00PM</span></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	     
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link">Trang chủ</a></li>
	       
	        	<li class="nav-item"><a href="menu.php" class="nav-link">Sản Phẩm</a></li>
	        	<li class="nav-item "><a href="blog.php" class="nav-link">Tin thức</a></li>
           
			  <li class="nav-item cta"><a href="cartt.php" class="nav-link"><img src="images/cart.png" height="28" width="50">
			  <?php
			  $check = $ct->check();
			  if($check){
			   $sum=session::get("sum"); 
			  echo $fm->formatMoney($sum);
			  }
			  ?>
			  </a></li>
		
			  <?php
                                if(isset($_GET['action'])&& $_GET['action']=='logout'){
                                    Session::destroy();
                                }
							?>
			 <li class="nav-item cta"> 
				  <?php if(!empty(session::get('name'))){ ?>
                                
					<a class="nav-link" href="userblog.php?id=<?php echo session::get('id') ?>"><span><?php echo session::get('name') ?></span></a>
							<?php }else 
							
							{?>
							<a class="nav-link" href="login.php">No account</a>
							 	

							<?php }?></li>				
              <li class="nav-item cta"> 
				  <?php if(!empty(session::get('name'))){ ?>
                                
                                <a class="nav-link" href="?action=logout">Đăng xuất</a>
							<?php }else 
							
							{?>
							<a class="nav-link" href="login.php">Đăng nhập</a>
							 	

							<?php }?></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
	  
    <!-- END nav -->
    