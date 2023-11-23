
<?php
    $id =Helper::input_value('id');
    $category=CategoryDB::getCategoryById($id); 
    $products=ProductDB::getProductsByCategoryId($id);
    
?>
  
  <div class="ele-bottom-grid">
      <h3>Danh Sách Sản Phẩm <span><?php echo $category->getName()."";?></span></h3>
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
							  </div>
                              <?php  if($product->getNoibat()!=0){  echo'
							     <span class="product-new-top bg-danger">New</span>';}
                                 else{ echo'
                                    <span class="product-new-top bg-danger">Hết hàng</span>';}?>
	               </div>
					   <div class="item-info-product ">
						   <h4><a  href="<?php echo Helper:: get_url('?c=listdetail&id='.$product->getId()); ?>"> <?php echo $product->getTen(); ?></a></h4>
                         <div class="info-product-price">
                           <span class="item_price"><?php echo '$ ' . number_format($product->getGia(),0,',','.'); ?></span>
                           <del><?php echo '$ ' . number_format($product->getGiachinh(),0,',','.'); ?></del>
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

                <script>
$(document).ready(function () {
    // $('.btnthemgiohang').click(function(){
    //     $.post('http://localhost:8080/demoajax/?v=cart&a=add',
    //       {id:$(this).val()},function(data){
    //         window.location.reload();
    //       });
    // });
    $('.btnthemgiohang').click(function(){
        $.ajax({
            url:'http://localhost:8080/DoAn/?v=cart&a=add',
            type:'POST',
            dataType:'html',
            data:{id:$(this).val()},
            success:function(data){
                //window.location.reload();
                $("#giohang").load(location.href + " #giohang");
            }
        });
    });
});
</script>        
