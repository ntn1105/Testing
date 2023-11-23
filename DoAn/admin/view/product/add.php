<?php
// if(Helper::is_submit('addpro')){

   
//     $product=new Product();
//     $product->setTen(Helper::input_value('ten'));
//     $product->setGia(Helper::input_value('gia'));
//     $product->setHinhanh(Helper::input_value('hinh_anh'));
   
//    Helper::upload_file('hinh_anh',$product->setHinhanh(Helper::input_value('hinh_anh')));
//     $product->setNoidung(Helper::input_value('noi_dung'));
//     $product->setThuocmenu(Helper::input_value('thuoc_menu'));
//     $product->setNoibat(Helper::input_value('noi_bat'));
//     $product->setTrangchu(Helper::input_value('trang_chu'));
//     if(!empty($product)&& ProductDB::addProduct($product)){
//         Helper::redirect(Helper::get_url('admin/?c=listpro'));
//     }


   if(Helper::is_submit('addpro')){
       $tensp = Helper::input_value('ten');
       $gia = Helper::input_value('gia');
       $noi_dung = Helper::input_value('mota');
       $gia = Helper::input_value('gia');
       $giachinh=Helper::input_value('giachinh');
       $thuoc_menu=Helper::input_value('thuoc_menu');
       $noi_bat=Helper::input_value('noi_bat');
       $trang_chu=Helper::input_value('trang_chu');
       $imgfile = '';
       Helper::upload_file('hinh_anh',$imgfile);
       $sql = "INSERT INTO san_pham( ten, gia,giachinh, hinh_anh, noi_dung, thuoc_menu, noi_bat, trang_chu) 
        VALUES (:ten,:gia,:giachinh,:hinh_anh,:noi_dung,:thuoc_menu,:noi_bat,:trang_chu)";
         $params = [
             "ten" => $tensp ,
             "gia" => $gia ,
             "giachinh" => $giachinh ,
             "hinh_anh" => $imgfile ,
             "noi_dung" =>  $noi_dung,
             "thuoc_menu" => $thuoc_menu,
             "noi_bat" =>  $noi_bat,
             "trang_chu" => $trang_chu
             
         ];
       if(Database::db_execute($sql,$params))
       {
          Helper::redirect_js(Helper::get_url('admin/?c=listpro'));
       }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Thêm sản phẩm | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>

  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách sản phẩm</li>
        <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới sản phẩm</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i
                    class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" href="<?php echo Helper::get_url('admin/?c=addcat') ?>"><i
                    class="fas fa-folder-plus"></i>  Thêm danh mục</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i
                    class="fas fa-folder-plus"></i> Thêm tình trạng</a>
              </div>
            </div>
            <form id="editform" action="" method="post" enctype="multipart/form-data">
             
              <div class="form-group col-md-3">
                <label class="control-label">Tên sản phẩm</label>
                <input class="form-control" type="text"name="ten" id="" require>
              </div>


              <div class="form-group  col-md-3">
                <label class="control-label">Số lượng</label>
                <input class="form-control" type="number" name="noi_bat" id="" require>
              </div>
              
              <div class="form-group col-md-3">
                <label for="exampleSelect1" class="control-label">Danh mục</label>
                <select name="thuoc_menu"class="form-control" id="exampleSelect1">
                  <option>-- Chọn danh mục --</option>
                  <?php  $categories = CategoryDB::getCategories();
						if(!empty($categories))
                        foreach ($categories as $category) : ?>
							
                          <option selected="selected" value="<?php echo $category->getId(); ?>"><?php echo $category->getName().""; ?></option>
							
                         <?php endforeach; ?>
                         <option selected value=""></option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Giá Chính </label>
                <input class="form-control" type="text"name="giachinh" id="" require>
              </div>
              
              <div class="form-group col-md-3">
                <label class="control-label">Giá Khuyến Mãi </label>
                <input class="form-control" type="text"name="gia" id="" require>
              </div>
            
              <div class="form-group col-md-12">
                <label class="control-label">Ảnh sản phẩm</label>
                <div id="myfileupload">
                <input type="file" class="filestyle" data-input="true" data-text="Chọn tập tin ảnh" name="hinh_anh">
                </div>
                
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="mota" id="mota"></textarea>
                <script>CKEDITOR.replace('mota');</script>
              </div>
              </div>
              <input type="hidden" name="action" value="addpro">
            <input class="btn-sm btn-dark" type="submit"  value="Thêm sản phẩm">
          <a class="btn btn-cancel" href="<?php echo Helper::get_url('admin/?c=listpro');?>">Hủy bỏ</a>
        </div>
            </form>
  </main>


  
</body>

</html>
<script>
    $(document).ready(function () {
        //form validation
        $('#editform').validate({
            rules: {
               
               ten: {
                   required: true
               },
               noi_bat: {
                   required: true
               },
               gia: {
                   required: true,
                   number:true
               },
               giachinh: {
                   required: true,
                   number:true
               }
           },
           messages: {
             
               tensp: {
                   required: "<span style='color:red;width:200px' class='ml-2'>Phải nhập tên sản phẩm !</span>"
               },
               noi_bat: {
                   required: "<span style='color:red;width:200px' class='ml-2'>Phải nhập số lượng sản phẩm !</span>",
                   number: "<span style='color:red;width:200px' class='ml-2'>Phải nhập số !</span>"
               },
               gia: {
                   required: "<span style='color:red;width:200px' class='ml-2'>Phải nhập giá sản phẩm !</span>",
                   number: "<span style='color:red;width:200px' class='ml-2'>Phải nhập số !</span>"
               },
               giachinh: {
                   required: "<span style='color:red;width:200px' class='ml-2'>Phải nhập giá sản phẩm !</span>",
                   number: "<span style='color:red;width:200px' class='ml-2'>Phải nhập số !</span>"
            }}
        });

        // $('').summernote({
        //     height: 240,                 // set editor height
        //     minHeight: null,             // set minimum height of editor
        //     maxHeight: null,             // set maximum height of editor
        //     focus: false                 // set focus to editable area after 
        // });
    });
   </script>


