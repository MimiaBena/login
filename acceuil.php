
<?php 
    require("login.php");
     //session_start();

   if(!isset($_SESSION['email'])){
       header("Location: index.php");
       exit();
   }

?>

<!DOCTYPE html>
<html>
    <head>Acceuil</head>
    <body>
        
        <h1>Acceuil</h1>
        <p>Welcome <?php echo $_SESSION['email']; ?></p>
        <p>it's your..............</p>
         <a href="logout.php" >Déconnexion</a>
    
    
    
    
    </body>





</html>