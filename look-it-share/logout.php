<?php
    session_start();
    include("connect.php");
?>

<div class="container">
<?php
     session_destroy();

     echo "<p class = 'alert alert-info'> กำลังออกจากระบบ </p>";
     echo "<div class='spinner-border'></div>";
     echo "<meta http-equiv='refresh' content='2;url=login_form.php'>";
?>
</div>

<?php
    include("footer.php");
?>