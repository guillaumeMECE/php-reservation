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
      include("navbar.php"); ?>

   <div class="bg-light p-3 m-3">
      <h1>Desk 1</h1>
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
      </table>
   </div>


<!--JS/JQUERY INCLUDE-->
<script type="text/javascript" src="classes\manage_reservation.js"></script>
</body>

</html>
