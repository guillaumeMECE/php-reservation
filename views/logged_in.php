<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.
<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<a href="index.php?logout">Logout</a>

<!--User Card-->
<div class="card m-5 mx-auto" style="width: 18rem;">
   <img class="card-img-top" src="<?php echo $_SESSION['user_img'];?>" alt="User img path must be wrong">
   <!--img class="card-img-top" src="res/user-img.jpg" alt="Card image user"
echo '<img src="img.png?t='.time().'">';
-->

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

// FIXME: Change img

function display()
{
	//ini_set('memory_limit', '100M');

	// create a database connection
	// $db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// $img_path = $_POST["path"];
	// Create connection

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// Check connection

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	extract($_POST);
	/* $sql = "UPDATE users SET user_img = '".$img_path."' WHERE user_name='".$_SESSION['user_name']."'";
	if ($conn->query($sql) === true) {
	$_SESSION['user_img']=$img_path;
	echo "Your picture change successfully";
	} else {
	echo "Error updating path: " . $conn->error;
	}

	*/
	$UploadedFileName = $_FILES['path']['name'];
	if ($UploadedFileName != '') {
		$upload_directory = "res/"; //This is the folder which img will be stored

		// $TargetPath=time().$UploadedFileName;$_SESSION['user_name']
		// $TargetPath=$_SESSION['user_name'].$UploadedFileName;
		// $TargetPath=time().$_SESSION['user_name'];

		$TargetPath = $_SESSION['user_name'].".jpg";
		echo $upload_directory.$TargetPath;
		$temp_file = $_FILES['path']['tmp_name'];
	//	if (is_uploaded_file($temp_file)) {
			$max_size = 4000000;
			$size = filesize($temp_file);
			echo "size : " . $size . " ";
			if ($size < $max_size) {
				if (move_uploaded_file($_FILES['path']['tmp_name'], $upload_directory.$TargetPath)) {
					$sql = "UPDATE users SET user_img = '" . $upload_directory.$TargetPath . "' WHERE user_name='" . $_SESSION['user_name'] . "'";

					// $QueryInsertFile="INSERT INTO users SET user_img = '".$TargetPath."' WHERE user_name='".$_SESSION['user_name']."'";
					// Write Mysql Query Here to insert this $QueryInsertFile   .

					if ($conn->query($sql) === true) {
						$_SESSION['user_img'] = $upload_directory.$TargetPath;
						$_POST['submit'] = null;
						header("Refresh:0");
						//echo "Your picture change successfully";
					}
					else {
						echo "Error updating path: ".$conn->error;
					}
				}
				else {
				//	$_POST['submit'] = null;
					echo "Error move upload";
				}
			}
		//}
		else {
			echo "Error move upload : Your picture is too Big";
		}

		$conn->close();

		// change character set to utf8 and check it

		/*if (!$this->db_connection->set_charset("utf8")) {
		$this->errors[] = $this->db_connection->error;
		}*/

		// if no connection errors (= working database connection)

		/*if (!$db_connection->connect_errno) {
		echo "path : ".$_POST["path"];
		$img_path = $_POST["path"];

		// write new user's data into database

		$sql = "UPDATE users SET user_img = ".$img_path." WHERE user_name=".$_SESSION['user_name'];
		$query_new_user_img = $db_connection->query($sql);

		// if path has been changed successfully

		if ($query_new_user_img) {
		echo "Your picture change successfully" ;
		}
		}*/

		// $sql = "UPDATE users SET user_img=$img_path WHERE user_name=$_SESSION['user_name']";

	}
}

if (isset($_POST['submit'])) {
	display();
}

?>
