
<?php
 if(!Form_Authen:: is_admin())
 Helper::redirect_js(Helper::get_url('admin/?v=common&a=login'));
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị Hệ Thống</title>
</head>
<body>
    <!-- <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-sm-12"> -->
                <?php include_once('layout/header.php') ?>
            <!-- </div>
        </div>
        <div class="row"> -->
            <!-- <div class="col-sm-3"> -->
            <?php 
                    $url = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
                    $app_path = explode('/', $url);
                    //var_dump($app_path);
                    if($app_path[3] !== '?c=login' && $app_path[3] !== 'login'):
                        include_once('layout/left.php');
                    endif;    
                ?>
            <!-- </div> -->
            <!-- <div class="col-sm-9"> -->
                <?php include_once('layout/main.php') ?>
            <!-- </div>
        </div> -->
        <!-- <div class="row">
            <div class="col-sm-12"> -->
                <?php include_once('layout/footer.php') ?>
            <!-- </div>
        </div>
    </div> -->
</body>

</html>


