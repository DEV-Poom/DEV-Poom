<?php
  session_start();
  include("connect.php");
?> 

<?php
  

    if(isset($_POST["save"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file_photo"]["name"]);
        // $target_file = "uploads/doraemon.jpg";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          if (move_uploaded_file($_FILES["file_photo"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["file_photo"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        } 

        $user_id = $_SESSION["user_id"];
		$fullname = $_POST["fullname"];

        $photo_name =basename($_FILES["file_photo"]["name"]);

			$sql = "update user set full_name='$fullname' ,file_photo ='$photo_name' 
            where user_id='$user_id' ";
			//echo $sql;

			$result = $mysqli->query($sql);        

        if($result) {
            echo "<div class='alert alert-success'>บันทึกเสร็จสิ้น</div>";
            echo "<div class='spinner-border'></div>";
            echo "<meta http-equiv='refresh' content='2;url=index_form.php'>";
        } else {
            echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
            echo "<div>$sql</div>";
        }
    }

    $user_id = $_SESSION["user_id"];
    $sql = "select * from user where user_id='$user_id' ";
    //echo $sql;
    $result = $mysqli->query($sql);    
    $obj = $result->fetch_object();
    
?>

