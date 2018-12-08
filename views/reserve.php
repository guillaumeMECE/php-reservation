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
   session_start();
   echo $_SESSION['user_id'];
   require_once("../config/db.php");
   /*NAVBAR*/
   include("navbar.php");
   // Create connection
   $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

       function check_row($IdOfRow)
       {
           // include the configs / constants for the database connection

           echo "hey this is working";
           // Create connection
           $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
           // Check connection
           if (!$conn) {
               die("Connection failed: " . mysqli_connect_error());
           }
           $sql = "SELECT desk_status
                 FROM desk
                 WHERE desk_id = '" . $IdOfRow . "';";
           $result = mysqli_query($conn, $sql);
           $row = mysqli_fetch_assoc($result);
           if (mysqli_num_rows($result) > 0) {
               if ($row["desk_status"]=="AVAIL") {
                   // TODO: add session username and pics
                   $sql_user_info = "UPDATE desk
                       SET user_id= '" .$_SESSION['user_id']. "'
                       WHERE desk_id = '" . $IdOfRow . "';";
                   /*$result_user_info = mysqli_query($conn, $sql_user_info);
                   $row_user_info = mysqli_fetch_assoc($result_user_info);*/
                   //if (mysqli_num_rows($result_user_info) > 0) {
                   if (mysqli_query($conn, $sql_user_info)) {
                       echo "Record updated successfully";
                   } else {
                       echo "Error updating record: " . mysqli_error($conn);
                   }
                   $sql_user_info = "UPDATE desk
                       SET desk_status= 'NAVAIL'
                       WHERE desk_id = '" . $IdOfRow . "';";
                   /*$result_user_info = mysqli_query($conn, $sql_user_info);
                   $row_user_info = mysqli_fetch_assoc($result_user_info);*/
                   //if (mysqli_num_rows($result_user_info) > 0) {
                   if (mysqli_query($conn, $sql_user_info)) {
                       echo "Record updated successfully";
                   } else {
                       echo "Error updating record: " . mysqli_error($conn);
                   }
                   //header("Refresh:0");

                   //return true;
               //}
               }
           } else {
               // TODO: add error message like it's already reserved
               alert("You cann't");
           }
           header('Location:reserve.php');
           //return $data+1;
           mysqli_close($conn);
       }
       // TODO: can't lunch check_row
       if (isset($_GET['IdOfRow'])) {
           check_row($_GET['IdOfRow']);
       } else {
           echo "FAILED";
       }












      // include the configs / constants for the database connection
      //require_once("../config/db.php");
      $schedule = array("8:00am-9:55am", "10:00am-11:55am", "12:00am-1:55pm","2:00pm-3:55pm","4:00pm-5:55pm");
      //$userName="USERNAME";
      //$userPicture="USERPICTURE";


      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $deskId = 0;
         for ($i=0; $i < 10 ; $i++) { //10 desk so 10 tables
             $deskNbr = $i+1;
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
             for ($j=0; $j < 5 ; $j++) {
                 $deskId = $deskId+1;//increment to go from 1 to 50 (id of all desk/schedule)
                 $sql = "SELECT desk_status
                       FROM desk
                       WHERE desk_id = '" . $deskId . "';";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                 if (mysqli_num_rows($result) > 0) {
                     $deskAvailability =$row["desk_status"];
                 } else {
                     $deskAvailability ="ERROR DATABASE";
                 }

                 $sql = "SELECT user_id
                       FROM desk
                       WHERE desk_id = '" . $deskId . "';";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                 if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     //while($row = mysqli_fetch_assoc($result)) {
                     $sql2 = "SELECT user_name,user_img
                             FROM users
                             WHERE user_id = '" . $row["user_id"] . "';";
                     $result2 = mysqli_query($conn, $sql2);
                     $row2 = mysqli_fetch_assoc($result2);
                     $userName=$row2["user_name"];
                     $userPicture=$row2["user_img"];
                 //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                  //}
                 } else {
                     $userName="row".$deskId;
                     $userPicture="";
                 }

                 echo "<tr onclick=\"location.href='reserve.php?IdOfRow=$deskId';\" id=\"row$deskId\">
                        <th scope=\"row\">$schedule[$j]</th>
                        <td>$deskAvailability</td>
                        <td>$userName</td>
                        row$deskId";

                 /*echo "<tr onclick=\"rowClick($deskId)\" id=\"row$deskId\">
                          <th scope=\"row\">$schedule[$j]</th>
                          <td>$deskAvailability</td>
                          <td>$userName</td>
                          row$deskId";*/

                 if ($userPicture=="") {
                     echo "<td> $userPicture </td>
               </tr>";
                 } else {
                     echo "<td><img src=\"../$userPicture\" alt=\"user pic\" class=\"img-thumbnail\"></td>
               </tr>
               ";
                 }
             }
             //$userPicture


             /*
             if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
               echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                 }
             } else {
                 echo "0 results";
             }

             $sql = "SELECT user_name, user_email, user_password_hash, user_img
                     FROM users
                     WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
             */

             echo "</tbody>
               </table>

            </div>";
         }

         mysqli_close($conn);

      ?>
      <!--h1>Desk 1</h1>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Schedule</th>
               <th scope="col">Availability</th>
               <th scope="col">Username</th>
               <th scope="col">User's picture</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th scope="row">1</th>
               <td>Mark</td>
               <td>Otto</td>
               <td>@mdo</td>
            </tr>
            <tr>
               <th scope="row">2</th>
               <td>Jacob</td>
               <td>Thornton</td>
               <td>@fat</td>
            </tr>
            <tr>
               <th scope="row">3</th>
               <td colspan="2">Larry the Bird</td>
               <td>@twitter</td>
            </tr>
         </tbody>
      </table-->








      <!--JS/JQUERY INCLUDE-->
      <!--script type="text/javascript" src="..\classes\manage_reservation.js"></script-->
      <!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
