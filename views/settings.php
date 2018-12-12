<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Settings</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   </head>
   <body>

      <?php
      // include the configs / constants for the database connection
      require_once("../config/db.php");

      session_start(); // enable the acces to SESSION variables

      /*NAVBAR*/
      include("navbar.php");

      function reset_all_data() // function to reset all the DATA of desk TABLE
      {
          // Create connection
          $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          // Put to NULL and AVAIL all desk
          $sql_user_info = "UPDATE desk
              SET user_id= NULL,
                 desk_status='AVAIL'";

          // Check if UPDATE work
          if (mysqli_query($conn, $sql_user_info)) {
             echo "<div class=\"alert alert-success w-75 mx-auto m-3 text-center\" role=\"alert\">
            The database is reset
            </div>";
          } else {
              echo "Error updating record: " . mysqli_error($conn);
          }

          // Close database Connection
          mysqli_close($conn);
      }

      // Check if there is the parameter to reset
       if (isset($_GET['Reset'])) {
           if (isset($_SESSION['user_name'])){
              reset_all_data();
          }else{
             echo "<div class=\"alert alert-danger w-75 mx-auto m-3 text-center\" role=\"alert\">
            You have to be logged in to reset all
            </div>";
          }

       }
       /*else {
           echo "FAILED";
       }*/
        ?>


   <div class="alert alert-warning w-75 mx-auto m-3 text-center" role="alert">
      Do you want to reset all existing reservation ?
   </div>
   <div class="text-center">
     <a href='settings.php?Reset=$deskId=true'> <button type="button" class="btn btn-danger mx-auto" id="anyDesk">Reset all reservation</button> </a>
   </div>


   <script type="text/javascript">
      var element = document.getElementById("nav0");
      element.classList.remove("active");
       element = document.getElementById("nav1");
      element.classList.remove("active");
      element = document.getElementById("nav2");
     element.classList.add("active");
   </script>

   </body>
</html>
