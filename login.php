<?php
     include("connexionBd.php");
        session_start();
      //define variable
      $name = "";
      $password = "";
      $nameErr = "";
      $passwordErr = "";
      $messageErr = "";

      if(isset($_POST['name']) && isset($_POST['password'])){
             if(empty($_POST["name"]) || empty($_POST["password"])){
                $nameErr = "This field is required";     
         }else{
             $name = test_input($_POST["name"]);
                if(!filter_var($name, FILTER_VALIDATE_EMAIL)){
               $emailErr = "Invalid email format!";   
            }
             $password = test_input($_POST["password"]);
             $sql ="SELECT * FROM 'users' WHERE email='$name' and password= '$password'";
              $result = mysqli_query($con, $sql);
                 $rows = mysqli_num_rows($result);
                if ($rows = 1){
                      $_SESSION['name'] = $name;
                }else{
                    $messageErr= " Email or password incorrect";
                    header("Location: index.php");
                }
              
             
                        
         }          
          
          
        
        
    }
    




?>
