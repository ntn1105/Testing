<?php
$slides=SlideDB::getSlide();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chỉnh Sửa Banner</title>
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
                <li class="breadcrumb-item active"><a href="#"><b>Chỉnh Sửa Banner</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="<?php echo Helper::get_url('admin/?c=addSlide');?>" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo Banner mới</a>
                            </div>
                            
                          </div>
                          <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>Stt</th>
                                    <th>Hình Ảnh</th>
                                    <th>Liên Kiết(nếu có)</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <?php 
                             $Stt=1;
                             if(!empty($slides))
                                foreach ($slides as $slide) : ?>
                            <tbody>
                                <tr>
                                    
                                       <td><?php echo  "".$Stt++; ?></td>
                                    
                                    <td><img src="../public/imgslide/<?php echo $slide->getHinh();?>" alt="" width="100px;"></td>
                                    <td><a href="<?php echo $slide->getLienket(); ?>">Liên Kết</a><td>
                                         <div>
                                        <form action="" method="post">
                                         <input type="hidden" name="id" value="<?php echo !empty($slide)?$slide->getId():""; ?>">
                                         <input type="hidden" name="action" value="deleteSlide">
                                         <button type="submit" title="Xóa" class="btn btn-primary fas fa-trash-alt"></button>
                                        </form> 

                                        </div>
                                        
                                    </td>
                                </tr>
                                
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Sửa sản phẩm  -->



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
 
</body>

</html>
<?php
if(Helper::is_submit('deleteSlide')){
        $slides = new Product();
        $slides->setId(Helper::input_value('id'));
        if(!empty($slides) && SlideDB::deleteSlide($slides)){
          
           
          Helper::redirect(Helper::get_url('admin/?c=listSlide'));
        }
        else{
            echo "<script>alert('Không thể xóa hãy quay về trang chính!');</script>";            
        }
        if(!empty($slides) && SlideDB::deleteSlide($slides))
        {echo "<script>alert('Xóa sản phẩm thành công!');</script>";}
    }
?>
