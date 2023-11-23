<?php
include_once('helper.php');
 
class Database
{
    private static $dsn = 'mysql:host=localhost;dbname=ban_hang';
        private static $username = "root";
        private static $password = "";
        private static $con = null;
        private static $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        public function __construct()
        {
           self::db_connect();    
        }

        public function __destruct()
        {
            self::db_disconnect();
        }

        public static function db_connect()
        {
            try {
                if (is_null(self::$con)) {
                    self::$con = new PDO(self::$dsn, self::$username, self::$password,self::$options);
                    self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                    //echo "Ket noi thanh cong";               
                }
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include_once '../errors/database_error.php';
            }
        }
    
        public static function db_disconnect()
        {
            if (!is_null(self::$con)) {
                $con = null;
            }
        }
        
        public static function db_execute($sql = '', $params = [])
        {
            if (!is_null(self::$con)) {
                $result = self::$con->prepare($sql);
                $result->execute($params);
                if ($result->rowCount() > 0) {
                    $result->closeCursor();
                    return true;
                }
            }
            return false;
        }
    
        public static function db_get_list($sql = '')
        {
            if (!is_null(self::$con)) {
                $result = self::$con->prepare($sql);
                $result->execute();
                if ($result->rowCount() > 0) {
                    $rows = $result->fetchAll();
                    $result->closeCursor();
                    return $rows;
                }
            }
            return false;
        }
    
        public static function db_get_list_condition($sql = '', $params = [])
        {
            if (!is_null(self::$con)) {
                $result = self::$con->prepare($sql);
                $result->execute($params);
                if ($result->rowCount() > 0) {
                    $rows = $result->fetchAll();
                    $result->closeCursor();
                    return $rows;
                }
            }
            return false;
        }
    
        public static function db_get_row($sql = '', $params = [])
        {
            if (!is_null(self::$con)) {
                $result = self::$con->prepare($sql);
                $result->execute($params);
                if ($result->rowCount() > 0) {
                    $row = $result->fetch();
                    $result->closeCursor();
                    return $row;
                }
            }
            return false;
        }
        public static function db_num_rows_test($sql = '', $params = []) 
        {
           $count = 0;
           if(!is_null(self::$con))
           {
              $result = self::$con->prepare($sql);
              $result->execute($params);
              $count = $result->rowCount();
              $result->closeCursor();
              return $count;
           }
           return false;
        }

        public static function db_num_rows($sql = '') 
        {
           $count = 0;
           if(!is_null(self::$con))
           {
              $result = self::$con->prepare($sql);
              $result->execute();
              $count = $result->rowCount();
              $result->closeCursor();
              return $count;
           }
           return false;
        }
  
        // Get Min ID with Auto_Increment
        public static function db_min_id($id,$table)
        {
           if(!is_null(self::$con))
           {
              $count = 1;
              $sql = "select min($id) from $table";
              $result = self::$con->prepare($sql);
              $result->execute();
              if($result->rowCount() > 0)
                $count = $result->fetch();
              $result->closeCursor();  
              return $count[0];
           }
           return false;
        }
  
        // Get Max ID with Auto_Increment
        public static function db_max_id($id,$table)
        {
           if(!is_null(self::$con))
           {
              $count = 1;
              $sql = "select max($id) from $table";
              $result = self::$con->prepare($sql);
              $result->execute();
              if($result->rowCount() > 0)
                $count = $result->fetch();
              $result->closeCursor();  
              return $count[0];
           }
           return false;
        }
    
    public static function db_get_value($sql = '') 
    {
      
       if(!is_null(self::$con))
       {
          $count = 1;
          $result = self::$con->prepare($sql);
          $result->execute();
          if($result->rowCount() > 0)
            $count = $result->fetch();
          $result->closeCursor();  
          return $count[0];
       }
       return false;
    }
    
}
class Auth_Basic extends Database
    {
        private static $email = '';
        private static $password = '';

        public function __construct()
        {
            if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
                self::$email = $_SERVER['PHP_AUTH_USER'];
                self::$password = $_SERVER['PHP_AUTH_PW'];
            }
            
            if(!self::is_valid_admin_login(self::$email,self::$password))
            {
                header('WWW-Authenticate: Basic realm="Admin"');
                header('HTTP/1.0 401 Unauthorized');
                Helper::redirect_js(".");
                exit();
            }  
        }

        public static function is_valid_admin_login($email, $password) {
            $sql = "select matkhau, kieu,trangthai from nguoidung where email = :email";
            $params = ['email'=>$email];
            $nguoidung = self::db_get_row($sql, $params);
            if(!empty($nguoidung))
            {
            $hash = $nguoidung['matkhau'];
            $kieunguoidung = $nguoidung['kieu'];
            $trangthai = $nguoidung['trangthai'];
            return (password_verify($password, $hash) && ($kieunguoidung == 1) && ($trangthai == 1));
            // return ($nguoidung['matkhau'] == $password && ($kieunguoidung == 1) && ($trangthai == 1));
            }
            return false;
        }
    }
?>