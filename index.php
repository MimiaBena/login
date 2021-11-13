<?php
     require("login.php");
?>


<!DOCTYPE html>
<html>
    <head>
         <title>Login</title>
         <link href="style.css" rel=stylesheet>
    </head>
    <body>
        <div class="login">
            
            <form method="post" action="">
                <h1>Login</h1>
               Login:<span>*</span>
                <input type=text name="email" placeholder="Your Identifiant!"><span><?php echo $messageErr; ?></span>
                <br><br>
                Password:<span>*</span>
                <input type="password" name="password" placeholder="Your password!"><span><?php echo $messageErr; ?></span>
                <input type="submit" name="Login" value="Login">
                   
        
        
        </form>
        
        </div>

    </body>
</html>