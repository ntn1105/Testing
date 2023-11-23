<?php
$users=UsersDB::getUsersById(Helper::input_value('id'));
if(Helper::is_submit('editUs')){
   $users->setHoten(Helper::input_value('hoten'));
   $users->setSodt(Helper::input_value('sodt'));
   $users->setEmail(Helper::input_value('email'));

   $users->setDiachi(Helper::input_value('diachi'));
   $users->setKieu(Helper::input_value('kieu'));
   $users->setTrangthai(Helper::input_value('trangthai'));
   if(!empty($users)&&UsersDB::updateUsers($users)){
     Helper::redirect(Helper::get_url('admin/?c=listUs'));
   }
   else
   Helper::redirect(Helper::get_url('admin/?c=listUs')); 
   var_dump($user);
}

?>
<main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Sửa Người Dùng</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
<form action="" method="post" class="row g-3">
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Họ tên</label>
    <input type="text" class="form-control is-valid" name="hoten" value="<?php echo !empty($users)?$users->getHoten():""; ?>" id="validationServer01" require>
    <div class="valid-feedback"></div>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Số điện thoại</label>
    <input type="text" class="form-control is-valid" id="validationServer02" name="sodt" value="<?php echo !empty($users)?$users->getSodt():""; ?>"  require>
    <div class="valid-feedback"></div>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="inputEmail4" value="<?php echo !empty($users)?$users->getEmail():""; ?>">
  </div>
  
  <div class="col-md-6">
    <label for="inputAddress2" class="form-label">Địa chỉ</label>
    <input type="text" class="form-control" id="inputAddress2" name="diachi" value="<?php echo !empty($users)?$users->getDiachi():""; ?>">
  </div>
  <div class="col-md-6">
  <table class="table table-hover">
  <tbody>
     <div class="col-md-3">
       <tr>
          <th>  <label for="inputState" class="form-label"> Chức danh:</label>

          </th>
       <div class="radio">
         <td>
            <input type="radio" name="kieu" <?php if (!empty($users) && $users->getKieu()=="1") echo "checked";?> value="1">Admin
         </td>
         <td>
            <input type="radio" name="kieu" <?php if (!empty($users) && $users->getKieu()=="2") echo "checked";?> value="2">User
         </td>
       </div>
    </tr>
  </div>
  <div class="col-md-3">
       <tr>
          <th>  <label for="inputState" class="form-label"> Trạng Thái:</label>

          </th>
       <div class="radio">
         <td> 
            <input type="radio" name="trangthai" <?php if (!empty($users) && $users->getTrangthai()=="1") echo "checked";?> value="1">Online
         </td>
         <td>
            <input type="radio" name="trangthai" <?php if (!empty($users) && $users->getTrangthai()=="2") echo "checked";?> value="2">Offline
         </td>
       </div>
    </tr>
  </div>

   
  </tbody>
</table>
  
</div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <br>
  
  <div class="col-12">
  <input type="hidden" name="action" value="editpro">
               <input class="btn-sm btn-dark" type="submit"  value="Sửa người dùng">
              <a class="btn btn-cancel" href="<?php echo Helper::get_url('admin/?c=listUs');?>">Hủy bỏ</a>
  </div>
</form>





</main>
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





