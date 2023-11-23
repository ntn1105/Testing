<?php
    require_once("autoload.php");
    use Defuse\Crypto\Crypto;
    use Defuse\Crypto\Key;
    use Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException;

  class DeCrypt
  {  
    private static $key;
    
    public function __construct() {
        $keyAscii = Key::createNewRandomKey();
        self::$key = $keyAscii->saveToAsciiSafeString();
    }

    public static function getkey(){
        return self::$key;
    }

    public static function encrypt($data) {
        $encrypted_data = Crypto::encrypt($data, Key::loadFromAsciiSafeString(self::$key));
        return $encrypted_data;
    }

    public static function decrypt($encrypted_data,$key) {
      try {
        $data = Crypto::decrypt($encrypted_data, Key::loadFromAsciiSafeString($key));
        return $data;
      } catch (WrongKeyOrModifiedCiphertextException $ex) {
          throw new Exception($ex->getMessage());
      }
    }
  }
?>