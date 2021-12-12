<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
		<p><a href="index.php" class="btn btn-info">กลับไป</a></p>
        <h2>เปลี่ยนรหัสผ่าน</h2>
<?php
		if(isset($_POST["save"])) {  
			$user_id = $_SESSION["user_id"];
			$password = $_POST["password"];

			$sql = "update user set password='$password' where user_id='$user_id' ";
			//echo $sql;

			$result = $mysqli->query($sql);        

			if($result) {
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
		<form method="post">
            <p>
				<label>รหัสผ่าน</label>
				<input type="password" name="password" class="form-control" value="">
			</p>
			<p class="text-right">
				<button type="submit" name="save" class="btn btn-info">บันทึก</button>
			</p>
		</form>
</div>
<?php
	include("footer.php");
?>