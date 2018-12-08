<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Settings</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   </head>
   <body>

      <?php
      require_once("../config/db.php");
      /*NAVBAR*/
      include("navbar.php");

      function reset_all_data()
      {
          // Create connection
          $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

         /* $sql_user_info = "UPDATE desk
             SET user_id= NULL,
               desk_status='AVAIL'
             WHERE desk_status = 'NAVAIL';";*/
             $sql_user_info = "UPDATE desk
              SET user_id= NULL,
                 desk_status='AVAIL'";
          /*$result_user_info = mysqli_query($conn, $sql_user_info);
          $row_user_info = mysqli_fetch_assoc($result_user_info);*/
          //if (mysqli_num_rows($result_user_info) > 0) {
          if (mysqli_query($conn, $sql_user_info)) {
              echo "Record updated successfully";
          } else {
              echo "Error updating record: " . mysqli_error($conn);
          }
          mysqli_close($conn);
      }

       if (isset($_GET['Reset'])) {
           reset_all_data();
       } else {
           echo "FAILED";
       }
        ?>


   <div class="alert alert-warning w-75" role="alert">
      Do you want to reset all existing reservation ?
   </div>
   <div class="col-6 text-center">
     <a href='settings.php?Reset=$deskId=true'> <button type="button" class="btn btn-danger mx-auto" id="anyDesk">Reset all reservation</button> </a>
   </div>

   </body>
</html>
