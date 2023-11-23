<style>
    table{
        margin:5px;
    }
    table, th, td{
        border:0.5px solid black;
        padding:0.1em 0.5em;
        border-collapse: collapse;
    }
</style>
<?php
     Database::db_connect();
    $sql = 'select * from san_pham where thuoc_menu = 2';
    $dssp =  Database::db_get_list($sql);
    Database::db_disconnect();
?>
<h5 class="mt-3 mb-3">Danh Sách Sản Phẩm Hãng Asus</h5>
<table>
    <tr>
        <th>STT</th>
        <th>Tên Sản Phẩm</th>
        <th>Giá SP</th>
        <th>Hành Động</th>
    </tr>
    <?php 
       $stt = 1;
       if(!empty($dssp)): 
          foreach($dssp as $sp):
    ?>
    <tr>
        <td><?php echo $stt++; ?></td>
        
        <td>
            <a class="text-muted" href="<?php echo Helper:: get_url('?c=listdetail&id=' . $sp['id']); ?>">
               <?php echo $sp['ten']; ?>
            </a>
            </td>
        <td><?php echo '$ ' . number_format($sp['gia'],0,',','.');  ?></td>
        <td>
            <!-- <form action='./?c=addcart' method="post">
                <input type="hidden" name="id" value=<?php //echo $sp['idsp'];?>>
                <button class="btn-sm btn-secondary mt-3" type="submit">
                    <i class="fas fa-plus"></i>
                    Thêm giỏ hàng
                </button>
            </form>  -->
            <button class="btnthemasus btn-sm btn-secondary mt-3 mb-3" type="button" value=<?php echo $sp['id'];?>>
                    <i class="fas fa-plus"></i>
                    Thêm giỏ hàng
            </button>
        </td>
    </tr>
    <?php endforeach; endif;?>
</table>

<script>
$(document).ready(function () {
    // $('.btnthemasus').click(function(){
    //     $.post('http://localhost:8080/demoajax/?v=cart&a=add',
    //       {id:$(this).val()},function(data){
    //          window.location.reload();
    //       });
    // });
    $('.btnthemasus').click(function(){
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