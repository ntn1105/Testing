<?php
 include_once('connectDB.php');
 class Donhang {
    private $iddh, $idnd, $idttdh, $madh ,$ngaydat, $ngayxuly;
    public function getIddh() {
        return $this->iddh;
    }

    public function setIddh($value) {
        $this->iddh = $value;
    }

    public function getIdnd() {
        return $this->idnd;
    }

    public function setIdnd($value) {
        $this->idnd = $value;
    }

    public function getIdttdh() {
        return $this->idttdh;
    }

    public function setIdttdh($value) {
        $this->idttdh= $value;
    }

    public function getMadh() {
        return $this->madh;
    }

    public function setMadh($value) {
        $this->madh = $value;
    }

    public function getNgaydat() {
        return $this->ngaydat;
    }

    public function setNgaydat($value) {
        $this->ngaydat = $value;
    }

    public function getNgayxuly() {
        return $this->ngayxuly;
    }

    public function setNgayxuly($value) {
        $this->ngayxuly = $value;
    }

    
}
class DonhangDB extends Database
{
    public static function getDonhang()
    {
            $sql = "select * from donhang";
            if(!empty(self::db_get_list($sql)))
            {
                foreach(self::db_get_list($sql) as $row){
                    $donhang = new Donhang();
                    $donhang->setIddh($row['iddh']);
                    $donhang->setIdnd($row['idnd']);
                    $donhang->setIdttdh($row['idttdh']);
                    $donhang->setMadh($row['madh']);
                    $donhang->setNgaydat($row['ngaydat']);
                    $donhang->setNgayxuly($row['ngayxuly']); 
                    $donhangs[] = $donhang;
                }
                return $donhangs;
            }
            return false;
    }
    public static function getDonhangOrder()
    {
            $sql = "select * from donhang";
            $row = self::db_get_list($sql);
            if(!empty($row))
            {
                foreach(self::db_get_list_condition($sql) as $row){
                    $donhang = new Donhang();
                    $donhang->setIddh($row['iddh']);
                    $donhang->setIdnd($row['idnd']);
                    $donhang->setIdttdh($row['idttdh']);
                    $donhang->setMadh($row['madh']);
                    $donhang->setNgaydat($row['ngaydat']);
                    $donhang->setNgayxuly($row['ngayxuly']); 
                    $donhangs[] = $donhang;
                }
                return $donhangs;
            }
            return false;
    }

    
    public static function getDonhangById($donhangid)
    {
            $sql = "select * from donhang where iddh=:donhangid";
            $params = ['donhangid' => $donhangid];
            $row = self::db_get_row($sql, $params);
            if(!empty($row))
            {
                $donhang = new Donhang();
                $donhang->setIddh($row['iddh']);
                $donhang->setIdnd($row['idnd']);
                $donhang->setIdttdh($row['idttdh']);
                $donhang->setMadh($row['madh']);
                $donhang->setNgaydat($row['ngaydat']);
                $donhang->setNgayxuly($row['ngayxuly']); 

            return $donhang;
        }
        return false;
    }

    public static function getDonhangByIdnd($donhangidnd)
    {
            $sql = "select * from donhang where idnd=:donhangidnd";
            $params = ['donhangidnd' => $donhangidnd];
            $row = self::db_get_row($sql, $params);
            if(!empty($row))
            {
                $donhang = new Donhang();
                $donhang->setIddh($row['iddh']);
                $donhang->setIdnd($row['idnd']);
                $donhang->setIdttdh($row['idttdh']);
                $donhang->setMadh($row['madh']);
                $donhang->setNgaydat($row['ngaydat']);
                $donhang->setNgayxuly($row['ngayxuly']); 

            return $donhang;
        }
        return false;
    }
    // public static function findProducts($condition)
    // {
    //     $sql = "call sp_timkiem(:condition)";
    //     $params = [
    //         'condition' => $condition
    //     ];
    //     if(!empty(self::db_get_list_condition($sql,$params)))
    //     {
    //         foreach(self::db_get_list_condition($sql,$params) as $row){
    //             $product = new Product();
    //             $product->setId($row['id']);
    //             $product->setTen($row['ten']);
    //             $product->setGia($row['gia']); 
    //             $products[] = $product;
    //         }
    //         return $products;
    //     }
    //     return false;
    // }

   
 
    public static function updateDonhang($donhang)
    {
         

         $sql=" UPDATE donhang SET idnd=:idnd,idttdh=:idttdh,madh=:madh,ngaydat=:ngaydat,ngayxuly=:ngayxuly WHERE iddh=:iddh";
        
         $params = [
             "iddh" => $donhang->getIddh(),
             "idnd" => $donhang->getIdnd(),
             "idttdh" => $donhang->getIdttdh(),
             "madh" => $donhang->getMadh(),
             "ngaydat" => $donhang->getNgaydat(),
             "ngayxuly" => $donhang->getNgayxuly()
            
         ];
         if (self::db_execute($sql, $params))
             return true;
         else
             return false;
    }
    public static function deleteDonhang($donhang)
    {
         $sql = "delete from donhang where iddh=:iddh";
         $params = [
             "iddh" => $donhang->getIddh()
         ];
         if (self::db_execute($sql, $params))
             return true;
         else
             return false;
    } 

}


class Tinhtrangdonhang{
    private $idttdh,$tentt;

    public function getIdttdh(){
        return $this->idttdh;
    }
    public function setIdttdh($value){
        $this->idttdh=$value;
    }
    public function getTentt(){
        return $this->tentt;
    }
    public function setTentt($value){
        $this->tentt=$value;
    }
}
class TinhtrangdonhangDB extends Database
{
    public static function getTinhTrang()
    {
            $sql = "select * from tinhtrangdonhang";
            if(!empty(self::db_get_list($sql)))
            {
                foreach(self::db_get_list($sql) as $row){
                    $tinhtrang = new Tinhtrangdonhang();
                    $tinhtrang->setIdttdh($row['idttdh']);
                    $tinhtrang->setTentt($row['tentt']);
                   
                    $tinhtrangs[] = $tinhtrang;
                }
                return $tinhtrangs;
            }
            return false;
    }
}
?>
<!-- chi tiết đơn hàng -->

<?php
class Chitietdonhang{
    private $idctdt ,$iddh,$idsp,$soluong,$Size;

    public function getIdctdt (){
        return $this->idctdt ;
    }
    public function setIdctdt ($value){
        $this->idctdt =$value;
    }
    public function getIddh(){
        return $this->iddh;
    }
    public function setIddh($value){
        $this->iddh=$value;
    }
    public function getIdsp (){
        return $this->idsp ;
    }
    public function setIdsp ($value){
        $this->idsp =$value;
    }
    public function getSoluong(){
        return $this->soluong;
    }
    public function setSoluong($value){
        $this->soluong=$value;
    }
    public function getSize(){
        return $this->Size;
    }
    public function setSize($value){
        $this->Size=$value;
    }
}
class ChitietdonhangDB extends Database
{
    public static function getChitiet()
    {
            $sql = "select * from chitietdonhang";
            if(!empty(self::db_get_list($sql)))
            {
                foreach(self::db_get_list($sql) as $row){
                    $chitiet = new Chitietdonhang();
                    $chitiet->setIdctdt($row['idctdt']);
                    $chitiet->setIddh($row['iddh']);
                    $chitiet->setIdsp($row['idsp']);
                    $chitiet->setSoluong($row['soluong']);
                    $chitiet->setSize($row['Size']);
                    $chitiets[] = $chitiet;
                }
                return $chitiets;
            }
            return false;
    }
    public static function getChitietdonhangByIdnd($iddhh)
    {
            $sql = "select * from chitietdonhang where iddh=:iddh";
             $params = ['iddh' => $iddhh];
             $row = self::db_get_row($sql, $params);
             if(!empty($row))
             {
                 foreach(self::db_get_list($sql) as $row){
                 $chitiet = new Chitietdonhang();
                 $chitiet->setIdctdt($row['idctdt']);
                 $chitiet->setIddh($row['iddh']);
                 $chitiet->setIdsp($row['idsp']);
                 $chitiet->setSoluong($row['soluong']);
                 $chitiet->setSize($row['Size']);
                 $chitiets[] = $chitiet;
             }
             return $chitiets;
         }
         return false;
     }
    public static function getChitietdonhangByIdnd2($chitiet)
    {
            $sql = "select * from chitietdonhang where iddh='.$chitiet.'";
            // $params = ['iddh' => $chitiet];
            $row = self::db_num_rows($sql);
            if(!empty($row))
            {
                foreach(self::db_get_list($sql) as $row){
                $chitiet = new Chitietdonhang();
                $chitiet->setIdctdt($row['idctdt']);
                $chitiet->setIddh($row['iddh']);
                $chitiet->setIdsp($row['idsp']);
                $chitiet->setSoluong($row['soluong']);
                $chitiet->setSize($row['Size']);
                $chitiets[] = $chitiet;
            }
            return $chitiets;
        }
        return false;
    }
    public static function deleteChitiet($donhang)
    {
         $sql = "delete from chitietdonhang where idctdt=:iddh";
         $params = [
             "iddh" => $donhang->getIdctdt()
         ];
         if (self::db_execute($sql, $params))
             return true;
         else
             return false;
    } 
}


?>