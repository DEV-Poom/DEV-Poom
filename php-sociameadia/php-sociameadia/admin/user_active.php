<?php
  session_start();
  include("header.php");
  include("db_connect.php");
?>
<div class="container-fluid"> 
<?php
    // $_SESSION, $_POST, $_GET, $_FILES
    $user_id = $_GET["user_id"];
    // insert, update, select, delete
    $sql = "update user set status='1' where user_id='$user_id' ";
    $result = $mysqli->query($sql);

    if($result) {
        echo "<div class='alert alert-success'>อนุมัติผู้ใช้เรียบร้อยแล้ว</div>";
        header("refresh:2; url=user_list.php");
    } else {
        echo "<div class='alert alert-danger'>อนุมัตผู้ใช้ล้มเหลว</div>";
        header("refresh:2; url=user_list.php");
    }

?>  
</div>  
<?php
  include("footer.php");
?>