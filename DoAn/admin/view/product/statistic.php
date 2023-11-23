
<?php
   $result = ProductDB::getStatistics();
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
<h5>Thống kê số lượng sản phẩm</h5>
<table>
    <tr>
        <th>STT</th>
        <th>Tên Danh Mục</th>
        <th>Số Lượng</th>
    </tr>
    <?php 
         $Stt=1;
        if(!empty($result))
            foreach ($result as $row) : ?>
    <tr>
        <td><?php echo  "".$Stt++; ?></td>
        <td><?php echo  $row['ten']; ?></td>
        <td><?php echo $row['soluong']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
