<?php
  $content = Helper::input_value('c');
  if(!empty($content))
  {
     switch($content)
     {
        //category
         case "addcat":
            include_once("view/category/add.php");
            break;

         case "editcat":
            include_once("view/category/edit.php");
            break;

         case "deletecat":
            include_once("view/category/delete.php");
            break;

         case "findcat":
               include_once("view/category/find.php");
               break;

         case "listcat":
            include_once("view/category/list.php");
            break;    

        //product

         case "listpro":
            include_once("view/product/list.php");
            break;  

         case "addpro":
            include_once("view/product/add.php");
            break;   

         case "findpro":
            include_once("view/product/find.php");
            break;  

         case "listprocat":
               include_once("view/product/listcat.php");
               break; 

         case "editpro":
                  include_once("view/product/edit.php");
                  break; 
               
         case "statisticpro":
            include_once("view/product/statistic.php");
            break;  
            
         //users
         case "listUs":
            include_once("view/users/list.php");
            break;  
         case "editUs":
            include_once("view/users/edit.php");
            break;   
            
         case "deleteUs":
            include_once("view/users/delete.php");
            break; 

          case "findUs":
            include_once("view/users/find.php");
            break; 
         ///login-logout
         case "login":
            include_once("view/common/login.php");
            break;  
         case "logout":
            include_once("view/common/logout.php");
            break; 

          ///Bill  
          case "listbill":
            include_once("view/bill/list.php");
            break;
            case "chitiet":
               include_once("view/bill/chitiet.php");
               break;  

           ///Slide  
           case "listSlide":
            include_once("view/slide.php/list.php");
            break;
            case "addSlide":
               include_once("view/slide.php/add.php");
               break;
           //baocao
           case "baocao":
            include_once("view/baocao/main.php");
            break;

                
             


     }
  }
  else
      include_once("view/category/list.php");  
?>