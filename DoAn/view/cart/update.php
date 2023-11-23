<?php
//    if(is_submit('Update')){
        $new_qty_list = Helper::input_value('newqty',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
        foreach($new_qty_list as $key => $qty) {
            if ($_SESSION['cart'][$key]['qty'] != $qty) {
                update_item_cart($key, $qty);
                //redirect_js(get_url('?c=listcart'));
            }
    }
//    }
?>