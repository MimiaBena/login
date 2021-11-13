<?php
     require("connexionBd.php");
        session_start();
      //define variable
     $email=$password= "";
      $messageErr = "";
     if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_POST['email']) && isset($_POST['password'])){
             if(empty($_POST["email"]) || empty($_POST["password"])){
                $messageErr = "This field is required";     
            }else{
                $email = inputTest($_POST["email"]);
                $password = inputTest($_POST["password"]);
                 
            
             
             $sql ="SELECT * FROM `users` WHERE email='$email' AND password='$password'";
             $result = mysqli_query($con,$sql) or die('Error: ' . mysqli_error($con));
  $rows = mysqli_num_rows($result);
  if($rows==1){
                 
                 //$result=execute(array($email, $password));
                
            //$count = mysqli_num_rows($result);
     // $reponse      = mysqli_fetch_array($result);
        //$count = $reponse['count(*)'];
        //if($result){
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      //if($result == 1) {
          
        
                      $_SESSION['email'] = $email;
                      header("Location: acceuil.php");
                }else{
                    $messageErr= " Email or password incorrect";
                   // header("Location: index.php");
                }
              
             
                        
         }          
          
     }
     }
        
    
    




?>
