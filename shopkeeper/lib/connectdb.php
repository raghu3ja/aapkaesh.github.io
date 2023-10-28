<?php
     $host="localhost";
     $username="aapkaesh_aapkaeshop";
     $password="sRee8008#";
     //$username="root";
     //$password="";
     $dbname="aapkaesh_aapkaesh";
      $conn=mysqli_connect($host,$username,$password,$dbname);
 if($conn)
      {
         //echo"connection ok"
      }
      else
      {
          //echo"connection faild"
          die("connction faild because".mysqli_connect_error());
      }
?>