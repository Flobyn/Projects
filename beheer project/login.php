<!-- om de session te starten-->
<?php
   ob_start();
   session_start();
?>
<html>
   <head>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
    <!-- ik heb de style hiervoor even hierin gezet voor mezelf met dat dat even makkelijker was -->
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #457b9d;
         }
		  	/* formulier opmaak*/
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
         }
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         .form-signin .checkbox {
            font-weight: normal;
         }
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         .form-signin .form-control:focus {
            z-index: 2;
         }
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         /* tekst */ 
         h2{
            text-align: center;
            color: white;
         }
		  p{
			text-align:center;		  
		  }
      </style> 
   </head>
<body>
      
      <h2>Voer gebruikersnaam en wachtwoord</h2> 

      <div class = "container form-signin">
         <!-- wat het ww en user is en dat die ook werker als alles klopt waar het naar door gestuurd kan worden -->
<?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'Deuss' && 
                  $_POST['password'] == '12Bolletjes') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'Deuss';
                  
                  header( "Location: invul.php" );
               }else {
                  $msg = 'Verkeerde inlog';
               }
            }
?>
      </div> 

      <div class = "container">
         <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">  
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" name = "username" placeholder ="User = Deuss" required autofocus><br>
            <input type = "password" class = "form-control" name = "password" placeholder = "Pass = 12Bolletjes" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>
         </form>
      </div> 
      
</body>
</html>