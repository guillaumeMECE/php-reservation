
Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.

<a href="index.php?logout">Logout</a>

<!--User Card-->
<div class="card m-5 mx-auto shadow" style="width: 18rem;">
   <img class="card-img-top" src="<?php echo $_SESSION['user_img'];?>" alt="User img path must be wrong">


   <div class="card-body" id="card-container">
      <h5 class="card-title"><?php if (isset($_SESSION['user_name'])) {
    echo $_SESSION['user_name'];
} else {
    echo "user";
}  ?></h5>
      <p class="card-subtitle mb-2 text-muted"><?php if (isset($_SESSION['user_email'])) {
    echo $_SESSION['user_email'];
} else {
    echo "email";
} ?></p>
      <a href="#" id="changePath"class="card-link">Change user image</a>
   </div>
</div>

<?php


function display()
{
    // Create connection

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    extract($_POST);

    $UploadedFileName = $_FILES['path']['name'];
    if ($UploadedFileName != '') {
        $upload_directory = "res/"; //This is the folder which img will be stored

        $filename=$_SESSION['user_img'];
        if (file_exists($filename)) {
            if ($filename != "res/user-img.jpg") {
                unlink($filename);
            }
        }
        $TargetPath = time().$_SESSION['user_name'].".jpg";
        echo $upload_directory.$TargetPath;
        $temp_file = $_FILES['path']['tmp_name'];
        $max_size = 4000000;
        $size = filesize($temp_file);
        echo "size : " . $size . " ";
        if ($size < $max_size) {
            if (move_uploaded_file($_FILES['path']['tmp_name'], $upload_directory.$TargetPath)) {
                $sql = "UPDATE users SET user_img = '" . $upload_directory.$TargetPath . "' WHERE user_name='" . $_SESSION['user_name'] . "'";

                if ($conn->query($sql) === true) {
                    $_SESSION['user_img'] = $upload_directory.$TargetPath;
                    $_POST['submit'] = null;
                    header("Refresh:0");
                } else {
                    echo "Error updating path: ".$conn->error;
                }
            } else {
                echo "Error move upload";
            }
        } else {
            echo "Error move upload : Your picture is too Big";
        }

        $conn->close();
    }
}

if (isset($_POST['submit'])) {
    display();
}

?>
