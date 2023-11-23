<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<body>
<div class="container ">
        <div class="row">
            <div class="col-sm-12">
                <?php 
                    // $url = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
                    // $app_path = explode('/', $url);
                    // //var_dump($app_path);
                    // if($app_path[2] == '?c=listcart'):
                    //     include_once('layout/headercart.php');
                    // else:    
                        include_once('layout/header.php'); 
                   // endif;    
                ?>
            </div>
        </div>
        <div class="row">
             <div class="col-sm-3"><?php 
                    $url = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
                    $app_path = explode('/', $url);
                    //var_dump($app_path);
                     if($app_path[2] == '?c=contact'){
                         include_once('contact.php');}
                     elseif($app_path[2] == '?c=login'){
                        include_once('login.php');}
                     elseif($app_path[2] == '?c=register'){
                            include_once('register.php');}
                    elseif($app_path[2] == '?c=checkout'){
                          include_once('view/order/checkout.php');}
                    elseif($app_path[2] == '?c=listcart'){
                            include_once('view/cart/list.php');}
                     elseif($app_path[2] == '?c=order'){
                         include_once('view/order/order.php');}
                    
                     else{  
                     
                       include_once("layout/left.php");}
                ?>
                </div>
           
            <div class="col-sm-9">
                <?php include_once("layout/main.php") ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php include_once('layout/footer.php') ?>
            </div>
        </div>
    </div>
</body>
</html>