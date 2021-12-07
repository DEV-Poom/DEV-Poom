<?php
    session_start();
    include("header.php");
    include("db_connect.php");
?>

<div class="container">
<?php
     session_destroy();

     echo "<p class = 'alert alert-info'> กำลังออกจากระบบ </p>";
     echo "<div class='spinner-border'></div>";
     echo "<meta http-equiv='refresh' content='2;url=login.php'>";
?>
</div>

<?php
    include("footer.php");
?>