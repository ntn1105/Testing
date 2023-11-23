<?php
    $category = CategoryDB::getCategoryById(Helper::input_value('id'));
    if(Helper::is_submit('editcat')){
        $category->setName(Helper::input_value('ten'));
        if(!empty($category) && CategoryDB::updateCategory($category)){
            Helper::redirect(Helper::get_url('admin/?c=listcat'));
        }
        Helper::redirect(Helper::get_url('admin/?c=listcat'));
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

<!-- Navbar-->

<main class="app-content">

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Sửa danh mục</h3>
      <div class="tile-body">
        <div class="row element-button">
          <div class="col-sm-2">
            <a class="btn btn-add btn-sm" href="<?php echo Helper::get_url('admin/?c=addpro');?>"><i
                class="fas fa-folder-plus"></i> Thêm sản phẩm</a>
          </div>
          <div class="col-sm-2">
            <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i
                class="fas fa-folder-plus"></i> Thêm tình trạng</a>
          </div>
        </div>
        <form id="editCat" action="" method="post" enctype="multipart/form-data">
         
          <div class="form-group col-md-3">
            <label class="control-label">Sửa</label>
            <input class="form-control" type="text"name="ten" id="" value="<?php echo $category->getName();?>" require>
          </div>
          <input type="hidden" name="action" value="editcat">
        <input class="btn-sm btn-dark" type="submit"  value="Sửa danh mục">
      <a class="btn btn-cancel" href="<?php echo Helper::get_url('admin/?c=listpro');?>">Hủy bỏ</a>
    </div>
        </form>
</main>



</body>

</html>




<script>
$(document).ready(function () {
    $("#editCat").validate({
        rules: {
            ten: {
                required: true
            }
        },
        messages: {
            ten: {
                required: "<span style='color:red;width:200px;margin-left:5px'>Phải nhập tên danh mục !</span>"
            }
        }
    });
});
</script>