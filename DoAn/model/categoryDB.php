<?php
   include_once('connectDB.php');
       
  class Category
  {
      private $id,$name;
      public function getId() {
         return $this->id;
      }
      public function setId($value) {
         $this->id = $value;
      }
      public function getName() {
         return $this->name;
      }
      public function setName($value) {
         $this->name = $value;
      }
  }

  class CategoryDB extends Database
  {
      public static function getCategories()
      {
          $sql = "select * from menu_doc";
          if(!empty(self::db_get_list($sql)))
          {
          foreach(self::db_get_list($sql) as $row){
              $category = new Category();
              $category->setId($row['id']);
              $category->setName($row['ten']);
              $categories[] = $category;
          }
          return $categories;
          }
      }

      public static function getCategoriesPaging(&$paging_html)
      {
           $link = Helper::get_url('admin/?c=listcat&page={page}');
           $sql = "select * from menu_doc";
           $total_records = self::db_num_rows($sql);
           $current_page = Helper::input_value('page');
           $limit = 5;
           $paging = Helper::paging($link,$total_records,$current_page,$limit);
           $paging_html = $paging['html'];
           $sql = "select * from menu_doc limit {$paging['start']},{$paging['limit']}";
           if(!empty(self::db_get_list($sql)))
           {
               foreach(self::db_get_list($sql) as $row){
                   $category = new Category();
                   $category->setId($row['id']);
                   $category->setName($row['ten']);
                   $categorys[] = $category;
               }
               return $categorys;
           }
           return false;
      }

      public static function getCategoryById($catid)
      {
          $sql = "select * from menu_doc where id=:id";
          $params = ['id' => $catid];
          $row = self::db_get_row($sql, $params);
          if(!empty($row))
          {
              $category = new Category();
              $category->setId($row['id']);
              $category->setName($row['ten']);
              return $category;
          }
      }

      public static function addCategory($category)
      {
          $sql = "insert into menu_doc(ten) values(:ten)";
          $params = [
              "ten" => $category->getName()
          ];
          if (self::db_execute($sql, $params))
              return true;
          else
              return false;
      }

      public static function updateCategory($category)
      {
          $sql = "update menu_doc set ten=:ten where id=:id";
          $params = [
              "id" => $category->getId(),
              "ten" => $category->getName()
          ];
          if (self::db_execute($sql, $params))
              return true;
          else
              return false;
      }

      public static function deleteCategory($category)
      {
          $sql = "delete from menu_doc where id=:id";
          $params = [
              "id" => $category->getId()
          ];
          if (self::db_execute($sql, $params))
               return true;
          else
               return false;
      }
      public static function findCategory($condition)
      {
          $sql = "call sp_timkiemmunudoc(:condition)";
          $params = [
              'condition' => $condition
          ];
          if(!empty(self::db_get_list_condition($sql,$params)))
          {
              foreach(self::db_get_list_condition($sql,$params) as $row){
                  $category = new Category();
                  $category->setName($row['ten']);
                  $categories[] = $category;
              }
              return $categories;
          }
          return false;
      }

    
  }

?>