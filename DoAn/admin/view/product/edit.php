<?php

 $product = ProductDB::getProductById(Helper::input_value('id'));
 if(Helper::is_submit('editpro')){
     $product->setTen(Helper::input_value('ten'));
     $product->setGia(Helper::input_value('gia'));
     $product->setGiachinh(Helper::input_value('giachinh'));
     $product->setNoidung(Helper::input_value('noi_dung'));
     $product->setThuocmenu(Helper::input_value('thuoc_menu'));
     $product->setHinhanh(Helper::input_value('hinh_anh'));
     $product->setNoibat(Helper::input_value('noi_bat'));
     $product->setTrangchu(Helper::input_value('trang_chu'));
     if(!empty($product)&&ProductDB::updateProduct($product)){
      Helper::redirect(Helper::get_url('admin/?c=listpro'));
  }  
    Helper::redirect(Helper::get_url('admin/?c=listpro'));
 }
//  if(Helper::is_submit('editpro')){
//     $tensp = Helper::input_value('ten');
//     $gia = Helper::input_value('gia');
//     $noi_dung = Helper::input_value('noi_dung');
//     $gia = Helper::input_value('gia');
//     $giachinh = Helper::input_value('giachinh');
//     $thuoc_menu=Helper::input_value('thuoc_menu');
//     $noi_bat=Helper::input_value('noi_bat');
//     $trang_chu=Helper::input_value('trang_chu');
//     $hinhanh=Helper::input_value('hinh_anh');
//     // $imgfile = '';
//     // Helper::upload_file('hinh_anh',$imgfile);
//     $sql="update san_pham set ten=:ten,gia=:gia,giachinh=:giachinh,hinh_anh=:hinh_anh,noi_dung=:noi_dung,thuoc_menu=:thuoc_menu,noi_bat=:noi_bat,trang_chu=:trang_chu where id=:productID";
//       $params = [
//           "productID"=>$product->getId(),
//           "ten" => $tensp ,
//           "gia" => $gia ,
//           "giachinh" => $giachinh,
//           // "hinh_anh" => $imgfile ,
//           "hinh_anh" => $hinhanh ,
//           "noi_dung" =>  $noi_dung,
//           "thuoc_menu" => $thuoc_menu,
//           "noi_bat" =>  $noi_bat,
//           "trang_chu" => $trang_chu    
//       ];
//     if(Database::db_execute($sql,$params))
//     {
//        Helper::redirect_js(Helper::get_url('admin/?c=listpro'));
//     }
 //}

?>


<!-- <style>
    table,tr,td{
        padding:0.5em;
    }
</style>
<main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Sửa Sản Phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
<form id="editform" action="" method="post" enctype="multipart/form-data" class="row g-3">
<table>
    <tr>
        <td>Tên sản phẩm</td>
        <td>
            <div class="col-md-4">
    <input type="text" name="ten" class="form-control is-valid" id="validationServer01" value="<?php echo !empty($product)?$product->getTen():""; ?>" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
        </td>
    </tr>
    <tr>
        <td>Giá</td>
        <td>
            <div class="col-md-4">
                <input type="text" class="form-control is-valid" id="validationServer02" name="gia" id="" value="<?php echo !empty($product)?$product->getGia():"";?>" required>
            <div class="valid-feedback">
                 Looks good!
             </div>
            </div>
        </td>
    </tr>
    
    <tr>
        <td>Mô tả</td>
        <td>
        <textarea name="noi_dung" id="noi_dung" rows="10" cols="80">
                <?php echo !empty($product)?$product->getNoidung():"";?>
        </textarea>
           
        </td>
    </tr>
    <tr>
        <td>Danh mục</td>
        <td>
            <input type="hidden" name="thuoc_menu" value="<?php echo !empty($product)?$product->getThuocmenu():"";?>" id=""require>
            <div class="col-md-4">
    <label for="inputState" class="form-label"></label>
    <select name="thuoc_menu">
                         <option> <?php  $categories = CategoryDB::getCategories();
                                    
                                    if(!empty($categories))
                                      
                                       foreach ($categories as $dm) : ?>
                             
                                        <?php if($dm->getId()==$product->getThuocmenu()){echo $dm->getName()."";} ?>
                             
                                              <?php endforeach; ?></option>
						<?php  
						if(!empty($categories))

                        foreach ($categories as $category) : ?>
							
                          <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName().""; ?></option>
							
                         <?php endforeach; ?>
                         
                         
					</select>


                    
  </div>
        </td>
    </tr>
    <tr>
        <td>Ảnh</td>
        <td>
            <div class="form-file form-file-sm">
              <input type="file"  name="hinh_anh" class="form-file-input" id="customFileSm" value="<?php echo !empty($product)?$product->getHinhanh():"";?>">
              <label class="form-file-label" for="customFileSm">
              </label>
            </div>
           
        </td>
    </tr>
    <tr>
        <td>Số Lượng</td>
        <td>
            <input type="number" name="noi_bat" id="" value="<?php echo !empty($product)?$product->getNoibat():"";?>" require>
        </td>
    </tr><input type="hidden" name="trang_chu" id="" value="<?php echo !empty($product)?$product->gettrangchu():"";?>" require>
     <tr>
        <td>Trang chu</td>
        <td>
            
        </td>
    </tr> -->
    <!-- <tr>
        <td></td>
        <td>
            <input type="hidden" name="action" value="editpro">
            <input class="btn-sm btn-dark" type="submit" value="Sửa sản phẩm">
        </td>
    </tr>
</table>
</form>
<p>
    <b>
         <a class="text-muted" href="<?php echo Helper::get_url('admin/?c=listpro');?>">Quản lý sản phẩm</a>
    </b>
</p>
</main> --> 


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sửa sản phẩm | Quản trị Admin</title>
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
  <script>

    function readURL(input, thumbimage) {
      if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
        var reader = new FileReader();
        reader.onload = function (e) {
          $("#thumbimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
      else { // Sử dụng cho IE
        $("#thumbimage").attr('src', input.value);

      }
      $("#thumbimage").show();
      $('.filename').text($("#uploadfile").val());
      $('.Choicefile').css('background', '#14142B');
      $('.Choicefile').css('cursor', 'default');
      $(".removeimg").show();
      $(".Choicefile").unbind('click');

    }
    $(document).ready(function () {
      $(".Choicefile").bind('click', function () {
        $("#uploadfile").click();

      });
      $(".removeimg").click(function () {
        $("#thumbimage").attr('src', '').hide();
        $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
        $(".removeimg").hide();
        $(".Choicefile").bind('click', function () {
          $("#uploadfile").click();
        });
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'pointer');
        $(".filename").text("");
      });
    })
  </script>
</head>

<body class="app sidebar-mini rtl">

  
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
          <h3 class="tile-title">Sửa Sản Phẩm</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i
                    class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i
                    class="fas fa-folder-plus"></i> Thêm danh mục</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i
                    class="fas fa-folder-plus"></i> Thêm tình trạng</a>
              </div>
            </div>
            <form id="editform" action="" method="post" enctype="multipart/form-data">
             
              <div class="form-group col-md-3">
                <label class="control-label">Tên sản phẩm</label>
                <input class="form-control" type="text"name="ten" value="<?php echo !empty($product)?$product->getTen():""; ?>" required id="" require>
              </div>


              <div class="form-group  col-md-3">
                <label class="control-label">Số lượng</label>
                <input class="form-control" type="number"name="noi_bat" value="<?php echo !empty($product)?$product->getNoibat():""; ?>" required id="" require>
              </div>
              
              <div class="form-group col-md-3">
                <label for="exampleSelect1" class="control-label">Danh mục</label>
                <input type="hidden" name="thuoc_menu" value="<?php echo !empty($product)?$product->getThuocmenu():"";?>" id=""require>
                <select name="thuoc_menu"class="form-control" id="exampleSelect1">
                <option value="<?php echo !empty($product)?$product->getThuocmenu():"";?>"> 
                          <?php  $categories = CategoryDB::getCategories();
                                    
                                    if(!empty($categories))
                                      
                                       foreach ($categories as $dm) : ?>
                             
                                        <?php if($dm->getId()==$product->getThuocmenu()){echo $dm->getName()."";} ?>
                             
                                              <?php endforeach; ?></option>
						<?php  
						if(!empty($categories))

                        foreach ($categories as $category) : ?>
							
                          <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName().""; ?></option>
							
                         <?php endforeach; ?>
                         
                         
					</select>
              </div>
              
              <div class="form-group col-md-3">
                <label class="control-label">Giá bán</label>
                <input class="form-control" type="text"name="giachinh" id="" value="<?php echo !empty($product)?$product->getGiachinh():"";?>" require>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Giá Khuyến Mãi</label>
                <input class="form-control" type="text"name="gia" id="" value="<?php echo !empty($product)?$product->getGia():"";?>" require>
              </div>
            
              <div class="form-group col-md-12">
                <label class="control-label">Ảnh sản phẩm</label>
                <div class="form-file form-file-sm">
              <input type="file"  name="" class="form-file-input" id="customFileSm" value="<?php echo $product->getHinhanh();?>">
              <label class="form-file-label" for="customFileSm">
              <input type="hidden" name="hinh_anh" value="<?php echo $product->getHinhanh();?>">
              </label>
              </div>
                
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea name="noi_dung" id="noi_dung" rows="10" cols="80">
                <?php echo !empty($product)?$product->getNoidung():"";?>
                </textarea>

              </div>
              </div>
              <input type="hidden" name="action" value="editpro">
               <input class="btn-sm btn-dark" type="submit"  value="Sửa sản phẩm">
              <a class="btn btn-cancel" href="<?php echo Helper::get_url('admin/?c=listpro');?>">Hủy bỏ</a>
            </div>
            </form>
  </main>


  
</body>

</html>
<script>
    // $(document).ready(function () {
    //     //validation
    //     $("#addform").validate({
    //         rules: {
    //             masp: {
    //                 required: true
    //             },
    //             tensp: {
    //                 required: true
    //             },
    //             mota: {
    //                 required: true
    //             },
    //             gia: {
    //                 required: true,
    //                 number:true
    //             }
    //         },
    //         messages: {
    //             masp: {
    //                 required: "<span style='color:red;width:200px' class='ml-2'>Phải nhập mã sản phẩm !</span>"
    //             },
    //             tensp: {
    //                 required: "<span style='color:red;width:200px' class='ml-2'>Phải nhập tên sản phẩm !</span>"
    //             },
    //             mota: {
    //                 required: "<span style='color:red;width:200px' class='ml-2'>Phải nhập mô tả sản phẩm !</span>"
    //             },
    //             gia: {
    //                 required: "<span style='color:red;width:200px' class='ml-2'>Phải nhập giá sản phẩm !</span>",
    //                 number: "<span style='color:red;width:200px' class='ml-2'>Phải nhập số !</span>"
    //             }
    //         }
    //     });
    // });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/2.1.0/bootstrap-filestyle.min.js"></script>

<script>
    CKEDITOR.replace('noi_dung');
</script>

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
               }
            }
        });

        // $('').summernote({
        //     height: 240,                 // set editor height
        //     minHeight: null,             // set minimum height of editor
        //     maxHeight: null,             // set maximum height of editor
        //     focus: false                 // set focus to editable area after 
        // });
    });
   </script>
<script>
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


