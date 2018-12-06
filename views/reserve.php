<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Reservation</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
   <?php
      /*NAVBAR*/
      include("navbar.php");



      // include the configs / constants for the database connection
      require_once("../config/db.php");
      $schedule = array("8:00am-9:55am", "10:00am-11:55am", "12:00am-1:55pm","2:00pm-3:55pm","4:00pm-5:55pm");
      $userName="USERNAME";
      $userPicture="USERPICTURE";

      // Create connection
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
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
               }else{
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
                     $sql2 = "SELECT user_name
                             FROM users
                             WHERE user_id = '" . $row["user_id"] . "';";
                     $result2 = mysqli_query($conn, $sql2);
                     $row2 = mysqli_fetch_assoc($result2);
                     $userName=$row2["user_name"];
                     $userPicture="Not for now";
                     //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                  //}
               } else {
                  $userName=" ";
                  $userPicture=" ";
               }

               echo "<tr>
                        <th scope=\"row\">$schedule[$j]</th>
                        <td>$deskAvailability</td>
                        <td>$userName</td>
                        <td>$userPicture</td>
                     </tr>";
            }
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
<script type="text/javascript" src="classes\manage_reservation.js"></script>
</body>

</html>
