<?php
    if(Helper::is_submit('deleteUs')){
        $user= new Users();
        $user->setIdnd(Helper::input_value('id'));
        if(!empty($user) && UsersDB::deleteUsers($user)){
            
            Helper::redirect(Helper::get_url('admin/?c=listUs'));}
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
                <input type="hidden" name="action" value="deleteUs">
                <input type="submit" value="Chấp nhận">
            </td>
            <td>
                <a href="<?php echo Helper::get_url('admin/?c=listUs') ?>">Không</a>
            </td>
        </tr>
    </table>
</form>