<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Parameter</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

   <?php

      /*NAVBAR*/
      include("views/navbar.php");
      ?>

   <!--User Card-->
   <div class="card m-5" style="width: 18rem;">
      <img class="card-img-top" src="res\user-img.jpg" alt="Card image user">
      <div class="card-body">
         <h5 class="card-title"><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}else{echo "user";}  ?></h5>
         <p class="card-subtitle mb-2 text-muted"><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}else{echo "email";} ?></p>
         <a href="#" class="card-link">Change user image</a>
      </div>
   </div>
</body>

</html>
