
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>
        <link rel="stylesheet" href="public/css/style.css">

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
       

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
<style>

body {
    margin: 0;
    color: #6a6f8c;
    background: #c8c8c8;
    font: 600 16px/18px 'Open Sans', sans-serif
}

.login-box {
    width: 100%;
    margin: auto;
    max-width: 525px;
    min-height: 670px;
    position: relative;
    background: url(https://images.unsplash.com/photo-1507208773393-40d9fc670acf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1268&q=80) no-repeat center;
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19)
}

.login-snip {
    width: 100%;
    height: 100%;
    position: absolute;
    padding: 90px 70px 50px 70px;
    background: rgba(0, 77, 77, .9)
}

.login-snip .login,
.login-snip .sign-up-form {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: all .4s linear
}

.login-snip .sign-in,
.login-snip .sign-up,
.login-space .group .check {
    display: none
}

.login-snip .tab,
.login-space .group .label,
.login-space .group .button {
    text-transform: uppercase
}

.login-snip .tab {
    font-size: 22px;
    margin-right: 15px;
    padding-bottom: 5px;
    margin: 0 15px 10px 0;
    display: inline-block;
    border-bottom: 2px solid transparent
}

.login-snip .sign-in:checked+.tab,
.login-snip .sign-up:checked+.tab {
    color: #fff;
    border-color: #1161ee
}

.login-space {
    min-height: 345px;
    position: relative;
    perspective: 1000px;
    transform-style: preserve-3d
}

.login-space .group {
    margin-bottom: 15px
}

.login-space .group .label,
.login-space .group .input,
.login-space .group .button {
    width: 100%;
    color: #fff;
    display: block
}

.login-space .group .input,
.login-space .group .button {
    border: none;
    padding: 15px 20px;
    border-radius: 25px;
    background: rgba(255, 255, 255, .1)
}

.login-space .group input[data-type="password"] {
    text-security: circle;
    -webkit-text-security: circle
}

.login-space .group .label {
    color: #aaa;
    font-size: 12px
}

.login-space .group .button {
    background: #1161ee
}

.login-space .group label .icon {
    width: 15px;
    height: 15px;
    border-radius: 2px;
    position: relative;
    display: inline-block;
    background: rgba(255, 255, 255, .1)
}

.login-space .group label .icon:before,
.login-space .group label .icon:after {
    content: '';
    width: 10px;
    height: 2px;
    background: #fff;
    position: absolute;
    transition: all .2s ease-in-out 0s
}

.login-space .group label .icon:before {
    left: 3px;
    width: 5px;
    bottom: 6px;
    transform: scale(0) rotate(0)
}

.login-space .group label .icon:after {
    top: 6px;
    right: 0;
    transform: scale(0) rotate(0)
}

.login-space .group .check:checked+label {
    color: #fff
}

.login-space .group .check:checked+label .icon {
    background: #1161ee
}

.login-space .group .check:checked+label .icon:before {
    transform: scale(1) rotate(45deg)
}

.login-space .group .check:checked+label .icon:after {
    transform: scale(1) rotate(-45deg)
}

.login-snip .sign-in:checked+.tab+.sign-up+.tab+.login-space .login {
    transform: rotate(0)
}

.login-snip .sign-up:checked+.tab+.login-space .sign-up-form {
    transform: rotate(0)
}

*,
:after,
:before {
    box-sizing: border-box
}

.clearfix:after,
.clearfix:before {
    content: '';
    display: table
}

.clearfix:after {
    clear: both;
    display: block
}

a {
    color: inherit;
    text-decoration: none
}

.hr {
    height: 2px;
    margin: 60px 0 50px 0;
    background: rgba(255, 255, 255, .2)
}

.foot {
    text-align: center
}

.card {
    width: 500px;
    left: 100px
}

::placeholder {
    color: #b3b3b3
}</style> 
    </head>


    <body>
     
    <?php
    include_once('../../model/usersDB.php');
    if(Form_Authen::is_admin())
        Helper::redirect_js(Helper::get_url('admin/?c=list'));

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

            if(empty($error) && $user['kieu'] == 1 && $user['trangthai'] == 1)
            {
                Form_Authen::set_logged($user['email'],$user['kieu'],$user['hoten']);
                Helper::redirect_js(Helper::get_url('admin/?c=list'));
            }     
        }
    }
     // Protected Page 
 /*Form Authentication*/
 if(!Form_Authen::is_admin())
    Helper::redirect_js(Helper::get_url('admin/?v=common&a=login'));
      
?>

<!-- đăng kí -->
<?php
    //Register
    if(Helper::is_submit('register')){
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
            'diachi' => $diachi
        ];
        if(!empty($email) && !empty($matkhau) && Database::db_execute($sql,$params))
        {
             echo "<script>alert('Đăng ký thông tin thành công !');</script>";
        }
    }
?>




    <div class="row">
    <div class="col-md-6 mx-auto p-0">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                    <div class="login-space">
                     <form action="" method="post">
                        <div class="login">
                            <div class="group"> <label for="user" class="label">Email</label> <input id="user" type="email" name="email" class="input" placeholder="Enter your Email"> </div>
                            <div class="group"> <label for="pass" class="label">Password</label> <input id="pass" type="password" name="matkhau" class="input" data-type="password" placeholder="Enter your password"> </div>
                            <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Keep me Signed in</label> </div>
                            <div class="group"> <input type="submit" class="button"  value="login"> </div>
                            <div class="hr"></div>
                            <div class="foot"> <a href="#">Forgot Password?</a> </div>
                        </div>
                    </form>
                    <!-- <form action="" method="post">
                        <div class="sign-up-form">
                            <div class="group"> <label for="user" class="label">Họ Tên</label> <input id="user" type="text" name="hoten" class="input" placeholder="Create your Username"> </div>
                            <div class="group"> <label for="pass" class="label">Email </label> <input id="pass" type="text" name="email" class="input" placeholder="Enter your email address"> </div>
                            <div class="group"> <label for="pass" class="label">Mật Khẩu</label> <input id="pass" type="password" name="matkhau" class="input" data-type="password" placeholder="Create your password"> </div>
                            <div class="group"> <label for="user" class="label">Số điện thoại</label> <input id="user" type="text" name="sodt" class="input" placeholder="Create your Numberphone"> </div>
                            <div class="group"> <label for="user" class="label">Địa chỉ</label> <input id="user" type="text" name="diachi" class="input" placeholder="Create your Address"> </div>
                            
                            <div class="group"> <input type="submit"  class="button" value="register"> </div>
                            <div class="hr"></div>
                            <div class="foot"> <label for="tab-1">Already Member?</label> </div>
                        </div>
                    </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
<script>
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600)
  
});
</script>