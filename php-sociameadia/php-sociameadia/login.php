<?php
    session_start();
    include("db_connect.php");
    include("config.php");
?>
<html>
<head>
    <title>Social Media</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    if(isset($_POST["login"])) {
            // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");    
        
        if(!$mysqli) echo "Cannot Connect Database!!<br>";        

        $user_name = $_POST["user_name"];
        $password = $_POST["password"];

        $sql = "select * from user where user_name='$user_name' and password='$password' and status ='1'";
        //echo $sql;
        $result = $mysqli->query($sql);
        //echo "num row: ".$result->num_rows."<br>";
        if($result->num_rows > 0) {
            $obj = $result->fetch_object();
            
            $_SESSION["user_id"] = $obj->user_id;
            $_SESSION["user_name"] = $obj->user_name;
            $_SESSION["full_name"] = $obj->full_name;
            $_SESSION["file_photo"] = $obj->file_photo;
            $_SESSION["login"] = true;

            if($obj->user_name=="admin") {
                $_SESSION["admin"] = true;
                echo "<div class='alert alert-success'>การยืนยันตัวตนถูกต้อง</div>";
                echo "<div class='spinner-border'></div>";
                echo "<meta http-equiv='refresh' content='2;url=admin/index.php'>";
            }else{

            echo "<div class='alert alert-success'>การยืนยันตัวตนถูกต้อง</div>";
            echo "<div class='spinner-border'></div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php'>";
            
           } exit();
        } else {
            if($status==0) {
                echo "<div class='alert alert-danger'>ชื่อผู้ใช้นี้ยังไม่ได้รับการอนุมัติ</div>";
            } else if($status==2) {
                echo "<div class='alert alert-danger'>ชื่อผู้ใช้นี้ถูกยกเลิก</div>";
            } else {
                echo "<div class='alert alert-danger'>การยืนยันตัวตนไม่ถูกต้อง</div>";
            }
        }
    }
?>
<div class="container"> <!-- container-fluid ขยายเต็มหน้าจอ -->
    <div class="row">
        <div class="col-sm-12">
        <!-- Start content -->
            <h1>Login</h1>

            <form method="post">
            <p>  
                <label>ชื่อผู้ใช้</label>
                <input type="text" name="user_name" class="form-control">
            </p>
            <p>  
                <label>รหัสผ่าน</label>
                <input type="password" name="password" class="form-control">
            </p>   
            <p>
                <button type="submit" name="login" class="btn btn-primary">เข้าสู่ระบบ</button>  <a href="register.php" class='btn btn-info'>ลงทะเบียนใหม่</a> 
            </p>              
           
            
            
         </form>
        <!-- End content -->
        </div>
    </div>
</div>  
</body>
</html>