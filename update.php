<?php
    require("connexionBd.php");
    $password = $passwordconf = $email = $passwordErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
         //check form
         if(isset($_POST['email'], $_POST['password'],$_POST['passwordconf'])){
             
             if(empty($_POST['password'] || $_POST['passwordconf'] )){
                 $passwordErr = "Password is required!";
                 
             }
             elseif(strlen($_POST['password'])>=10){
                 
                 $passwordErr = "Choose another password, please!".strlen($_POST['password']);
                 
             }
             elseif(!($_POST['password'] === $_POST['passwordconf'])){
                     $passwordErr = "Choose the same password!";
                 }
             else{
                  $email = inputTest($_POST['email']);
                   $password = inputTest($_POST['password']);
                   $passwordconf = inputTest($_POST['passwordconf']);
                 $sql= "UPDATE `users` SET password='".hash('sha256',$_POST['password'])."' WHERE email='$email'";
                $result = mysqli_query($con, $sql)or die('Error: ' . mysqli_error($con));
                 if(!$result){
                     
                     echo "Problem connexion: ".mysqli_error($con);
                 }else{
                     echo "success!";
                 }   
             }    
         }}






?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
        <link href="style.css" rel=stylesheet>
    </head>
    <body>
        <div class="login">
        <form method="post" action="">
            <h1>Update password</h1>
            Email:
            <input name="email" type="text" placeholder="Your email adress" >
            Password:<span>*</span>
            <input name="password" type="password" placeholder="Choose your password!">
            <?php echo $passwordErr; ?>
            Confirm password:<span>*</span>
            <input type="password" name="passwordconf" placeholder="Confirm your password!">
            <input type="submit" name="update" value="Update password">
            <?php echo $passwordErr; ?>

        </form>
        </div>
    
    
    </body>
</html>