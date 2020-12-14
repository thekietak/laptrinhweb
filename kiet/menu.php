<?php
include 'inc/header.php';
?>
<style>
       input[type=search] {
    border: solid 1px #ccc;
    padding: 9px 10px 9px 32px;
    width: 20rem;
 
    -webkit-border-radius: 10em;
    -moz-border-radius: 10em;
    border-radius: 10em;

    
  
}
button{
    border: solid 1px #ccc;
    padding-left: 10px ;
    width: 5rem;
    -webkit-border-radius: 10em;
    -moz-border-radius: 10em;
    border-radius: 10em;

    
}
    </style>




<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Specialties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="ftco-search">
        <form action=menu.php method=post>
                <input name=key type="search" placeholder="Search">
                <button type="submit" >tìm</button>
            </form>
            <div class="row">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <?php
            $show_loai = $loaisp->show_loai();
            if($show_loai){

                while($result = $show_loai->fetch_assoc()){
                    	
            ?>
                        <a class="nav-link ftco-animate " id="v-pills-1-tab" 
                            href="?id_loai=<?php echo $result['id_loai']?>"
                            role="tab"><?php echo $result['ten']?></a>

                        <?php
                }
            } 
                ?>

                    </div>
                </div>
                <div class="col-md-12 tab-wrap">

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                            aria-labelledby="day-1-tab">
                            <div class="row no-gutters d-flex align-items-stretch">
							<?php 
    							$key =isset($_POST['key'])?$_POST['key']:'';
    							$id= isset($_GET['id_loai'])?$_GET['id_loai']:'10';
    							$listsanpham= $sanpham->getmonbyloai($id);
    							$spkey=$sanpham->getmonkey($key);
							?>
           					 <?php
           						 if(empty($key)){
               					if($listsanpham){
                				while($result_mon = $listsanpham->fetch_assoc()){
            				?>
                                <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                                    <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                        <div class="menu-img img"
                                            style="background-image: url(images/sanpham/<?php echo $result_mon['images']?>);"></div>
                                        <div class="text d-flex align-items-center">
                                            <div>
                                                <div class="d-flex">
                                                    <div class="one-half">
                                                        <h3>  <?php echo $result_mon['ten'] ?></h3>
                                                    </div>
                                                    <div class="one-forth">
                                                        <span class="price"><?php echo $fm->formatMoney($result_mon['gia'])?></span>
                                                    </div>
                                                </div> 
												<?php echo $result_mon['ghichu'] ?> 
                                                <p><a href="detail.php?monid=<?php echo $result_mon['id'] ?>" class="btn btn-primary">Order now</a></p>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<?php
            					}
       						}
            			} else{
                			if($spkey){
                    			while($result_mon = $spkey->fetch_assoc()){
           						 ?>
								    <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                                    <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                        <div class="menu-img img"
                                            style="background-image: url(images/sanpham/<?php echo $result_mon['images']?>);"></div>
                                        <div class="text d-flex align-items-center">
                                            <div>
                                                <div class="d-flex">
                                                    <div class="one-half">
                                                        <h3>  <?php echo $result_mon['ten'] ?></h3>
                                                    </div>
                                                    <div class="one-forth">
                                                        <span class="price"><?php echo $fm->formatMoney($result_mon['gia'])?></span>
                                                    </div>
                                                </div> 
												<?php echo $result_mon['ghichu'] ?> 
                                                <p><a href="detail.php?monid=<?php echo $result_mon['id'] ?>" class="btn btn-primary">Order now</a></p>
                                            </div>
                                        </div>
                                    </div>
								</div>





								<?php
                   					 }
               					 }
           					 }
            			?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<?php
  include 'inc/footer.php';
  ?>