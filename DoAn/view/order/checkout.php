<?php
   
   $products = ProductDB::getProducts();


   if(!Form_Authen:: is_user())
       Helper::redirect_js(Helper::get_url('?c=login'));
   
       Database::db_connect();     
   $email = Form_Authen::get_current_email();
   $sql = "select * from nguoidung where email = :email";
   $params = [
      'email' => $email
   ];
   $user =  Database::db_get_row($sql,$params);
   if(Helper::is_submit('checkout')){
      //Tao don hang
      $hoten = Helper::input_value('hoten');
      $sodt = Helper::input_value('sodt');
      $diachi = Helper::input_value('diachi');
      $hinhthuc = Helper::input_value('hinhthuc');
      $ghichu = Helper::input_value('ghichu');
      $sql = "call sp_taodonhang(:idnd,:hoten,:sodt,:diachi,:hinhthuc,:ghichu,@iddh)";
      $params = [
         'idnd' => $user['idnd'],
         'hoten' => $hoten,
         'sodt' => $sodt,
         'diachi' => $diachi,
         'hinhthuc' => $hinhthuc,
         'ghichu' => $ghichu
      ];
      if((!empty($_SESSION['cart']) || count($_SESSION['cart']) != 0) &&  Database::db_execute($sql,$params))
      {
        $iddh =  Database::db_get_value("select @iddh");
        foreach( $_SESSION['cart'] as $key => $item ){
            $Size= Helper::input_value('Size');
            $sql = "call sp_taochitietdonhang1(:iddh,:idsp,:soluong,:Size)";
            $params = [
            'iddh' => $iddh,
            'idsp' => $key,
            'soluong' => $item['qty'],
            'Size'=>$Size
            ];
            Database::db_execute($sql,$params);    
        }
        $_SESSION['cart'] = [];
        Helper::redirect_js(Helper::get_url('?c=order'));
       } 
   }
   Database::db_disconnect();     
?>
<style>
    table{
        margin:5px;
    }
    table, th, td{
        padding:0.5em 1em;
    }
</style>

		<div class="container">
        <div class="ele-bottom-grid">
            <h3><center> Đơn Hàng Của Bạn</center></h3>
            <?php if (empty($_SESSION['cart']) || count($_SESSION['cart']) == 0) : ?>
               <center><p>Không có sản phẩm nào</p></center> 
               <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="<?php echo Helper::get_url('?c=listpro')?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
            <?php else: ?>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình Ảnh</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Chọn size</th>
                    <th>Thành tiền</th>
                   
                </tr>
                </thead>
            <?php foreach( $_SESSION['cart'] as $key => $item ) :
                $cost  = number_format($item['cost'], 0,',','.');
                $total = number_format($item['total'], 0,',','.');
            ?>
                <tr class="rem1">
                <td class="invert"><?php echo $item['name']; ?></td>
                <td class="invert-image">
                            <img style="margin: 5px -1000px 5px 5px;" src="<?php 
                  if(!empty($products))
                     foreach ($products as $product) : ?>  
                     <?php  if(strcmp($product->getTen(),$item['name'])== 0)  echo "./public/img/". $product->getHinhanh();?>
                      <?php endforeach; ?>"  alt=" " class="img-responsive" />
                       
                        </td>
                <td  class="invert">$ <?php echo $cost; ?></td>
                <td  class="invert"><?php echo $item['qty']; ?></td>
                 <td class="invert" >
                     <form id="editform" action="" method="post">
                        <div class="form-group">
                          <select class="form-control" name="Size" id="" require="">
                            <option value="2">M</option>
                            <option value="3">L</option>
                            <option value="4">XL</option>
                          </select>
                        </div>
                    </td>
                    <td class="invert"> $ <?php echo $total; ?></td>
                </tr>
            <?php endforeach; ?>
                <tr class="rem1">
                    <td colspan="5" style="text-align: right;"><b>Tổng Thành Tiền</b></td>
                     <td colspan="1">$ <?php echo  get_subtotal_cart(); ?></td>
                </tr>
            </table>
            <?php endif; ?>
        </div>
    </div>
        

   
    <?php if(!empty($user)): ?>
        
       
	
      <div class="py-5 text-center"> 
        
        <h2>Thông tin khách hàng</h2>
       
         </div>

    <div >
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" id="frmlogout" action="" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Họ Và Tên</label>
                        <input type="text" class="form-control"  name="hoten" id="firstName" placeholder="Họ Và Tên" value="<?php echo $user['hoten'];?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Số Điện Thoại</label>
                        <input type="text" class="form-control" name="sodt" id="lastName" placeholder="Số Điện Thoại" value="<?php echo $user['sodt'];?>" required="">
                        <div class="invalid-feedback" > Valid Number phone is required. </div>
                    </div>
                </div>
 
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="diachi" id="address" value="<?php echo $user['diachi'];?>" placeholder="Địa Chỉ" required="">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>
                <div class="mb-3">
                    <label for="address2">Ghi Chú <span class="text-muted"></span></label>
                    <input type="text" class="form-control" id="address2" name="ghichu" placeholder="Nội Dung">
                </div>
           
                <hr class="mb-4">
              
                <h4 class="mb-3">Thanh Toán</h4>
                <div class="form-group custom-control custom-radio">
                          <select class="form-control" name="hinhthuc" id="credit">
                           
                            <option checked="" required="" class="custom-control-label" for="debit" value="1">Thanh Toán Tại Nhà</option>
                            <option class="custom-control-label" for="debit" value="2">Thanh Toán Online</option>
                          </select>
                        </div>
                <!-- <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" name="hinhthuc" value="1" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Nhận Tiền Tại Nhà</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" name="hinhthuc" value="2" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Thanh Toán Online</label>
                    </div>
                </div> -->
               
              
                <hr class="mb-4">
                <input type="hidden" name="action" value="checkout"> 
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div><?php endif; ?>
    </div>
        </div>
  



        <div class="clearfix"> </div>
        </div>
        <br>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())
</script>
<script>
    $(document).ready(function () {
        //form validation
        $('#editform').validate({
            rules: {
               
               Size: {
                   required: true
               }
           },
           messages: {
             
               Size: {
                   required: "<span style='color:red;width:200px' class='ml-2'>Phải nhập Size sản phẩm !</span>"
               }         
            }
        });
    });
   </script>
