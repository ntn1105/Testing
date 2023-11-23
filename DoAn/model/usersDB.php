<?php
 include_once('connectDB.php');

 class Users{

   private $idnd,$email,$matkhau,$hoten,$kieu,$sodt,$diachi,$trangthai;

   public  function getIdnd(){
       return $this->idnd;
   }
   public  function setIdnd($value){
       $this->idnd=$value;
   }
   public function getEmail(){
       return $this->email;

   }
   public function setEmail($value){
       $this->email=$value;  
    }
   public function getMatkhau(){
       return $this->matkhau;
    
   }
   public function setMatkhau($value){
       $this->matkhau=$value;
   } 
   public function getHoten(){
       return $this->hoten;

   }
   public function setHoten($value){
       $this->hoten=$value;
   }
   public function getKieu(){
       return $this->kieu;

   }
   public function setKieu($value){
       $this->kieu=$value;
   }
   public function getSodt(){
       return $this->sodt;
   }
   public function setSodt($value){
       $this->sodt=$value;
   }
   public function getDiachi(){
       return $this->diachi;
   }
   public function setDiachi($value){
       $this->diachi=$value;
   }
   public function getTrangthai(){
       return $this->trangthai;

   }
   public function setTrangthai($value){
       $this->trangthai=$value;
   }
 }

 class UsersDB extends Database{
     public static function getUsers()
     {
         $sql=" select * from nguoidung ";
         if(!empty(self::db_get_list($sql))){
             foreach(self::db_get_list($sql) as $row){
                 $user =new Users();
                 $user->setIdnd($row['idnd']);
                 $user->setEmail($row['email']);
                 $user->setMatkhau($row['matkhau']);
                 $user->setHoten($row['hoten']);
                 $user->setKieu($row['kieu']);
                 $user->setSodt($row['sodt']);
                 $user->setDiachi($row['diachi']);
                 $user->setTrangthai($row['trangthai']);
                 $users[]= $user;

             }
             return $users;
         }
         return false;
     }
     public static function getUsersById($usersId){
         $sql="select * from nguoidung where idnd=:idnd";
         $params=['idnd'=>$usersId];
         $row=self::db_get_row($sql,$params);
         if(!empty($row)){
            $users =new Users();
            $users->setIdnd($row['idnd']);
            $users->setEmail($row['email']);
            $users->setMatkhau($row['matkhau']);
            $users->setHoten($row['hoten']);
            $users->setKieu($row['kieu']);
            $users->setSodt($row['sodt']);
            $users->setDiachi($row['diachi']);
            $users->setTrangthai($row['trangthai']);
        
         return $users; 
        }
        return false;

     }

     public static function addUsers($users){
         $sql="INSERT INTO nguoidung(idnd, email, matkhau, hoten, kieu, sodt, diachi, trangthai) 
         VALUES (:idnd,:email,:matkhau,:hoten,:keu,:sodt,:diachi,:trangthai)";
         $params=[
             'idnd'=>$users->getIdnd(),
             'email'=>$users->getEmail(),
             'matkhau'=>$users->getMatkhau(),
             'hoten'=>$users->getHoten(),
             'kieu'=>$users->getKieu(),
             'sodt'=>$users->getSodt(),
             'diachi'=>$users->getDiachi(),
             'trangthai'=>$users->getTrangthai()
         ];
         if(self::db_execute($sql,$params)){
             return true;
         }
         else
         return false;
     }

     public static function updateUsers($users){
         $sql="UPDATE nguoidung 
         SET idnd=:idnd,email=:email,matkhau=:matkhau,hoten=:hoten,kieu=:kieu,sodt=:sodt,diachi=:diachi,trangthai=:trangthai WHERE idnd=:idnd";
          $params=[
            'idnd'=>$users->getIdnd(),
            'email'=>$users->getEmail(),
            'matkhau'=>$users->getMatkhau(),
            'hoten'=>$users->getHoten(),
            'kieu'=>$users->getKieu(),
            'sodt'=>$users->getSodt(),
            'diachi'=>$users->getDiachi(),
            'trangthai'=>$users->getTrangthai()
        ];
        if(self::db_execute($sql,$params)){
            return true;
        }
        else
        return false;
    
    
    }
     public static function deleteUsers($users){
         $sql="delete from nguoidung where idnd=:idnd";
         $params = [
            "idnd" => $users->getIdnd()
        ];
        if (self::db_execute($sql, $params))
            return true;
        else
          
        return false;
     }


     


    }
  
    class Form_Authen{
        //-------------Authentication---------------------
        //-----Role Admin-----
        public static function set_logged($email,$kieu,$hoten) {
            $_SESSION['token'] = [
                'email'=>$email,
                'kieu'=>$kieu,
                'hoten'=>$hoten];
        }
    
        public static function set_logout() {
            if(isset($_SESSION['token']))
            {
                $_SESSION['token'] = [];   // Clear session data from memory
                unset($_SESSION['token']);
            } 
        }
    
        public static function session_user_logged() {
            $user = isset($_SESSION['token'])?$_SESSION['token']:false;
            return $user;
        }
    
        public static function is_admin() {
            $user = self::session_user_logged();
            if(!empty($user['kieu']) && intval($user['kieu']) == 1)
            {
                return true;
            }
            return false;
        }
    
        public static function get_current_username(){
            $user = self::session_user_logged();
            return (isset($user['hoten'])?$user['hoten']:'');
        }
    
        public static function get_current_email(){
            $user = self::session_user_logged();
            return (isset($user['email'])?$user['email']:'');
        }
    
        public static function get_current_typeuser()
        {
            $user = self::session_user_logged();
            return (isset($user['kieu'])?intval($user['kieu']):'');
        }
    
        //-----Role User-----
        public static function is_user() {
                $user = self::session_user_logged();
                if(!empty($user['kieu']) && intval($user['kieu']) == 2)
                {
                    return true;
                }
                return false;
        }
    }

    

    
 

?>