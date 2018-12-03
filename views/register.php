
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="center-block mx-auto m-5 w-50 bg-light">
   <!-- register form -->
   <form method="post" class="m-5" action="register.php" name="registerform">

       <!-- the user name input field uses a HTML5 pattern check -->
       <div class="form-group">
       <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
       <input id="login_input_username" class="login_input form-control w-75" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
   </div>
       <!-- the email input field uses a HTML5 email type check -->
       <div class="form-group">
       <label for="login_input_email">User's email</label>
       <input id="login_input_email" class="login_input form-control w-75" type="email" name="user_email" required />
   </div>
   <div class="form-group">
       <label for="login_input_password_new">Password (min. 6 characters)</label>
       <input id="login_input_password_new" class="login_input form-control w-75" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
   </div>
   <div class="form-group">
       <label for="login_input_password_repeat">Repeat password</label>
       <input id="login_input_password_repeat" class="login_input form-control w-75" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
       <input type="submit" class="btn btn-primary mt-2" name="register" value="Register" />
   </div>
   </form>
   <?php
   // show potential errors / feedback (from registration object)
   if (isset($registration)) {
       if ($registration->errors) {
           foreach ($registration->errors as $error) {
               echo $error;
           }
       }
       if ($registration->messages) {
           foreach ($registration->messages as $message) {
               //echo $message;
               echo "<div class=\"alert alert-success w-75 mx-auto \" role=\"alert\">
               Your Account as been created successfully !
                  </div>" ;
               $delay = 2;
               $url='index.php';
               header("Refresh: $delay;url=$url");
           }
       }
   }
   ?>

   <!-- backlink -->
   <a href="index.php">Back to Login Page</a>
</div>

<!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script-->
