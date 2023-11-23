
<?php
    //$athenbasix=new Auth_Basic();
   $products = ProductDB::getProductsList();
   /*Paging*/    
   $paging_html = "";
   $products = ProductDB::getProductsPaging($paging_html);
  
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Danh sách nhân viên | Quản trị Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- or -->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
      
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
      
      </head>

<body onload="time()" class="app sidebar-mini rtl">

<main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="<?php echo Helper::get_url('admin/?c=listpro');?>"><b>Danh sách sản phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="<?php echo Helper::get_url('admin/?c=addpro');?>" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                                  class="fas fa-file-upload"></i> Tải từ file</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                  class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                                  class="fas fa-copy"></i> Sao chép</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                                  class="fas fa-file-pdf"></i> Xuất PDF</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                  class="fas fa-trash-alt"></i> Xóa tất cả </a>
                            </div>
                            <div class="col-sm-2">
                              <form action="<?php echo Helper::get_url('admin/?c=findpro')  ?>" method="post" class="m-0">
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
                            </div>

                          </div>
                          <div class="table-responsive">
                             <table class="table table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>ID sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình Ảnh</th>
                                    <th>Giá Chính</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Giá Khuyến Mãi</th>
                                    <th>Danh mục</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <?php 
                             if(!empty($products))
                                foreach ($products as $product) : ?>
                            <tbody>
                                <tr>
                                    
                                    <td><?php echo $product->getId(); ?></td>
                                    <td><?php echo $product->getTen(); ?></td>
                                    <td><img src="../public/img/<?php echo $product->getHinhanh(); ?>" alt="" width="100px;"></td>
                                    <td><?php echo $product->getGiachinh();?> đ </td>
                                    <td><?php echo $product->getNoibat(); ?>
                                      <?php  // $chitiets=ChitietdonhangDB::getChitiet();
                                      //  if(!empty($chitiets))
                                      //        foreach ($chitiets as $chitiet):?> 
                                            <?php //if($chitiet->getIdsp()==$product->getId())
                                      //        {  echo $product->getNoibat()-$chitiet->getSoluong().'';}
                                             ?>   
                                              <?php //endforeach; ?></td>
                                    <td><?php if( $product->getNoibat()>0 ) {echo '<span class="badge bg-success">Còn Hàng</span>';} elseif($product->getNoibat()==null){echo '<span class="badge bg-danger">Hết Hàng</span>';} else {echo '<span class="badge bg-danger">Hết Hàng</span>';} ?></td>
                                    <td><?php echo $product->getGia() ; ?> đ</td>
                                    <td>
                                    <?php  $categories = CategoryDB::getCategories();
                                    
                                   if(!empty($categories))
                                     
                                      foreach ($categories as $category) : ?>
							
                                       <?php if($product->getThuocmenu()==$category->getId()) echo $category->getName().""; ?>
							
                                             <?php endforeach; ?>
                                   </td>
                                    <td>
                                      <div>
                                        
                           
                                        <form  action="" method="post" id="form-delete">
                                         <input type="hidden" name="id" value="<?php echo !empty($product)?$product->getId():""; ?>">
                                         <input type="hidden" name="action" value="deletepro">
                                         <!-- <a  href="<?php echo Helper::get_url('admin/?c=listpro')?>"><button id="form-delete" class="btn btn-primary " title="xáo"><i class="fas fa-trash-alt">1</i> -->
                                         <button type="submit" title="Xóa" class="btn btn-primary btndelete fas fa-trash-alt"></button>
                                        </form> 
                                        
                                          </button></a>
                                        <a  href="<?php echo Helper::get_url('admin/?c=editpro&id=' . $product->getId())?>"><button class="btn btn-primary btn-sm edit" title="Sửa"><i class="fas fa-edit"></i>
                                          </button></a>
                                    
                                    <!-- <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php //echo !empty($product)?$product->getId():""; ?>">
                                     <input type="hidden" name="action" value="editpro">
                                    <button class="btn btn-primary btn-sm edit fas fa-edit" type="button" title="Sửa"  id="show-emp" data-toggle="modal"
                                     data-target="#ModalUP"></button>
                                    
                                    </form> -->
                                        </div>
                                        
                                    </td>
                                </tr>
                                
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <div class="mt-3">
                         <?php echo $paging_html; ?>
                          </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
  

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="src/jquery.table2excel.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
        //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
    </script>
    <script>
        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("myTable").deleteRow(i);
        }
        jQuery(function () {
            jQuery(".trash").click(function () {
                swal({
                    title: "Cảnh báo",
                    text: "Bạn có chắc chắn là muốn xóa sản phẩm này?",
                    buttons: ["Hủy bỏ", "Đồng ý"],
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Đã xóa thành công.!", {

                            });
                        }
                    });
            });
        });
        oTable = $('#sampleTable').dataTable();
        $('#all').click(function (e) {
            $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
            e.stopImmediatePropagation();
        });
    </script>
</body>

</html>
<?php
if(Helper::is_submit('deletepro')){
        $products = new Product();
        $products->setId(Helper::input_value('id'));
        var_dump($products);
        if(!empty($products) && ProductDB::deleteProduct($products)){
          
         
           Helper::redirect(Helper::get_url('admin/?c=listpro'));
        }
         else{
             echo "<script>alert('Không thể xóa hãy quay về trang chính!');</script>";            
         }
         if(!empty($products) && ProductDB::deleteProduct($products))
         {echo "<script>alert('Xóa sản phẩm thành công!');</script>";}
    }
?>
<!-- <script>
  $('.btndelete').click(function(ev){
    ev.preventDefault();
    var _href=$(this).attr('href');
    $('form#form-delete').attr('action',_href);
    if(confirm('Bạn có muốn xóa nó không !'));
    $('form#form-delete').submit();
  })
</script> -->



