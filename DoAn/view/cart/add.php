<!-- <h5>Thêm sản phẩm giỏ hàng</h5> -->
<?php
   $idsp = Helper::input_value('id');
   $qty = Helper::input_value('qty');
   if(!empty($idsp) && !empty($qty)){
     add_item_cart($idsp, $qty);
      // redirect_js(get_url('?c=listcart'));
   }
   else{
         add_item_cart($idsp, 1);
         // $uri = input_value('uri');
         // if(!empty($uri))
         //    redirect_js(get_url($uri));
         // redirect_js(get_url('.'));
   }
?>

