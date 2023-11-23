

<div class="coupons">
        <div class="container">
            <div class="coupons-grids text-center">
                <div class="col-md-3 coupons-gd">
                    <h3>MUA SẢN PHẨM CỦA BẠN MỘT CÁCH ĐƠN GIẢN</h3>
                </div>
                <div class="col-md-3 coupons-gd">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <a href="#" class="use1" data-toggle="modal" data-target="#myModal4"> <h4>ĐĂNG NHẬP VÀO TÀI KHOẢN CỦA BẠN</h4></a>
                   
               
                </div>
                <div class="col-md-3 coupons-gd">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                   <a href="#"><h4>CHỌN MẶT HÀNG CỦA BẠN</h4></a> 
                   
                </div>
                <div class="col-md-3 coupons-gd">
                    <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
                    <h4>THỰC HIỆN THANH TOÁN</h4>
                   
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<div class="footer">
        <div class="container">
            <div class="col-md-3 footer-left">
                <h2><a href="index.php"><img src="public/images/portfolio_logo_the_ideal_diamond_and_watch_shop_2x3_1.jpg" alt=" " height="200px" width="200px"/></a></h2>
                
            </div>
            
            <div class="col-md-9 footer-right">
			<div class="col-sm-4 newsleft">
				<h3>ĐÓNG GÓP Ý KIẾN !</h3>
			</div>
			<div class="col-sm-8 newsright">
            <form>
					<input type="text" placeholder="Gửi Câu Hỏi Tại Đây" required="">
                    <?php if(!Form_Authen::is_user()): ?>
                        <button type="button" class="btn btn-warning" >
                        <a style="color: white;"  href="<?php echo Helper::get_url('?c=login'); ?>">
                                       Đăng nhập</a>
                    
                                <?php else:?>
                                <input type="submit" value="Submit">
                               <?php endif; ?> 
                               
				
					
				</form>
			</div>
                <div class="clearfix"></div>
                <div class="sign-grds">
                    <div class="col-md-2 sign-gd">
                        <h4>Menu</h4>
                        <ul>
                            <li><a href="index.php">Trang Chủ</a></li>
                            <li><a href="mens.html">Giới thiệu</a></li>
                            <li>    <?php if(!Form_Authen::is_user()): ?>
                                <span>
                                  <a  href="<?php echo Helper::get_url('?c=login'); ?>">
                                    Đăng nhập</a>
                    
                                </span><?php else:?>
            
                                <span> 
                                    <a  href="<?php echo Helper::get_url('?c=logout'); ?>">
                                   Đăng xuất </a>
                                </span> <?php endif; ?></li>
                            <li><a href="<?php echo Helper::get_url('?c=listcart')?>">Giỏ Hàng</a></li>
                            <li><a href="<?php echo Helper::get_url('?c=contact');?>">Liên Hệ</a></li>
                        </ul>
                    </div>
                    
                    <div class="col-md-4 sign-gd-two">
                        <h4>Thông Tin Shop</h4>
                        <ul>
                            <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Address : 23 Trà Khê - Hòa Hải - Ngũ Hành Sơn -<span>Đà Nẵng</span></li>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email:<a href="mailto:info@example.com">cojhoang23@gmai.com</a></li>
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone : +84 376 492 236</li>
                        </ul>
                    </div>
                    <div class="col-md-6 sign-gd-two ">
                        <h4>Bản Đồ</h4>
                       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15342.654095808279!2d108.24976059579666!3d15.978938464017775!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1623513901297!5m2!1svi!2s" width="300" height="205" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            
            <p class="copy-right"><strong>© Đồ Án</strong> </p>
            
        </div>
        
    </div>
    <!-- //footer -->
