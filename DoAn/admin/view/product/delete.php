<?php
    if(Helper::is_submit('deletepro')){
        $product= new Product();
        if($product->setId(Helper::input_value('id')))
        echo "<script>alert('banjcos muosn xóa!');</script>"; 
        if(!empty($product) && ProductDB::deleteProduct($product)){
            Helper::redirect(Helper::get_url('admin/?c=listpro'));
        }
        else{

            echo "<script>alert('Không thể xóa hãy quay về trang chính!');</script>"; 
            
        }
    }
?>
<style>
   table, tr,td{
       padding: 0.5em;
   }
</style>
<h5>Xác nhận thông tin</h5>
<h6>Bạn có muốn xóa danh mục này không ?</h6>
<form action="" method="post">
    <table>
        <tr>
            <td>
                <input type="hidden" name="action" value="deletepro">
                <input type="submit" value="Chấp nhận">
            </td>
            <td>
                <a href="<?php echo Helper::get_url('admin/?c=listpro') ?>">Không</a>
            </td>
        </tr>
    </table>
</form>
