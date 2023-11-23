<?php
    if(Helper::is_submit('deletecat')){
        $category = new Category();
        $category->setId(Helper::input_value('id'));
        if(!empty($category) && CategoryDB::deleteCategory($category)){
            Helper::redirect(Helper::get_url('admin/?c=listcat'));
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
                <input type="hidden" name="action" value="deletecat">
                <input type="submit" value="Chấp nhận">
            </td>
            <td>
                <a href="<?php echo Helper::get_url('admin/?c=listcat') ?>">Không</a>
            </td>
        </tr>
    </table>
</form>