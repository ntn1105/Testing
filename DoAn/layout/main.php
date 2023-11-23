<?php
  $content = Helper::input_value('c');
  if(!empty($content))
  {
     switch($content)
     {
        // sản phẩm 
      case "listpro":
         include_once("view/product/list.php");
         break; 
      case "listcat":
         include_once("view/product/listcat.php");
         break;     
      case "listdetail":
         include_once("view/product/detail.php");
         break;
      case "findpro":
         include_once("view/product/find.php");
         break;       
      case "listdell":
         include_once("view/category/dell.php");
         break;    
      case "listhp":
         include_once("view/category/hp.php");
         break;  
      case "listasus":
         include_once("view/category/asus.php");
         break; 
         // danh mục sản phẩm      
      case "addcart":
         include_once("view/cart/add.php");
         break;
      case "deletecart":
         include_once("view/cart/delete.php");
         break;   
      case "updatecart":
         include_once("view/cart/update.php");
         break;    
      case "listcart":
         include_once("view/cart/list.php");
         break;
         //thanh toán vs hóa dơn
      case "checkout":
         include_once("view/order/checkout.php");
         break;
      case "order":
         include_once("view/order/order.php");
         break;    
         //đăng kí đăng nhập  
      case "login":
         include_once("view/common/login.php");
         break;  
         case "register":
            include_once("view/common/register.php");
            break; 
      case "logout":
         include_once("view/common/logout.php");
         break;  
         //liên hệ
         case "contact":
            include_once("view/common/contact.php");
            break;  

  }
  }
  else
      include_once("view/product/list.php");    
?>