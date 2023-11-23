<!-- <h5>Xóa sản phẩm giỏ hàng</h5> -->
<?php 
    $key = Helper::input_value('key');
    //if(!empty($key)){
        update_item_cart($key, 0);
        //redirect_js(get_url('?c=listcart'));
    //}
?>