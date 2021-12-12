<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
		<p><a href="index.php" class="btn btn-info">กลับไป</a></p>
<?php
		if(isset($_POST["save"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file_photo"]["name"]);
            // $target_file = "uploads/doraemon.jpg";

            if (move_uploaded_file($_FILES["file_photo"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($_FILES["file_photo"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }

			$user_id = $_SESSION["user_id"];
			$full_name = $_POST["full_name"];

			$photo_name = basename($_FILES["file_photo"]["name"]);

			$sql = "update user set full_name='$full_name', file_photo='$photo_name'
				where user_id='$user_id' ";
			//echo $sql;

			$result = $mysqli->query($sql);        

			if($result) {
				$_SESSION["file_photo"] = $photo_name;

				echo "<div class='alert alert-success'>บันทึกเสร็จสิ้น</div>";
			} else {
				echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
				echo "<div>$sql</div>";
			}
		} 

        $user_id = $_SESSION["user_id"];
        $sql = "select * from user where user_id='$user_id' ";
        $result = $mysqli->query($sql);
        $obj = $result->fetch_object();
?>
		<form method="post" enctype="multipart/form-data">
            <p>
                <label>รูปประจำตัว</label><br>
                <input type="file" name="file_photo"><br>
				<?php
				if(isset($obj->file_photo)) {
					echo "<img src='uploads/".$obj->file_photo."' height='250'>";
				}
				?>
            </p>
            <p>
				<label>ชื่อผู้ใช้</label>
				<input type="text" name="user_name" class="form-control" value="<?php if(isset($obj->user_name)) echo $obj->user_name; ?>" readonly>
			</p>            
            <p>
				<label>ชื่อ - สกุล</label>
				<input type="text" name="full_name" class="form-control" value="<?php if(isset($obj->full_name)) echo $obj->full_name; ?>">
			</p>
			<p class="text-right">
				<button type="submit" name="save" class="btn btn-info">บันทึก</button>
			</p>
		</form>
</div>
<?php
	include("footer.php");
?>