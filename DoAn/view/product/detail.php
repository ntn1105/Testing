<?php
       $id=Helper:: input_value('id');
       $products=ProductDB::getProductById($id);
	  
	   
?>

<!DOCTYPE html>
<html>
<head>
<title>Chi tiết sản phẩm </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="public/css/flexslider.css" type="text/css" media="screen" />
<link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="public/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- single -->
<script src="public/js/imagezoom.js"></script>
<script src="public/js/jquery.flexslider.js"></script>
<!-- single -->
<!-- cart -->
	<script src="public/js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
	<script type="text/javascript" src="public/js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="public/js/jquery.easing.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>
<!-- single -->

<div style="margin-top: -120px;" class="single">
	<div style="width: 700px;">
    <div class="ele-bottom-grid">
			<h3>Thông Tin Sản Phẩm</h3>
			<p>Đây là những sản phẩm được mua nhiều nhất tại của hàng  </p>
			</div>
		<div>
    <!-- ảnh sản phảm -->
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<!-- FlexSlider -->
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
					<ul class="slides">
						<li data-thumb="public/img/<?php  echo $products->getHinhanh(); ?>">
							<div class="thumb-image"> <img src="public/img/<?php  echo $products->getHinhanh(); ?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
					<h3><?php echo $products->getTen(); ?><?php  if($products->getNoibat()!=0){  echo'
							     <span class="badge badge-danger">New</span>';}
                                 else{ echo'
                                    <span class="badge badge-danger">Hết hàng</span>';}?>
                        </h3>
                        <?php echo '$ ' . number_format($products->getGia(),0,',','.'); ?>
						<del><?php echo '$ ' . number_format($products->getGiachinh(),0,',','.'); ?></del>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5"checked="">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" >
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="description">
						<h5>Kiểm tra thông tin đơn hàng của bạn</h5>
						<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}" required="">
						<input type="submit" value="Check">
					</div>
					<div class="color-quality">
						<div class="color-quality-right">
							<h5>Quality :<?php echo $products->getNoibat(); ?></h5>
							
						</div>
					</div>
					<div class="occasional">
						<h5>Types Size :</h5>
					
						<div class="colr">
							<label class="radio"><input type="radio" name="radio" checked=""><i></i>M</label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio" checked=""><i></i>L</label>
						</div>
                        <div class="colr">
							<label class="radio"><input type="radio" name="radio" checked=""><i></i>XL</label>
						</div>
						<div class="clearfix"> </div>
					</div>
                    <!--vận chuyên-->
                 <div class="occasional">
	               <h5>Vận Chuyển:</h5>
                  <div class="content-lgrid"><img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/1cdd37339544d858f4d0ade5723cd477.png" width="30" height="20" class="_2geN66"> <strong>Miễn phí Vận Chuyển</strong>  </div>
                   </div> 	
 <!--thêm vao gio hang--> 	


					<div class="occasion-cart">
                    <button class=" btnthemgiohang btn-sm btn-secondary mt-3 mb-3 item_add single-item hvr-outline-out button2" type="button" value="<?php echo $products->getId(); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                           </svg> Thêm Vào Giỏ Hàng 
                              </button>
					</div>
					
		</div>

	<div class="clearfix"> </div>

			<!-- noidung -->
			<div class="btn-group">
			<button type="button" class="btn btn-outline-warning" data-remote="false" data-toggle="modal" data-target="#myModal">Chi tiết sản phẩm</button>
<button type="button" class="btn btn-outline-info" data-remote="false" data-toggle="modal" data-target="#myModal">Bình Luận Sản Phẩm</button>
<button type="button"class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"> Đánh Giá Sản Phẩm</button>
			</div>


</div>
</div>
		

<!-- chi tiết ản phẩm Default bootstrap modal example -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Mô Tả chi tiết sản phẩm</h4>
      </div>
      <div class="modal-body">
	  <?php echo $products->getNoidung(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<!-- nình luận sản pjaamr Default bootstrap modal example -->
     	<!-- noidung -->
    
    
   <!-- câu hỏiDefault bootstrap modal example -->  


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="get">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
   <!-- hết  -->
    

					
<!-- //single -->


<!--sanphamkahsc-->
<?php
   $products = ProductDB::getProductsList();
   $paging_html = "";
   $products = ProductDB::getProductsPagingDetail($paging_html);

?>
   
   <div class="ele-bottom-grid">
       <h3>Sản Phẩm <span>Mới Nhất </span></h3>
            <p>Chúng tôi sẽ cập nhật các mẫu đồng hồ mới nhất để phục vu nhu cầu của quý khách hàng</p>
                <?php 
                  if(!empty($products))
                     foreach ($products as $product) : ?>   
                     <div>              
             <div class="col-md-4 product-men yes-marg">
				   <div class="men-pro-item simpleCart_shelfItem">
					   <div class="men-thumb-item">
						   <img src="public/img/<?php echo $product->getHinhanh();?>" class="pro-image-front">
						   <img src="public/img/<?php echo $product->getHinhanh();?>" alt="" class="pro-image-back">
						      <div class="men-cart-pro">
								    <div class="inner-men-cart-pro">
									     <a  href=" <?php echo Helper:: get_url('?c=listdetail&id='.$product->getId()); ?>" class="link-product-add-cart">Xem Ngay</a>
						         </div>
							  </div> <?php  if($product->getNoibat()!=0){  echo'
							     <span class="product-new-top bg-danger">New</span>';}
                                 else{ echo'
                                    <span class="product-new-top bg-danger">Hết hàng</span>';}?>
	               </div>
					   <div class="item-info-product ">
						   <h4><a  href="<?php echo Helper:: get_url('?c=listdetail&id='.$product->getId()); ?>"> <?php echo $product->getTen(); ?></a></h4>
                         <div class="info-product-price">
                           <span  class="item_price"><?php echo '$ ' . number_format($product->getGia(),0,',','.'); ?></span>
							      <!-- <del>$150.71</del> -->
						      </div>
                            
							  <button class=" btnthemgiohang btn-sm btn-secondary mt-3 mb-3 item_add single-item hvr-outline-out button2" type="button" value="<?php echo $product->getId(); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                           </svg> Thêm Vào Giỏ Hàng 
                              </button>
                        
                        							 
					   </div>
				  </div>
			    </div> 
             </div>  
             <?php endforeach; ?> 
                   
                   <div class="clearfix"></div>   
                       
    </div>      
							

<!-- hêt -->
</body></html>

<script>
$(document).ready(function () {
    $('.btnthemgiohang').click(function(){
        $.get('http://localhost:8080/DoAn/?v=cart&a=add',
          {id:$(this).val(),qty:$('.qty').val()},function(data){
            //window.location.reload();
            $("#giohang").load(location.href + " #giohang");
          });
    });
});
</script>
<script>$("#myModal").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-body").load(link.attr("href"));
});
</script>
<script>$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})</script>