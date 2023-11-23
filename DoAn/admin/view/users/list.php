<?php
$users = UsersDB::getUsers();
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
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="<?php echo Helper::get_url('admin/?c=listUs');?>"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách nhân viên</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">

            <div class="row element-button">
              <div class="col-sm-2">

                <a class="btn btn-add btn-sm" href="form-add-nhan-vien.html" title="Thêm"><i class="fas fa-plus"></i>
                  Tạo mới nhân viên</a>
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
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
              <thead>
                <tr>
                  <th >STT</th>
                  <th>ID nhân viên</th>
                  <th width="150">Họ và tên</th>
                  <th width="300">Email</th>
                  <th>SĐT</th>
                  <th>Chức vụ</th>
                  <th width="100">Tính năng</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php 
          $stt=1;
          if(!empty($users))
              foreach ($users as $user1):?>
                <tr>
                <td> <center> <?php echo "".$stt++;?> </center> </td>
                <td><center> MAND<?php echo $user1->getIdnd(); ?></center></td>
                <td><?php echo $user1->getHoten(); ?></td>
                <td><?php echo $user1->getEmail(); ?></td>
                <td><?php echo $user1->getSodt(); ?></td>
                <td style="color: red;"> <?php  if($user1->getKieu()==1){
                                        echo "Admin";}
                                        else
                                        echo "User";
                                         ?>
                </td>
                <td class="table-td-center">

                       <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $user1->getIdnd(); ?>">
                        <input type="hidden" name="action" value="deleteUs">
                         <button type="submit" title="Xóa" class="btn btn-primary fas fa-trash-alt"></button>
                        </form>
                        <a  href="<?php echo Helper::get_url('admin/?c=editUs&id=' . $user1->getIdnd())?>"><button class="btn btn-primary btn-sm edit" title="Sửa"><i class="fas fa-edit"></i>
                                          </button></a>
                         <!-- <form action="" method="post">
                         <input type="hidden" name="id" value="<?php echo $user1->getIdnd(); ?>">
                          <input type="hidden" name="action" value="editUs">
                           <button class="btn btn-primary btn-sm edit fas fa-edit" type="button" title="Sửa"  id="show-emp" data-toggle="modal"
                            data-target="#ModalUP"></button>
                            </form>              -->
                  </td>
                </tr>
                <?php endforeach; ?> 

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!--
  MODAL
-->
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
    data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Chỉnh sửa thông tin nhân viên cơ bản</h5>
              </span>
            </div>
          </div>
     <form action="" method="post" id="editUs">  
          <div class="row">

            <div class="form-group col-md-6">
              <label class="control-label">Họ và tên</label>
              <input class="form-control" type="text" required name="hoten" value="<?php echo !empty($user)?$user->getHoten():""; ?>">
            </div>
            <div class="form-group  col-md-6">
              <label class="control-label">Số điện thoại</label>
              <input class="form-control" type="number" required name="sodt" value="<?php echo !empty($user)?$user->getSodt():""; ?>">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Địa chỉ email</label>
              <input class="form-control" type="email" name="email" required value="<?php echo !empty($user)?$user->getEmail():""; ?>">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Địa chỉ </label>
              <input class="form-control" type="text" name="diachi" required value="<?php echo !empty($user)?$user->getDiachi():""; ?>">
            </div>

          </div>

          <BR>
          <a href="<?php //echo Helper::get_url('admin/?c=editUs&id='.$user->getIdnd());  ?>" style="    float: right;
           font-weight: 600;
          color: #ea0000;">Chỉnh sửa nâng cao</a>
          <BR>
          <BR><input type="hidden" name="id" value="<?php echo !empty($user)?$user->getIdnd():""; ?>">
      <input type="hidden" name="action" value="editUs">
      <button class="btn btn-save" type="submit">Lưu lại</button>
      <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
      <BR>
        </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  
  <!--
  MODAL
-->

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
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
  <script>
    function deleteRow(r) {
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("myTable").deleteRow(i);
    }
    jQuery(function () {
      jQuery(".trash").click(function () {
        swal({
          title: "Cảnh báo",
         
          text: "Bạn có chắc chắn là muốn xóa nhân viên này?",
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

    //EXCEL
    // $(document).ready(function () {
    //   $('#').DataTable({

    //     dom: 'Bfrtip',
    //     "buttons": [
    //       'excel'
    //     ]
    //   });
    // });


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
    //In dữ liệu
    var myApp = new function () {
      this.printTable = function () {
        var tab = document.getElementById('sampleTable');
        var win = window.open('', '', 'height=700,width=700');
        win.document.write(tab.outerHTML);
        win.document.close();
        win.print();
      }
    }
    //     //Sao chép dữ liệu
    //     var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

    // copyTextareaBtn.addEventListener('click', function(event) {
    //   var copyTextarea = document.querySelector('.js-copytextarea');
    //   copyTextarea.focus();
    //   copyTextarea.select();

    //   try {
    //     var successful = document.execCommand('copy');
    //     var msg = successful ? 'successful' : 'unsuccessful';
    //     console.log('Copying text command was ' + msg);
    //   } catch (err) {
    //     console.log('Oops, unable to copy');
    //   }
    // });


    //Modal
    $("#show-emp").on("click", function () {
      $("#ModalUP").modal({ backdrop: false, keyboard: false })
    });
  </script>
</body>

</html>
<?php
    if(Helper::is_submit('deleteUs')){
        $user2= new Users();
        $user2->setIdnd(Helper::input_value('id'));
        if(!empty($user2) && UsersDB::deleteUsers($user2)){
            
            Helper::redirect(Helper::get_url('admin/?c=listUs'));}
        else{

            echo "<script>alert('Không thể xóa hãy quay về trang chính!');</script>"; 
            
        }
    }
?>
<?php
// $user=UsersDB::getUsersById(Helper::input_value('id'));
// if(Helper::is_submit('editUs')){
//    $user->setHoten(Helper::input_value('hoten'));
//    $user->setSodt(Helper::input_value('sodt'));
//    $user->setEmail(Helper::input_value('email'));

//    $user->setDiachi(Helper::input_value('diachi'));
  
//    if(!empty($user)&&UsersDB::updateUsers($user)){
//      Helper::redirect(Helper::get_url('admin/?c=listUs'));
//    }
//    else
//    echo "<script>alert('Không thể Sửa hãy quay về trang chính!');</script>";
// }


?>
