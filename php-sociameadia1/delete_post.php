
<?php
    session_start();
    //include("config.php");
    include("header.php");
    include("db_connect.php");
?>

<?php
    if(isset($_GET["message_id"])) {
        $message_id = $_GET["message_id"];

        $sql = "delete from message where message_id='$message_id'";

        $result = $mysqli->query($sql);

        if($result) {
            echo "<div class='alert alert-success'>ลบข้อมูลเสร็จสิ้น</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php'>";
        } else {
            echo "<div class='alert alert-danger'>ลบข้อมูลล้มเหลว</div>";
            echo "<div>$sql</div>";
           
        }
        
    }
?>
</div>
<?php
  include("footer.php");
?>
