
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../public/images/portfolio_logo_the_ideal_diamond_and_watch_shop_2x3_1.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b> <?php
                if(Form_Authen::is_admin()){
                    echo "<h6> " .Form_Authen::get_current_username() . '</h6>';
                }   
            ?></b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
      <li><a class="app-menu__item active" href="<?php echo Helper::get_url('admin/?c=baocao'); ?>"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Báo Cáo Thống Kê</span></a></li>
      <li><a class="app-menu__item" href="<?php echo Helper::get_url('admin/?c=listpro'); ?>"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="<?php echo Helper::get_url('admin/?c=listcat'); ?>"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label">Quản lý danh mục sản phẩm
          </span></a></li>
      <li><a class="app-menu__item" href="<?php echo Helper::get_url('admin/?c=listbill'); ?>"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>

       <li><a class="app-menu__item" href="<?php echo Helper::get_url('admin/?c=listUs'); ?>"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Quản lý khách hàng</span></a></li>
      
      <li><a class="app-menu__item" href="<?php echo Helper::get_url('admin/?c=statisticpro'); ?>"><i class='app-menu__icon bx bx-dollar'></i><span
            class="app-menu__label">Bảng kê </span></a></li>
      <li><a class="app-menu__item" href="<?php echo Helper::get_url('admin/?c=listSlide'); ?>"><i
            class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Cài đặt Banner</span></a>
      </li>
     
    </ul>
  </aside>













