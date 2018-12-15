<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>My Reservation</title>
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

      function print_my_reservation()
      {
         // creat a table in HTML with Bootstrap CSS
         echo "<div class=\"bg-light p-3 m-3 shadow-sm\">
                 <h1>My Bookings</h1>
                    <table class=\"table table-hover\">
                       <thead>
                          <tr>
                           <th scope=\"col\">Desk</th>
                           <th scope=\"col\">Schedule</th>
                           <th scope=\"col\">Username</th>
                           <th scope=\"col\">User's picture</th>
                          </tr>
                       </thead>
                       <tbody>";


         // Create connection
         $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
         // Check connection
         if (!$conn) {
             die("Connection failed: " . mysqli_connect_error());
         }
         // SQL request
         $sql = "SELECT desk_id
               FROM desk
               WHERE user_id = '" . $_SESSION['user_id'] . "';";
         $result = mysqli_query($conn, $sql); // send the query
         //$row = mysqli_fetch_assoc($result); // fetch keys with values
         //$nbrBooking = mysqli_num_rows($result);

         //for ($i=0; $i < $nbrBooking ; $i++) {
         while($row = mysqli_fetch_assoc($result)){
            // Update variables for the name and pics path
            $userName=$_SESSION['user_name'];
            $userPicture=$_SESSION["user_img"];
            $tst=$row["desk_id"];
            $deskId=which_desk_id($tst);
            $schedule=which_schedule($tst);

            echo "<tr>
                  <th scope=\"row\">$deskId</th>
                   <td>$schedule</td>
                   <td>$userName</td>
                   <td><img src=\"../$userPicture\" alt=\"user pic\" class=\"img-thumbnail shadow-sm\"></td>
                   </tr>
                   ";

         }
         // end of tables
         echo "</tbody>
           </table>

        </div>";


         /*if (mysqli_num_rows($result) > 0) { // Check if the request work
             $deskAvailability =$row["desk_status"];
         } else {
             $deskAvailability ="ERROR DATABASE";
         }*/


          mysqli_close($conn);
      }

      function which_schedule($id)
      {
         // Array to store all the schedule (we can acces it with id)
         $schedule = array("8:00am-9:55am", "10:00am-11:55am", "12:00am-1:55pm","2:00pm-3:55pm","4:00pm-5:55pm");
         //                     1+5*i             2+5*i              3+5*i           4+5*i            5+5*i
         $ref=0;
         for ($j=1; $j < 6 ; $j++) {
            for ($i=0; $i < 10 ; $i++) {
               $ref = $j+5*$i;
               if ($ref == $id) {
                  return $schedule[$j-1] ;
               }
            }
         }
      }

      function which_desk_id($id)
      {
         if ($id<6 && $id>0) {
            return 1;
         }elseif($id<11 && $id>5){
            return 2;
         }elseif($id<16 && $id>10){
            return 3;
         }elseif($id<21 && $id>15){
            return 4;
         }elseif($id<26 && $id>20){
            return 5;
         }elseif($id<31 && $id>25){
            return 6;
         }elseif($id<36 && $id>30){
            return 7;
         }elseif($id<41 && $id>35){
            return 8;
         }elseif($id<46 && $id>40){
            return 9;
         }elseif($id<51 && $id>45){
            return 10;
         }

      }

      if (isset($_SESSION['user_name'])){
         print_my_reservation();
     }else{
        echo "<div class=\"alert alert-danger w-75 mx-auto m-3 text-center\" role=\"alert\">
       You have to be logged in to view your bookings
       </div>";
     }

       ?>

       <script type="text/javascript">
          var element = document.getElementById("nav0");
          element.classList.remove("active");
           element = document.getElementById("nav1");
          element.classList.remove("active");
          element = document.getElementById("nav2");
        element.classList.remove("active");
        element = document.getElementById("nav3");
       element.classList.add("active");
       </script>


   <!--JS/JQUERY INCLUDE-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </body>
</html>
