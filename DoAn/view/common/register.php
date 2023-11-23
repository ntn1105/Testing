<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
</head>
<body>
    <!-- Form without bootstrap -->

   
   <div class="container">
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Create Account
                    </h2>
                    <div class="auth-external-container">
                        <div class="auth-external-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <p class="auth-sgt">or use your email for registration:</p>
                    </div>
                    <form class="login-form" action="" method="post">
                        <input type="text" class="auth-form-input" name="hoten" placeholder="Name">
                        <input type="text" class="auth-form-input" name="sodt" placeholder="Numberphone">
                        <input type="text" class="auth-form-input" name="diachi" placeholder="Address">
                        <input type="email" class="auth-form-input"  name="email" placeholder="Email">
                        <div class="input-icon">
                            <input type="password" class="auth-form-input" name="matkhau"placeholder="Password">
                            <i class="fa fa-eye show-password"></i>
                        </div>
                       
                        <label class="btn active">
                            <input type="checkbox" name='email1' checked>
                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i> 
                            <span> I agree to the <a href="#">Terms</a> and <a href="#">Privacy Policy</a>.</span>
                        </label>
                        <div class="footer-action">
                             <input type="hidden" name="action" value="register"> 
                   
                            <input type="submit" value="Sign Up" class="auth-submit">
                            <a href="<?php echo Helper::get_url('?c=login'); ?>" class="auth-btn-direct">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="public/images/vector.jpg" alt="login">
                </div>
            </div>
        </div>
    </div>
 
    <script src="public/js/login.js"></script>
</body>
</html>
<?php

   if(Helper::is_submit('register')){
    $decrypt = new DeCrypt();
    $hoten = Helper::input_value('hoten');
    $email =  Helper::input_value('email');
    $matkhau =  password_hash(Helper::input_value('matkhau'),PASSWORD_BCRYPT);
    $sodt =  Helper::input_value('sodt');
    $diachi =  Helper::input_value('diachi');

    $sql = "insert into nguoidung(hoten,email,matkhau,sodt,diachi) 
            values(:hoten,:email,:matkhau,:sodt,:diachi)";
    $params = [
        'hoten' => $hoten,
        'email' => $email,
        'matkhau' => $matkhau,
        'sodt' => $sodt,
        'diachi' =>$diachi
        
    ];
      

    if(!empty($email) && !empty($matkhau) && Database::db_execute($sql,$params))
    {
         echo "<script>alert('Đăng ký thông tin thành công !');</script>";
         $from_email = "cojhoang44@gmail.com";
         $from_name = "Nguyen Van Teo";
         $to_email = $email ;
         $to_name = $hoten;
         $subject = "Thông tin đăng ký tài khoản";
         $body = "Cám ơn $hoten đã đăng ký trên hệ thống !";
         $result = PhpMail::send_email($from_email,$from_name,$to_email,$to_name,$subject,$body);
    }
    else{

        echo "<script>alert('Đăng ký không thành công vui lòng đăng kí lại !');</script>";
        Helper::redirect_js(Helper::get_url('?c=register'));
        
    }
}

?>