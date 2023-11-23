
<?php
   
   $products = ProductDB::getProducts();

?>

<!-- //banner -->
<!-- check out -->
<div class="container">
<div style="margin-top: -100px;" class="checkout">
	
        <div class="ele-bottom-grid">
		<h3>My Shopping Bag</h3>
       <?php if (empty($_SESSION['cart']) || count($_SESSION['cart']) == 0) : ?> 
    <center><p>Không có sản phẩm nào trong giỏ hàng.</p></center>
<?php else: ?>
    <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
                        <th>Remove</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
						<th>Giá</th>
						<th>Số Lượng</th>
						<th>Tổng</th>
					</tr>
				</thead>
                <?php foreach( $_SESSION['cart'] as $key => $item ) :
        $cost  = number_format($item['cost'], 0,',','.');
        $total = number_format($item['total'], 0,',','.');
      
    ?>
					<tr class="rem1">
						<td class="invert-closeb">
                        <div class="rem">
                            <button class="btndelete border-0 bg-white fas fa-trash-alt text-muted" type="button" value="<?php  echo $key; ?>">
                            </button>
                        </div>
						</td>
                        <td  class="invert"> <a  href=" <?php 
                  if(!empty($products))
                     foreach ($products as $product) : ?>  
                     <?php  if(strcmp($product->getTen(),$item['name'])== 0) echo Helper:: get_url('?c=listdetail&id='.$product->getId()); ?><?php endforeach; ?>"><?php echo $item['name']; ?></a></td>
                         
                      
                        <td class="invert-image">
                            <img style="margin: 5px -1000px 5px 5px;" src="<?php 
                  if(!empty($products))
                     foreach ($products as $product) : ?>  
                     <?php  if(strcmp($product->getTen(),$item['name'])== 0)  echo "./public/img/". $product->getHinhanh();?>
                      <?php endforeach; ?>"  alt=" " class="img-responsive" />
                       
                        </td>
                       
						<td  class="invert">$ <?php echo $cost; ?></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<span><input style="width: 50px;" class="newqty" type="number"
                                          name="newqty[<?php echo $key; ?>]"
                                           value="<?php echo $item['qty']; ?>"></span></div>
									
								</div>
							
						</td>
						
						<td class="invert"> $ <?php echo $total; ?></td>
					</tr>
					
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
                                <?php endforeach; ?>
        <tr>
            <td colspan="5" style="text-align: right;"><b>Tổng Thành Tiền</b></td>
            <td colspan="1">$ <?php echo  get_subtotal_cart(); ?></td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: right;">
                <button class="btn-sm btn-dark mr-4">
                <a class="btn-sm btn-dark" href="<?php echo Helper::get_url('?c=checkout'); ?>">
                   Đặt hàng    
                </a>
                </button>
                <!-- <input type="hidden" name="action" value="Update"> -->
                <!-- <input class="btn-sm btn-dark" type="submit" value="Cập nhật"> -->
                <input class="btnupdate btn-sm btn-dark" type="button" value="Cập nhật">
            </td>
        </tr>         
			</table>
            <p class="text-muted">
        Kích vào nút <b>"Cập nhật"</b> để cập nhật số lượng trên giỏ hàng. 
        Nhập số lượng bằng <b>0</b> loại bỏ sản phẩm.
    </p>
<!-- </form> -->
<?php endif; ?>
		</div>
		<div style="margin-top: -100px;" class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="<?php echo Helper::get_url('?c=listpro')?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
				
				
		
	</div><div class="clearfix"> </div>
</div>	</div>
<script>
$(document).ready(function () {
    // $('.btndelete').click(function(){
    //     $.post('http://localhost:8080/demoajax/?v=cart&a=delete',
    //       {key:$(this).val()},function(data){
    //         window.location.reload();
    //       });
    // });
    $('.btndelete').click(function(){
        $.ajax({
            url:'http://localhost:8080/DoAn/?v=cart&a=delete',
            type:'POST',
            dataType:'html',
            data:{key:$(this).val()},
            success:function(data){
                window.location.reload();
            }
        });
    });

    $('.btnupdate').click(function(){
        $.ajax({
            url:'http://localhost:8080/DoAn/?v=cart&a=update',
            type:'POST',
            dataType:'html',
            data:$('.newqty').serialize(),
            success:function(data){
                window.location.reload();
            }
        });
    });
});
</script>


