<? php
    function check_row($IdOfRow){ //function to reserve a desk

      // include the configs / constants for the database connection
      require_once("../config/db.php");
      //echo "hey this is working";
      // Create connection
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      // sql query
      $sql = "SELECT desk_status
              FROM desk
              WHERE desk_id = '" . $IdOfRow . "';";
      $result = mysqli_query($conn, $sql); // send the query
      $row = mysqli_fetch_assoc($result); // fetch key with values
      if (mysqli_num_rows($result) > 0) {
         if($row["desk_status"]=="AVAIL"){ // if status is available so reserve the desk
            // TODO: add session username and pics
            $sql_user_info = "UPDATE desk
                    SET user_id=$_SESSION['user_id']
                    WHERE desk_id = '" . $IdOfRow . "';"; //reservation for the user who is connected
            $result_user_info = mysqli_query($conn, $sql_user_info);
            $row_user_info = mysqli_fetch_assoc($result_user_info);
            if (mysqli_num_rows($result_user_info) > 0) {
               header("Refresh:0"); //refresh the page
               return true;
            }
         }
      }else{
         // TODO: add error message like it's already reserved
         alert("You cann't");
      }
        //return $data+1;
        mysqli_close($conn);
    }
    // TODO: can't lunch check_row
    if (isset($_POST['IdOfRow'])) {
      check_row($_POST['IdOfRow']);
   }else{
      echo "FAILED";
   }

?>
