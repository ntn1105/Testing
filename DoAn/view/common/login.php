<style>
    table,tr,td{
        padding:0.5em;
    }
</style>
<?php

    if(Form_Authen::is_user())
        Helper::redirect_js(Helper::get_url('?c=checkout'));

    if(Helper::is_submit('login')){
        $email = Helper::input_value('email');
        $matkhau = Helper::input_value('matkhau');
        if(!empty($email) && !empty($matkhau))
        {
            $sql = "select * from nguoidung where email=:email"; 
            $params = ["email"=>$email];
            $user = Database::db_get_row($sql,$params);

            if(empty($user))
                 
                $error['email'] = 'Email Không tồn tại !';  
            else
                {
                    // if($user['matkhau'] != $matkhau)
                    // {
                    //     $error['matkhau'] = 'Mật khẩu hoặc tài khoản không tồn tại !';
                    // }
                    $hash = $user['matkhau'];
                    if(!password_verify($matkhau,$hash))
                    {
                        $error['matkhau'] = 'Mật khẩu hoặc tài khoản không tồn tại !';
                    }
                }

            if(empty($error) && $user['kieu'] == 2 && $user['trangthai'] == 1)
            {
                Form_Authen::set_logged($user['email'],$user['kieu'],$user['hoten']);
                Helper::redirect_js(Helper::get_url('?c=listpro'));
            }     
        }
        else{

            echo "<script>alert('Vui lòng nhập đúng tài khoản mật khẩu !');</script>";
            Helper::redirect_js(Helper::get_url('?c=login'));
            
        }
        
    }

    //Register
  
    //Register
 

?>



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
                        Sign In
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
                        <p class="auth-sgt">or sign in with:</p>
                    </div>
                    <form class="login-form" method="post" action="">
                        <input type="email" class="auth-form-input" name="email" placeholder="Email">
                        <div class="input-icon">
                            <input type="password" class="auth-form-input" name="matkhau" placeholder="Password">
                            <i class="fa fa-eye show-password"></i>
                        </div>
                        <label class="btn active">
                            <input type="checkbox" name='email1' checked>
                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i> 
                            <span> Remember password.</span>
                        </label>
                        <div class="footer-action">
                        <input type="hidden" name="action" value="login"> 
                            <input type="submit" value="Sign In" class="auth-submit">
                            <a href="<?php echo Helper::get_url('?c=register'); ?>" class="auth-btn-direct">Sign Up</a>
                        </div>
                    </form>
                    <div class="auth-forgot-password">
                        <a href="#">Forfot Password</a>
                    </div>
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="public/images/vector.jpg"alt="login">
                </div>
            </div>
        </div>
     </div>
    
    <script src="public/js/login.js"></script>
</body>
</html>