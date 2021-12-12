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
    // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");    
    $mysqli = new mysqli("localhost", "root", "") or die("Cannot connect database.");
    $mysqli->select_db("socialmedia") or die("Cannot select database.");
    if(!$mysqli) echo "Cannot Connect Database!!<br>";

    if(isset($_POST["save"])) {
        $user_id = $_GET["user_id"];

        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
        $full_name = $_POST["full_name"];

        $sql = "update user set user_name='$user_name', full_name='$full_name', password='$password' 
            where user_id='$user_id'
        ";

        $result = $mysqli->query($sql);  

        if($result) {
            echo "<div class='alert alert-success'>บันทึกเสร็จสิ้น</div>";
        } else {
            echo "<div class='alert alert-danger'>บันทึกข้อมูลล้มเหลว</div>";
            echo "<div>$sql</div>";
        }
    }

    $user_id = $_GET["user_id"];
    $sql = "select * from user where user_id='$user_id' ";
    //echo $sql;
    $result = $mysqli->query($sql);
    $obj = $result->fetch_object();
    
?>
<div class="container-fluid"> <!-- container-fluid ขยายเต็มหน้าจอ -->
    <div class="row">
        <div class="col-sm-12">
        <!-- Start content -->
        <p><a href="list.php" class="btn btn-info">กลับไป</a></p>

        <h1>แก้ไขผู้ใช้</h1>

        <form method="post">
        <p>  
            <label>ชื่อผู้ใช้</label>
            <input type="text" name="user_name" value="<?php if(isset($obj->user_name)) echo $obj->user_name; ?>" class="form-control" readonly>
        </p>
        <p>  
            <label>ชื่อ-สกุล</label>
            <input type="text" name="full_name" value="<?php if(isset($obj->full_name)) echo $obj->full_name; ?>" class="form-control">
        </p>
        <p>  
            <label>รหัสผ่าน</label>
            <input type="text" name="password" value="<?php if(isset($obj->password)) echo $obj->password; ?>" class="form-control">
        </p>   
        <p>              
            <button type="submit" name="save" class="btn btn-primary">บันทึก</button>
        </p>              
        </form>

        <!-- End content -->
        </div>
    </div>
</div>  
</body>
</html>
