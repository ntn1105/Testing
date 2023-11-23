

<main class="app-content"> 
    <?php
   $result = ProductDB::getStatistics();
   
   $categories = CategoryDB::getCategories();
   $paging_html = "";
     $categories = CategoryDB::getCategoriesPaging($paging_html);
  
?>
    <div class="row">
      <div class="col-md-8">
        <div class="tile">
          <h3 class="tile-title">Danh mục sản phẩm</h3>
          <form action="<?php echo Helper::get_url('admin/?c=findcat')  ?>" method="post" class="m-0">
            <table class="noborder m-0">
                <tr>
                    <td class="noborder">
                        <input type="text" name="search" id="" placeholder="Tìm kiếm ...">
                    </td>
                    <td class="noborder">
                        <input type="hidden" name="action" value="search">
                        <input type="submit" value="Tìm kiếm">
                    </td>
                </tr>
            </table>
        </form>
         <div class="du--lieu-san-pham">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
               
                <th class="so--luong">STT</th>
              
                <th class="so--luong">Tên Danh Mục</th> 
                 <th class="so--luong">Số lượng sản phẩm</th>
                <th class="so--luong" >Tính Năng</th>
   
              </tr>
             </thead>
            <tbody> 
               <?php 
                $Stt=1;
                 if(!empty($categories)):
                           foreach($categories as $category):
                  ?>
           <tr>
             <td><?php echo  "".$Stt++; ?></td>
             <td><a  href="<?php echo Helper:: get_url('admin/?c=listprocat&id=' . $category->getId()); ?>"><?php echo $category->getName(); ?></a></td>
             <td><?php  if(!empty($result)) foreach ($result as $row) : ?><?php if(strcmp($row['ten'],$category->getName())== 0) {echo $row['soluong'];} ?><?php endforeach;?>  </td>
              <td>
                
                               <div>
                                        <form action="" method="post">
                                         <input type="hidden" name="id" value="<?php echo $category->getId(); ?>">
                                         <input type="hidden" name="action" value="deletecat">
                                         <button type="submit" title="Xóa" class="btn btn-primary fas fa-trash-alt"></button>
                                        </form> 
                                        <a  href="<?php  echo Helper::get_url('admin/?c=editcat&id=' . $category->getId());?>"><button class="btn btn-primary btn-sm edit" title="Sửa"><i class="fas fa-edit"></i>
                                        </button></a>
               
                                      </div>
                 </td>
            </tr> <?php endforeach; endif; ?>
            </tbody>
         
</div>
           </table>   <div class="mt-3">
<?php echo $paging_html;?>
          </div>
           <div class="alert">
              <i class="fas fa-exclamation-triangle"></i> <a href="<?php echo Helper::get_url('admin/?c=addcat') ?>">Thêm danh mục</a>
           </div>
        </div>
      </div>
    </div>
</main>

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

