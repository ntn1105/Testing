<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Smart Shop </title>

<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<link rel="stylesheet" href="public/css/bootstrap.css">
<link rel="stylesheet" href="public/css/style.css">
<link rel="stylesheet" href="public/css/pignose.layerslider.css">
<script type="text/javascript" src="public/js/jquery-2.1.4.min.js"></script>
<script src="public/js/simpleCart.min.js"></script>
<script type="text/javascript" src="public/js/bootstrap-3.1.1.min.js"></script>
<script src="public/js/jquery.easing.min.js"></script>

<style>
.mySlides {display:none;}
</style>
</head>

<body>
    <!-- header -->
    <div class="header">
        <div class="container">
           
               <ul class="nav justify-content-center">
                <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Giao hàng miễn phí và nhanh chóng</li>
                <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Miễn phí vận chuyển trên tất cả các đơn đặt hàng</li>
                <li><a  href="ailto:info@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> cojhoang23@gmail.com </a> </li>
                
            </ul>
    
        </div>
    </div>
    <!-- header-bot -->
    <div class="header-bot">
        <div class="container">
            <div class="col-md-3 header-left">
                <h1><a href="<?php echo Helper::get_url('?c=listpro');?>"><img src="public/images/portfolio_logo_the_ideal_diamond_and_watch_shop_2x3_1.jpg"></a></h1>
            </div>
            <div class="col-md-6 header-middle">
			<form action="<?php echo Helper::get_url('?c=findpro'); ?>" method="post" class="m-0"class="d-flex">
				<div class="search">
					<input type="search" name="search"  placeholder="Search"  required="">
				</div>
				
				<div class="sear-sub">
                <input type="hidden" name="action" value="search">
                        <input type="submit" value="">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
            <div class="col-md-3 header-right footer-bottom">
                <ul>
               <li>      
                <a href="<?php echo Helper::get_url('admin/?v=common&a=login')?>" class="use1"  > <span>Login Admin</span></a>     
                        </li> 
                    
                    <li><a class="fb" href="#"></a></li>
                    <li><a class="you" href="#"></a></li>
                    <li><a class="insta" href="#"></a></li>
                    <li><a class="you" href="#"></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //header-bot -->
    <!-- banner -->
   
    <div class="ban-top">
	<div class="container">
    
            <div class="ban-top">
            <div class="top_nav_left">
                <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                    <ul style="float: left;margin-bottom: -5px;" class="navbar navbarlist-group">
                          <li class="active menu__item "><a class="menu__link" href="<?php echo Helper::get_url('?c=listpro');?>">Trang Chủ <span class="sr-only">(current)</span></a></li>
                          <li class=" menu__item">
                            <a class="menu__link" href="<?php echo Helper::get_url('?c=contact');?>">Giới thệu </a>
                        </li>

                           <?php if(Form_Authen::is_user()):  ?>
                         <li class=" menu__item ">
                             <a class="menu__link" href="<?php echo Helper::get_url('?c=order'); ?>">Đơn Hàng</a>
                         </li><?php endif; ?>
                        
                        
                        <!-- <li class=" menu__item "><a class="menu__link" data-toggle="modal" data-target="#myModal4" href="#">Đăng Nhập</a></li> -->
                        <li class=" menu__item ">
                            <?php if(!Form_Authen::is_user()): ?>
                                <span>
                                  <a class="menu__link" href="<?php echo Helper::get_url('?c=login'); ?>">
                                      <i class="fas fa-sign-in-alt "> Đăng nhập</i></a>
                    
                                </span><?php else:?>
            
                                <span> 
                                    <a class="menu__link" href="<?php echo Helper::get_url('?c=logout'); ?>">
                                   <i class="fas fa-sign-out-alt "> Đăng xuất</i> </a>
                                </span> <?php endif; ?> 
                                
                        </li>

                        <li class=" menu__item">
                            <a class="menu__link" href="<?php echo Helper::get_url('?c=contact');?>">Liên hệ </a>
                        </li>

                        <li class=" menu__item ">
                            <a class="menu__link" href="<?php echo Helper::get_url('?c=listcart')?>"><i class="fas fa-shopping-bag "> Giỏ hàng</i>
                                   </a>
                        </li>
                      </ul>

                    </div>
                  </div>
                </nav>	
            </div> 
          
            <div class="top_nav_right">
			<div class="cart box_1">
            <span id="giohang">
						<a href="<?php echo Helper::get_url('?c=listcart')?>">
							<h3> <div class="total">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                                <span>$<?php echo  get_subtotal_cart(); ?><?php
                                    $qty = 0;
                                      if(!empty($_SESSION['cart'])):
                                        foreach( $_SESSION['cart'] as $key => $item ) :
                                           $qty+= $item['qty'];
                                           endforeach;?>(<span ><?php echo "<span id='qty' class='text-danger'>" . $qty . "</span>" ?>        
                                           items) <?php endif; ?></span></div>
								
							</h3>
						</a>
            </span>
						<!-- <p><a href="<?php echo Helper::get_url('?c=listcart')?>" class="">cart</a></p> -->
						
			</div>	
		</div>
            <div class="clearfix"></div>
        </div>
        </div>
    
    <!-- //banner-top -->
     <!-- banner -->
   <div class="ban-top">
      <div style="margin-left: -10px;" class="container">
       <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
           <?php $slides=SlideDB::getSlide();
               if(!empty($slides))
                 foreach ($slides as $slide) :  ?> 
                   <a href="<?php echo $slide->getLienket();?>"><img class="mySlides carousel-item"  src="./public/imgslide/<?php  echo $slide->getHinh();?>" height="310px" width="auto"></a>
             <?php endforeach; ?> 
         </div>
        </div>
      </div>
    </div>
     <script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
   
    <!-- //banner -->
</div>
</body>
</html>   

   
    <!-- //banner -->


    <!-- login -->
   
 <!-- <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-info">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
                            </div>
                            <div class="modal-body modal-spa">
                                <div class="login-grids">
                                    <div class="login">
                                        <div class="login-bottom">
                                            <h3>Đăng kí miễn phí</h3>
                                            <form  action="view//common//login.php" method="post">
                                            <div class="sign-up">
                                                    <h4>Họ Và Tên :</h4>
                                                    <input type="text" name="hoten"   value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
                                                </div>
                                                <div class="sign-up">
                                                    <h4>Số Điện Thoại:</h4>
                                                    <input type="text" name="sodt"   value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
                                                </div>
                                                <div class="sign-up">
                                                    <h4>Địa Chỉ:</h4>
                                                    <input type="text" name="diachi"  value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
                                                </div>
                                                <div class="sign-up">
                                                    <h4>Email :</h4>
                                                    <input type="email"  name="email"  value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
                                                </div>
                                                <div class="sign-up">
                                                    <h4>Mật Khẩu :</h4>
                                                    <input type="password" name="matkhau" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                                    
                                                </div>
                                             
                                                <div class="sign-up">
                                                <input type="hidden" name="action" value="register"> 
                                                <input class="btn-sm btn-dark" type="submit" value="Đăng ký">
                                                </div>
                                            </form>
                                                
                                        
                                        </div>
                                        <div class="login-right">
                                            <h3>Đăng nhập bằng tài khoản của bạn</h3>
                                           <form id="frmlogin" action="view/common/login.php" method="post">
                                                <div class="sign-in">
                                                    <h4>Email :</h4>
                                                    <input type="email"  name="email"  value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
                                                </div>
                                                <div class="sign-in">
                                                    <h4>Mật Khẩu :</h4>
                                                    <input type="password"  name="matkhau" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                                    <a href="#">Quên mật khẩu?</a>
                                                </div>
                                                <div class="single-bottom">
                                                    <input type="checkbox"  id="brand" value="">
                                                    <label for="brand"><span></span>Nhớ Tài Khoản.</label>
                                                </div>
                                                <div class="sign-in">
                                                    <input type="submit" value="Đăng Nhập" >
                                                </div>
                                            </form>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <p>Bằng cách đăng nhập, bạn đồng ý với <a href="#">Các điều khoản và điều kiện</a> and <a href="#">Chính sách bảo mật</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

</body>
</html>

    