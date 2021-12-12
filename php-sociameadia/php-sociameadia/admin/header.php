<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if(isset($_SESSION["login"])==false) {
        echo "<meta http-equiv='refresh' content='2;url=login.php'>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#eeeeee">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">mySocialAdmin</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      
    </li>
    
    <!-- Dropdown -->
    
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php echo $_SESSION["user_name"]; ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="edit_profile.php">แก้ไขข้อมูลส่วนตัว</a>
        <a class="dropdown-item" href="change_password.php">เปลี่ยนรหัสผ่าน</a>
        <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
      </div>
    </li>
  </ul>
</nav>
<br>
