<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Reservation</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link href="../style.css" rel="stylesheet">

</head>

<body>
   <?php
   session_start(); // enable the acces to SESSION variables

   // include the configs / constants for the database connection
   require_once("../config/db.php");

   /*NAVBAR*/
   include("navbar.php");

   // Create connection
   $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

       function check_row($IdOfRow)
       {
           // Create connection
           $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
           // Check connection
           if (!$conn) {
               die("Connection failed: " . mysqli_connect_error());
           }

           // make the request to the DATABASE
           $sql = "SELECT desk_status
                 FROM desk
                 WHERE desk_id = '" . $IdOfRow . "';";
           $result = mysqli_query($conn, $sql); // send the query
           $row = mysqli_fetch_assoc($result); // fetch keys with values
           if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
               if ($row["desk_status"]=="AVAIL") { // if Avail, make the reservation
                   // TODO: add session username and pics

                   // update DATABASE values
                   $sql_user_info = "UPDATE desk
                       SET user_id= '" .$_SESSION['user_id']. "'
                       WHERE desk_id = '" . $IdOfRow . "';";

                   //Check if the update is done
                   if (mysqli_query($conn, $sql_user_info)) {
                       echo "Record updated successfully";
                   } else {
                       echo "Error updating record: " . mysqli_error($conn);
                   }

                   // update DATABASE values
                   $sql_user_info = "UPDATE desk
                       SET desk_status= 'NAVAIL'
                       WHERE desk_id = '" . $IdOfRow . "';";

                   //Check if the update is done
                   if (mysqli_query($conn, $sql_user_info)) {
                       echo "Record updated successfully";
                   } else {
                       echo "Error updating record: " . mysqli_error($conn);
                   }
               }
           } else {
               // TODO: add error message like it's already reserved
               ?> <script>
                  alert("You cann't reserve here, someone already reserved it"); // alert if you cann't reserve the desk
               </script> <?php
           }

           // refresh the page without a request for reservation
           header('Location:reserve.php');

           // close the connection
           mysqli_close($conn);
       }

       // check if there is a request for a reservation
       if (isset($_GET['IdOfRow'])) {
           check_row($_GET['IdOfRow']);
       }

      // Array to store all the schedule (we can acces it with id)
      $schedule = array("8:00am-9:55am", "10:00am-11:55am", "12:00am-1:55pm","2:00pm-3:55pm","4:00pm-5:55pm");

      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $deskId = 0; // the id of the current desk
         for ($i=0; $i < 10 ; $i++) { // 10 desk so 10 tables
             $deskNbr = $i+1; // the desk id start at 1 in the DATABASE not 0

             // creat a table in HTML with Bootstrap CSS
             echo "<div class=\"bg-light p-3 m-3\">
                     <h1>Desk $deskNbr </h1>
                        <table class=\"table table-hover\">
                           <thead>
                              <tr>
                                 <th scope=\"col\">Schedule</th>
                                 <th scope=\"col\">Availability</th>
                                 <th scope=\"col\">Username</th>
                                 <th scope=\"col\">User's picture</th>
                              </tr>
                           </thead>
                           <tbody>";

             for ($j=0; $j < 5 ; $j++) { // five schedule per desk
                 $deskId = $deskId+1; // increment to go from 1 to 50 (id of all desk/schedule)
                 // SQL request
                 $sql = "SELECT desk_status
                       FROM desk
                       WHERE desk_id = '" . $deskId . "';";
                 $result = mysqli_query($conn, $sql); // send the query
                 $row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // Check if the request work
                     $deskAvailability =$row["desk_status"];
                 } else {
                     $deskAvailability ="ERROR DATABASE";
                 }

                 // SQL request
                 $sql = "SELECT user_id
                       FROM desk
                       WHERE desk_id = '" . $deskId . "';";
                 $result = mysqli_query($conn, $sql); // send the query
                 $row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // Check if the request work
                     // SQL Request for the user img and name
                     $sql2 = "SELECT user_name,user_img
                             FROM users
                             WHERE user_id = '" . $row["user_id"] . "';";
                     $result2 = mysqli_query($conn, $sql2); // send the query
                     $row2 = mysqli_fetch_assoc($result2); // fetch keys with values

                     // Update variables for the name and pics path
                     $userName=$row2["user_name"];
                     $userPicture=$row2["user_img"];
                 } else {
                     $userName="row".$deskId;
                     $userPicture="";
                 }

                 // print row with user infos
                 echo "<tr onclick=\"location.href='reserve.php?IdOfRow=$deskId';\" id=\"row$deskId\">
                        <th scope=\"row\">$schedule[$j]</th>
                        <td>$deskAvailability</td>
                        <td>$userName</td>
                        ";

                  // if no one reserve the desk don't print an img but just a blank space
                 if ($userPicture=="") {
                     echo "<td> $userPicture </td>
               </tr>";
                 } else {
                     echo "<td><img src=\"../$userPicture\" alt=\"user pic\" class=\"img-thumbnail\"></td>
               </tr>
               ";
                 }
             }

             // end of tables
             echo "</tbody>
               </table>

            </div>";
         }

         // close Database connection
         mysqli_close($conn);

      ?>

      <!--JS/JQUERY INCLUDE-->
      <!--script type="text/javascript" src="..\classes\manage_reservation.js"></script-->
      <!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
