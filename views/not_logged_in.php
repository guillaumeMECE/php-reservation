<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>
<div class="mx-auto m-5 w-50 bg-light">
<!-- login form box -->
<form method="post" class="m-5" action="index.php" name="loginform">

    <label for="login_input_username">Username</label>
    <input id="login_input_username" class="login_input form-control" type="text" name="user_name" required />

    <label for="login_input_password">Password</label>
    <input id="login_input_password" class="login_input form-control" type="password" name="user_password" autocomplete="off" required />

    <input type="submit" class="btn btn-primary mt-2" name="login" value="Log in" />

</form>

<a href="register.php">Register new account</a>
</div>
