
<?php
   
   //    
      if(Form_Authen::is_user())  
      $email = Form_Authen::get_current_email();
      $users=UsersDB::getUsers();
      $donhangs=DonhangDB::getDonhang(); 
      $products=ProductDB::getProducts();
      $chitiets = ChitietdonhangDB::getChitiet();
    
  
   ?>
   
   
   <!-- //banner -->
   <!-- check out -->
   <div class="container">
<div style="margin-top: -100px;" class="checkout">

  <div   class="ele-bottom-grid">
           <h3>My Order</h3>            
               <center><p style="margin-top: -50px;">Cảm ơn quý khách hàng đã ủng hộ shop</p></center> 
       <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
               <table class="timetable_sub">
                   <thead>
                       <tr>
                      
                       <th>Mã Đơn Hàng</th>
                       <th>Họ Và Tên</th>
                       <th>Emali</th>
                      <th>Tình Trạng</th>
                      <th>Ngày Đặt</th>
                      <th>Xửa lý</th>
                      <th>Tính năng</th>
                       </tr>
                   </thead>
                         
                   <?php  $stt=1; 
                    foreach ($users as $user):
                        if(strcmp($user->getEmail(),$email)==0):
                             foreach ($donhangs as $donhang):
                                if($user->getIdnd()==$donhang->getIdnd()):?> 
                       <tr class="rem1">  
     
                           <td  class="invert">
                           <?php echo  $donhang->getMadh(); ?>
                           </td>
                           <td  class="invert">
                            <?php  echo  $user->getHoten(); ?> 
                           </td>
                           <td  class="invert">
                            <?php  echo  $user->getEmail();?>  
                           </td>
                           <td  class="invert">
                           <?php  if ( $donhang->getIdttdh()=="1") {echo '<strong >Chưa Thanh Toán</strong>';}
                                    else{ echo '<strong  >Đã Thanh Toán  và Giao Thành Công</strong>';}
                                      ?>
                            </td> 
                           <td  class="invert">
                              <?php echo  $donhang->getNgaydat(); ?>
                            </td>
                            <td class="invert">
                              <?php if ( $donhang->getNgayxuly()=="1") {echo '<strong > Chờ Xác Nhận</strong>';}
                                        else{ echo '<strong >Đã Xác Nhận </strong>';}
                                      ?>
                                
                            </td> 
                            <td  class="invert">
                            <form action="" method="post">
                                         <input  type="hidden" name="id" value=" <?php echo  $donhang->getIddh(); ?>">
                                        <input type="hidden" name="action" value="deletebill">
                                         <button type="submit" title="Xóa" class="btn btn-primary fas fa-trash-alt"></button>
                                        </form> 
                            </td>
                         </tr>
                      <?php  endif;endforeach;endif; endforeach; ?>
              
               </table>
     

   
  
       </div> 
          <div style="margin-top: 1px;" class="checkout-left">	
               <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                  <a href="<?php echo Helper::get_url('?c=listpro')?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                </div>
          </div>
       <div class="clearfix"> </div>
   </div>	

</div>
 </div>
   <?php                  
 if(Helper::is_submit('deletebill')){ 
        $donhang= new Donhang();
        $donhang->setIddh(Helper::input_value('id'));
        var_dump($donhang);
        if(!empty($donhang) && DonhangDB::deleteDonhang($donhang)){
            Helper::redirect(Helper::get_url('?c=order'));
        }
    }
?>

   
   
   
   
   