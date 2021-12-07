<?php
    session_start();
    include("header.php");
    include("db_connect.php");
    include("config.php");

?>
    <?php
    if(isset($_POST["save"])) {
        $message_id = $_GET["message_id"];
        $message_body = $_POST["message_body"];

        $sql = "update message set message_body='$message_body'
            where message_id='$message_id'
        ";

        $result = $mysqli->query($sql);

        if($result) {
            echo "<div class='alert alert-success'>บันทึกเสร็จสิ้น</div>";
            echo "<div class='spinner-border'></div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php'>";
        } else {
            echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
            echo "<div>$sql</div>";
        }
    }

    $message_id = $_GET["message_id"];
    $sql = "select * from message where message_id='$message_id'";
    //echo $sql;
    $result = $mysqli->query($sql);
    $obj = $result->fetch_object();
?>

<div class="container"> <!-- container-fluid ขยายเต็มหน้าจอ -->
    <!-- Start content -->
   

    <h2>แก้ไขข้อความ</h2>

    <form method="post">
    <p>              
        <textarea name="message_body" class="form-control" rows="5"><?php echo $obj->message_body; ?></textarea>
    </p>  
    <p>              
        <button type="submit" name="save" class="btn btn-primary">บันทึก</button>
        <a href="index.php" class="btn btn-danger">ยกเลิก</a>
    </p> 
    <p>
        
    </p>
    </form>
    <!-- End content -->
</div>  
<?php
  include("footer.php");
?>