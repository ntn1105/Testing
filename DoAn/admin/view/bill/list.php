<?php

$donhangs=DonhangDB::getDonhang();
$users = UsersDB::getUsers();

?>
  <?php                  
                         $donhang = DonhangDB::getDonhangById(Helper::input_value('id'));
                         if(Helper::is_submit('editbill1')){   
                        
                            $donhang->setNgayxuly(Helper::input_value('ngayxuly'));
                       
                          if(!empty($donhang)&&DonhangDB::updateDonhang($donhang)){
                            Helper::redirect(Helper::get_url('admin/?c=listbill'));
                              
                          }  
                            
                      }                  
    ?>
    <?php                  
                         $donhang = DonhangDB::getDonhangById(Helper::input_value('id'));
                         if(Helper::is_submit('editbill2')){   
                       
                         $donhang->setIdttdh(Helper::input_value('idttdh'));
  
                          if(!empty($donhang)&&DonhangDB::updateDonhang($donhang)){
                            Helper::redirect(Helper::get_url('admin/?c=listbill'));
                              
                          }  
                           
                      }                                    
    ?>
    <?php                  
 if(Helper::is_submit('deletebill')){ 
        $donhang= new Donhang();
        $donhang->setIddh(Helper::input_value('id'));
        if(!empty($donhang) && DonhangDB::deleteDonhang($donhang)){
            Helper::redirect(Helper::get_url('admin/?c=listbill'));
        }
    }
?>
                    

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách đơn hàng | Quản trị Admin</title>
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
      <li><a class="app-nav__item" href="/index.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng</b></a></li>
        </ul>
        <div id="clock"></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="row element-button">
                <div class="col-sm-2">
  
                  <a class="btn btn-add btn-sm" href="form-add-don-hang.html" title="Thêm"><i class="fas fa-plus"></i>
                    Tạo mới đơn hàng</a>
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
                    <th>STT</th>
                <th>Mã Đơn Hàng</th>
                <th>Họ Và Tên</th>
                <th>Emali</th>
                <th>Tình Trạng</th>
                <th>Ngày Đặt</th>
                <th>Xửa lý</th>
                    <th>Tính năng</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
          $stt=1;
          if(!empty($donhangs))
              foreach ($donhangs as $donhang):?>
                  <tr>
                    <td> <?php echo "".$stt++;?>  </td>
                    <td><a  href="<?php echo Helper::get_url('admin/?c=chitiet&iddh=' . $donhang->getIddh())?>"><?php echo $donhang->getMadh(); ?></a> </td>
                    <td> <a  href="<?php echo Helper::get_url('admin/?c=chitiet&iddh=' . $donhang->getIddh())?>"><?php 
                             if(!empty($users))
                               foreach ($users as $user):?>
                            <?php if( $donhang->getIdnd()==$user->getIdnd()) echo $user->getHoten(); ?>
                               <?php endforeach; ?></a></td>
                    <td> <a  href="<?php echo Helper::get_url('admin/?c=chitiet&iddh=' . $donhang->getIddh())?>"><?php 
                             if(!empty($users))
                                foreach ($users as $user):?>
                            <?php if( $donhang->getIdnd()==$user->getIdnd()) echo $user->getEmail(); ?>
                            <?php endforeach; ?></a></td> 
                    <td>
                    <form action="" method="post" >       
                               <input type="hidden" name="id" value="<?php echo $donhang->getIddh(); ?>">       
                               <?php if ( $donhang->getIdttdh()=="1") echo ' <input type="radio" name="idttdh" checked value="2"><strong>Chưa Thanh Toán</strong>
                               <input type="hidden" name="action" value="editbill2">  
                               <button type="submit" name="editbill2" class="btn btn-primary"> Xác Nhận Đã Thanh Toán</button>';?>
                            </form>
                            <?php if ($donhang->getIdttdh()=="2") echo ' <input type="radio" checked  ><span class="badge bg-success">Đã thanh toán</span>';?>
                     </td>
                    <td><?php echo $donhang->getNgaydat(); ?></td>

                    <td>
                            <form action="" method="post" >               
                               <?php if ( $donhang->getNgayxuly()=="1") echo ' <input type="radio" name="ngayxuly"   checked value="2"><strong>Xác Nhận Đơn Hàng</strong>';?>
                               <?php if ( $donhang->getNgayxuly()==null) echo ' <input type="radio" name="ngayxuly"   checked value="2"><strong>Xác Nhận Đơn Hàng</strong>';?>
                               <?php if ( $donhang->getNgayxuly()=="2") echo ' <input type="radio" name="ngayxuly"  value="1">Hủy Xác Nhận';?>
                               <input type="hidden" name="id" value="<?php echo $donhang->getIddh(); ?>">      
                               <input type="hidden" name="action" value="editbill1">
                               <button type="submit" name="editbill1" class="btn btn-primary"> Đồng Ý</button>
                            </form>
                    </td>
                   
                    <td>
                    <div>
                                        <form action="" method="post">
                                         <input  type="hidden" name="id" value="<?php echo !empty($donhang)?$donhang->getIddh():""; ?>">
                                         <input type="hidden" name="action" value="deletebill">
                                         <button type="submit" title="Xóa" class="btn btn-primary fas fa-trash-alt"></button>
                                        </form> 
                             
                                        </div>
                                        
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
         
          text: "Bạn có chắc chắn là muốn xóa đơn hàng này?",
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