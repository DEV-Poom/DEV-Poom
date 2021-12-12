<?php
    session_start();
    include("header.php");
    include("db_connect.php");
?>
<div class="container">
<?php
    session_destroy();
    echo "<p class='alert alert-info'>กำลังออกจากระบบ</p>";
    header("refresh:2; url=../login.php");
    //echo "<meta http-equiv='refresh' content='2;url=index.php'>";
?>
</div>  
<?php
  include("footer.php");
?>