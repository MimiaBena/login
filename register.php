<?php
       require("connexionBd.php");
       $firstname = $lastname = $email = $password = $passwordconf = "";
       $firstnameErr = $lastnameErr = $emailErr = $passwordErr = $messageErr =  "";


     if($_SERVER["REQUEST_METHOD"] == "POST"){
         //check form
         if(isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'],$_POST['passwordconf'])){
             // check input et personalise the message
               if(empty($_POST["firstname"])){
                   $firstnameErr = "Firstname is required!";
               }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$firstname)){
                   $firstnameErr =" Only letters and white space allowed!";
               }
             if(empty($_POST['lastname'])){
                 $lastnameErr = "Lastname is required";   
              }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$lastname)){
                     $lastnameErr =" Only letters and white space allowed!";
              }
             if(empty($_POST['email'])){
                 $emailErr = "Email is required!";
                 
             }
             
             if(empty($_POST['password'] || $_POST['passwordconf'] )){
                 $passwordErr = "Password is required!";
                 
             }
             if(!($_POST['password'] === $_POST['passwordconf'])){
                     $passwordErr = "Choose the same password!";
                 }
             
             elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               $emailErr = "Invalid email format!";   
            }
             else{
                
                   $firstname = inputTest($_POST['firstname']);
                   $lastname = inputTest($_POST['lastname']);
                   $email = inputTest($_POST['email']);
                   $password = inputTest($_POST['passwordconf']);
                   $passwordconf = inputTest($_POST['passwordconf']);
$sql = "INSERT INTO users SET firstname='".$_POST['firstname']."', lastname='".$_POST['lastname']."', email='".$_POST['email']."', password='".$_POST['password']."'";
//$sql = "INSERT INTO `users`( firstname, lastname, email, password) VALUES ('$firstname','$lastname','$email' ,'$password')";
                 if(!mysqli_query($con, $sql)){
                     
                     echo "Une erreur s'est produite: ".mysqli_error($con);
                 }else{
                     
                      echo "Succed ";
                 }
                   /*$sql = "INSERT INTO `users`( firstname, lastname, email, password) VALUES ('$firstname', '$lastname','$email','$password')";
             $result = mysqli_query($con, $sql) or die('Error: ' . mysqli_error($con));*/
               
             }
             
                 
             
                 
                 
             
               
       
         } 
        
     }






?>











<!DOCTYPE html>
<html>
    <head>
       <title> Register</title>
        <link href="style.css" rel="stylesheet">
    
    </head>
    <body>
          <div class="login">
              
              <form method="post" action="">
                  <h1>Regiter</h1>
                  Firstname:<span>*</span>
                  <input type="text" name="firstname" placeholder="Enter your firstname!"  ><span><?php echo $firstnameErr; ?></span><br><br>
                  Lastname:<span>*</span>
                  <input type="text" name="lastname" placeholder="Enter your lastname!"  >
                  <span><?php echo $lastnameErr; ?></span>
                  <br><br>
                  Email:<span>*</span>
                  <input type="text" name="email" placeholder="Enter your Email!"  >
                  <span><?php echo $emailErr; ?></span>
                  <br><br>
                  Password:<span>*</span>
                  <input type="password" name="password" placeholder="Enter your password"  >
                  <span><?php echo $passwordErr; ?></span>
                  <br><br>
                  Password:<span>*</span>
                  <input type="password" name="passwordconf" placeholder="Confirm your password"  >
                  <span><?php echo $passwordErr; ?></span>
                  <br><br>
                  <input type="submit" name="submit" value="Create account">
                  <p>Already have an account?<a href="index.php"> Login</a></p>
                  
                  
                  
                
                  
              
              
              
              
              </form>
        
        
        
          </div>
    
    </body>
</html>