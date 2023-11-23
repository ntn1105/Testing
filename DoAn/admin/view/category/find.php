
<?php
   $search = Helper::input_value('search');
   $categorys= CategoryDB::findCategory($search);
?>

<style>
    table{
        margin:5px;
    }
    table, th, td{
        border:0.5px solid black;
        padding:0.5em 1em;
        border-collapse: collapse;
    }
</style>
<h5>Kết quả tìm kiếm</h5>
<table>
    <tr>
        <th>Mã SP</th>
        <th>Tên danh muc</th>
        
    </tr>
    <?php 
    $stt=1;
        if(!empty($categorys))
            foreach ($categorys as $category) : ?>
    <tr>
        <td><?php echo $stt++; ?></td>
        <td><?php echo $category->getName(); ?></td>
        
    </tr>
    <?php endforeach; ?>
</table>
<p>
    <b>
         <a class="text-muted" href="<?php echo Helper::get_url('admin/?c=listcat');?>">Quản lý sản phẩm</a>
    </b>
</p>




