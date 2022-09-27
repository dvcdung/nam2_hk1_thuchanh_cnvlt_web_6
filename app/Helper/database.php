<?php

      function db_connect()
      {
         global $dsn,$username,$password, $con,$options, $error_message;
         $dsn = 'mysql:host=localhost;dbname=lab';
         $username = "root";
         $password = "";
         $con = null;
         try {
               if (is_null($con)) {
                  $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                  $con = new PDO($dsn, $username, $password, $options);
                  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                  // echo "Ket noi thanh cong";            
               }
         } catch (PDOException $e) {
               $error_message = $e->getMessage();
         }
      }

      function db_disconnect()
      {
         global $con;
         if (!is_null($con)) {
               $con = null;
         }
      }
    
      function db_execute($sql = '', $params = [])
      {
         global $con;
         if (!is_null($con)) {
               $result = $con->prepare($sql);
               $result->execute($params);
               if ($result->rowCount() > 0) {
                  $result->closeCursor();
                  return true;
               }
         }
         return false;
      }

      function db_get_list($sql = '')
      {
         global $con;
         if (!is_null($con)) {
               $result = $con->prepare($sql);
               $result->execute();
               if ($result->rowCount() > 0) {
                  $rows = $result->fetchAll();
                  $result->closeCursor();
                  return $rows;
               }
         }
         return false;
      }

      function db_get_list_condition($sql = '', $params = [])
      {
         global $con;
         if (!is_null($con)) {
               $result = $con->prepare($sql);
               $result->execute($params);
               if ($result->rowCount() > 0) {
                  $rows = $result->fetchAll();
                  $result->closeCursor();
                  return $rows;
               }
         }
         return false;
      }

      function db_get_row($sql = '', $params = [])
      {
         global $con;
         if (!is_null($con)) {
               $result = $con->prepare($sql);
               $result->execute($params);
               if ($result->rowCount() > 0) {
                  $row = $result->fetch();
                  $result->closeCursor();
                  return $row;
               }
         }
         return false;
      }

      function db_get_value($sql = '')
      {
         global $con; 
         if(!is_null($con))
         {
            $count = 1;
            $result = $con->prepare($sql);
            $result->execute();
            if($result->rowCount() > 0)
               $count = $result->fetch();
            $result->closeCursor();  
            return $count[0];
         }
         return false;
      }

      function db_num_rows($sql = '') 
      {
         global $con;
         $count = 0;
         if(!is_null($con))
         {
               $result = $con->prepare($sql);
               $result->execute();
               $count = $result->rowCount();
               $result->closeCursor();
               return $count;
         }
         return false;
      }
?>