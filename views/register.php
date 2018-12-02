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
            echo $message;
        }
    }
}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="center-block m-5 w-50 bg-light">
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


   <!-- backlink -->
   <a href="index.php">Back to Login Page</a>
</div>
