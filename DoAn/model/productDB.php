<?php
 include_once('connectDB.php');
 /*---Product---*/
 class Product {
    private $id, $ten, $gia,$giachinh, $hinhanh, $noidung, $thuocmennu, $noibat,$trangchu;

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }

    public function getTen() {
        return $this->ten;
    }

    public function setTen($value) {
        $this->ten = $value;
    }

    public function getGia() {
        return $this->gia;
    }

    public function setGia($value) {
        $this->gia = $value;
    }
    public function getGiachinh() {
        return $this->giachinh;
    }

    public function setGiachinh($value) {
        $this->giachinh = $value;
    }

    public function getHinhanh() {
        return $this->hinhanh;
    }

    public function setHinhanh($value) {
        $this->hinhanh = $value;
    }

    public function getNoidung() {
        return $this->noidung;
    }

    public function setNoidung($value) {
        $this->noidung = $value;
    }

    public function getThuocmenu() {
        return $this->thuocmennu;
    }

    public function setThuocmenu($value) {
        $this->thuocmennu = $value;
    }

    public function getNoibat() {
        return $this->noibat;
    }

    public function setNoibat($value) {
        $this->noibat = $value;
    }
    public function gettrangchu() {
        return $this->trangchu;
    }

    public function setTrangchu($value) {
        $this->trangchu = $value;
    }
}

class ProductDB extends Database
{
    public static function getProducts()
    {
            $sql = "select * from san_pham ";
            if(!empty(self::db_get_list($sql)))
            {
                foreach(self::db_get_list($sql) as $row){
                    $product = new Product();
                    $product->setId($row['id']);
                    $product->setTen($row['ten']);
                    $product->setGia($row['gia']);
                    $product->setGiachinh($row['giachinh']);
                    $product->setHinhanh($row['hinh_anh']);
                    $product->setNoidung($row['noi_dung']);
                    $product->setThuocmenu($row['thuoc_menu']); 
                    $product->setNoibat($row['noi_bat']);
                    $product->setTrangchu($row['trang_chu']);
                    
                    $products[] = $product;
                }
                return $products;
            }
            return false;
    }
    public static function getProductsList()
    {
        $sql = "SELECT * FROM `san_pham` ORDER BY id DESC ";
        if(!empty(self::db_get_list($sql)))
            {
                foreach(self::db_get_list($sql) as $row){
                    $product = new Product();
                    $product->setId($row['id']);
                    $product->setTen($row['ten']);
                    $product->setGia($row['gia']);
                    $product->setGiachinh($row['giachinh']);
                    $product->setHinhanh($row['hinh_anh']);
                    $product->setNoidung($row['noi_dung']);
                    $product->setThuocmenu($row['thuoc_menu']); 
                    $product->setNoibat($row['noi_bat']);
                    $product->setTrangchu($row['trang_chu']);
                    
                    $products[] = $product;
                }
                return $products;
            }
            return false;
    }
     //phân trang cho trang quản lý sản phẩm admin
    public static function getProductsPaging(&$paging_html)
    {
        $link = Helper::get_url("admin/?c=listpro&page={page}");
        $sql = "SELECT * FROM `san_pham` ORDER BY id DESC ";
        $total_records = self::db_num_rows($sql);
        $current_page = Helper::input_value('page');
        $limit = 5;
        $paging = Helper::paging($link,$total_records,$current_page,$limit);
        $paging_html = $paging['html'];
        $sql = "select * from san_pham ORDER BY id DESC limit {$paging['start']},{$paging['limit']}";
        if(!empty(self::db_get_list($sql))) 
        {
            foreach(self::db_get_list($sql) as $row)
            {
                $product = new Product();
                    $product->setId($row['id']);
                    $product->setTen($row['ten']);
                    $product->setGia($row['gia']);
                    $product->setGiachinh($row['giachinh']);
                    $product->setHinhanh($row['hinh_anh']);
                    $product->setNoidung($row['noi_dung']);
                    $product->setThuocmenu($row['thuoc_menu']); 
                    $product->setNoibat($row['noi_bat']);
                    $product->setTrangchu($row['trang_chu']);
                    
                    $products[] = $product;
            }
            return $products;
        }
        return false;
    }
   // phân trang cho trang home
    public static function getProductsPagingIndex(&$paging_html)
    {
        $link = Helper::get_url("?c=listpro&page={page}");
        $sql = "select * from san_pham";
        $total_records = self::db_num_rows($sql);
        $current_page = Helper::input_value('page');
        $limit = 6;
        $paging = Helper::paging($link,$total_records,$current_page,$limit);
        $paging_html = $paging['html'];
        $sql = "select * from san_pham limit {$paging['start']},{$paging['limit']}";
        if(!empty(self::db_get_list($sql)))
        {
            foreach(self::db_get_list($sql) as $row)
            {
                $product = new Product();
                    $product->setId($row['id']);
                    $product->setTen($row['ten']);
                    $product->setGia($row['gia']);
                    $product->setGiachinh($row['giachinh']);
                    $product->setHinhanh($row['hinh_anh']);
                    $product->setNoidung($row['noi_dung']);
                    $product->setThuocmenu($row['thuoc_menu']); 
                    $product->setNoibat($row['noi_bat']);
                    $product->setTrangchu($row['trang_chu']);
                    
                    $products[] = $product;
            }
            return $products;
        }
        return false;
    }
    //phân trang cho chi tiết sản phẩm
    public static function getProductsPagingDetail(&$paging_html)
    {
        $link = Helper::get_url("?c=listpro&page={page}");
        $sql = "SELECT * FROM `san_pham` ORDER BY id DESC ";
        $total_records = self::db_num_rows($sql);
        $current_page = Helper::input_value('page');
        $limit = 3;
        $paging = Helper::paging($link,$total_records,$current_page,$limit);
        $paging_html = $paging['html'];
        $sql = "select * from san_pham ORDER BY id DESC limit {$paging['start']},{$paging['limit']}";
        if(!empty(self::db_get_list($sql))) 
        {
            foreach(self::db_get_list($sql) as $row)
            {
                $product = new Product();
                    $product->setId($row['id']);
                    $product->setTen($row['ten']);
                    $product->setGia($row['gia']);
                    $product->setGiachinh($row['giachinh']);
                    $product->setHinhanh($row['hinh_anh']);
                    $product->setNoidung($row['noi_dung']);
                    $product->setThuocmenu($row['thuoc_menu']); 
                    $product->setNoibat($row['noi_bat']);
                    $product->setTrangchu($row['trang_chu']);
                    
                    $products[] = $product;
            }
            return $products;
        }
        return false;
    }
        //
    public static function getProductById($productid)
    {
            $sql = "select * from san_pham where id=:productID";
            $params = ['productID' => $productid];
            $row = self::db_get_row($sql, $params);
            if(!empty($row))
            {
                $product = new Product();
                    $product->setId($row['id']);
                    $product->setTen($row['ten']);
                    $product->setGia($row['gia']);
                    $product->setGiachinh($row['giachinh']);
                    $product->setHinhanh($row['hinh_anh']);
                    $product->setNoidung($row['noi_dung']);
                    $product->setThuocmenu($row['thuoc_menu']); 
                    $product->setNoibat($row['noi_bat']);
                    $product->setTrangchu($row['trang_chu']);
                return $product;
            }
            return false;
    }
      ///tìm kiếm sản phẩm
    public static function findProducts($condition)
    {
        $sql = "call sp_timkiem(:condition)";
        $params = [
            'condition' => $condition
        ];
        if(!empty(self::db_get_list_condition($sql,$params)))
        {
            foreach(self::db_get_list_condition($sql,$params) as $row){
                $product = new Product();
                $product->setId($row['id']);
                $product->setTen($row['ten']);
                $product->setGia($row['gia']); 
                $product->setGiachinh($row['giachinh']);
                $product->setHinhanh($row['hinh_anh']);
                $product->setNoibat($row['noi_bat']);
                $product->setThuocmenu($row['thuoc_menu']); 
                $products[] = $product;
            }
            return $products;
        }
        return false;
    }
     // tổng hợp sản phẩm 
    public static function getStatistics()
    {
        $sql = "select * from v_soluongsp1";
        if(!empty(self::db_get_list($sql)))
        {
            return self::db_get_list($sql);
        }
        return false;
    }
        
         
    public static function getProductsByCategoryId($categoryid)
    {
            $sql = "select * from san_pham where thuoc_menu=:categoryID";
            $params = ['categoryID' => $categoryid];
            if(!empty(self::db_get_list_condition($sql,$params)))
            {
                foreach(self::db_get_list_condition($sql,$params) as $row)
                {
                    $product = new Product();
                    $product->setId($row['id']);
                    $product->setTen($row['ten']);
                    $product->setGia($row['gia']);
                    $product->setGiachinh($row['giachinh']);
                    $product->setHinhanh($row['hinh_anh']);
                    $product->setNoidung($row['noi_dung']);
                    $product->setThuocmenu($row['thuoc_menu']); 
                    $product->setNoibat($row['noi_bat']);
                    $product->setTrangchu($row['trang_chu']);
                    $products[] = $product;
                }
                return $products;
            }
            return false;
    }
          //trong mục phân trrang
    public static function getProductsPagingByCategoryId($categoryid,&$paging_html)
    {
        $link = Helper::get_url("admin/?c=listpro&catid=$categoryid&page={page}");
        $sql = "select * from san_pham where thuoc_menu=$categoryid";
        $total_records = self::db_num_rows($sql);
        $current_page = Helper::input_value('page');
        $limit = 5;
        $paging = Helper::paging($link,$total_records,$current_page,$limit);
        $paging_html = $paging['html'];
        $sql = "select * from san_pham where thuoc_menu=:categoryID limit {$paging['start']},{$paging['limit']}";
        $params = ['categoryID' => $categoryid];
        if(!empty(self::db_get_list_condition($sql,$params)))
        {
            foreach(self::db_get_list_condition($sql,$params) as $row)
            {
                $product = new Product();
                $product->setId($row['id']);
                $product->setTen($row['ten']);
                $product->setGia($row['gia']);
                $product->setGiachinh($row['giachinh']);
                $product->setHinhanh($row['hinh_anh']);
                $product->setNoidung($row['noi_dung']);
                $product->setThuocmenu($row['thuoc_menu']); 
                $product->setNoibat($row['noi_bat']);
                $product->setTrangchu($row['trang_chu']);
                $products[] = $product;
            }
            return $products;
        }
        return false;
    }

    public static function getMinCatId($id,$table)
    {
       if(!empty($table))
          return self::db_min_id($id,$table);
       return false;
    }
 
    public static function addProduct($product)
    {
        $sql = "INSERT INTO san_pham( ten, gia,giachinh,  hinh_anh, noi_dung, thuoc_menu, noi_bat, trang_chu) 
        VALUES (:ten,:gia,:giachinh,:hinh_anh,:noi_dung,:thuoc_menu,:noi_bat,:trang_chu)";
         $params = [
             "ten" => $product->getTen(),
             "gia" => $product->getGia(),
             "giachinh" => $product->getGiachinh(),
             "hinh_anh" => $product->getHinhanh(),
             "noi_dung" => $product->getNoidung(),
             "thuoc_menu" => $product->getThuocmenu(),
             "noi_bat" => $product->getNoibat(),
             "trang_chu" => $product->gettrangchu()
             
         ];
         if (self::db_execute($sql, $params))
             return true;
         else
             return false;
    }
 
    public static function updateProduct($product)
    {
         

         $sql="update san_pham set ten=:ten,gia=:gia,giachinh=:giachinh,hinh_anh=:hinh_anh,noi_dung=:noi_dung,thuoc_menu=:thuoc_menu,noi_bat=:noi_bat,trang_chu=:trang_chu where id=:productID";
         $params = [
             "productID" => $product->getId(),
             "ten" => $product->getTen(),
             "gia" => $product->getGia(),
             "giachinh" => $product->getGiachinh(),
             "hinh_anh" => $product->getHinhanh(),
             "noi_dung" => $product->getNoidung(),
             "thuoc_menu" => $product->getThuocmenu(),
             "noi_bat" => $product->getNoibat(),
             "trang_chu" => $product->gettrangchu()
         ];
         if (self::db_execute($sql, $params))
             return true;
         else
             return false;
    }
 
    public static function deleteProduct($product)
    {
         $sql = "delete from san_pham where id=:productID";
         $params = [
             "productID" => $product->getId()
         ];
         if (self::db_execute($sql, $params))
             return true;
         else
             return false;
    } 
       //chi tiết sản phẩm 
    public static function detailProduct($productid){
        $sql = "delete from san_pham where id=:productID";
        $params = [
            "productID" => $productid->getId()
        ];
        if (self::db_execute($sql, $params))
            return true;
        else
            return false;
    }
}
?>