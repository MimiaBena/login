<?php

   
     
     //variable data connexion
     $servername = "localhost";
     $username = "root";
     $password = "";
     $bd = "loginbd";

    
     //Connexion bd
    try{
        $con = new PDO("mysql:host=$servername;dbname=$bd",$username, $password);
        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
   catch(Exception $e){
       echo "Connection failed: " . $e->getMessage();
   }

   //function test input

     function inputTest($var){
         htmlspecialchars($var);
        trim($var);
        stripslashes($var);
        return $var;
     }



?>