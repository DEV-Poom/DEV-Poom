<?php
    session_start();
    include("header.php");
    include("db_connect.php");
    include("config.php");
?>
<div class="container">
<?php
    if(isset($_POST["save"])) {            
        $message_body = $_POST["message_body"];

        $sql = "insert into message (message_body, message_datetime, user_id)
        value ('$message_body','".date("d-m-Y H:i:s")."','".$_SESSION["user_id"]."')";


        $result = $mysqli->query($sql);

        if($result) {
            echo "<div class='alert alert-success'>บันทึกเสร็จสิ้น</div>";
            echo "<div class='spinner-border'></div>";
            echo "<meta http-equiv='refresh'  content='2;url=index.php'>";
        } else {
            echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
            echo "<div>$sql</div>";
        }
    }
?>


    <!-- Start content -->
    <h2>เพิ่มข้อความ</h2>

    <form method="post">
                <p>
                    <label>ข้อความ : </label>
                    <textarea name="message_body" class="form-control" rows="5"></textarea>
                </p>
                <p>
                    <button type="submit" name="save" class="btn btn-success">บันทึก</button>
                    <a href="index.php" class="btn btn-danger">ยกเลิก</a>
                    
                </p>
                </form>
    <!-- End content -->
</div>  
<?php
  include("footer.php");
?>