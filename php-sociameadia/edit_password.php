<?php
  session_start();
  include("header.php");
  include("db_connect.php");
?> 

<?php
 if(isset($_POST["save"])) {
   

    $user_id = $_SESSION["user_id"];
    $password = $_POST["password"];

        $sql = "update user set password='$password'
        where user_id='$user_id' ";
        //echo $sql;

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

$user_id = $_SESSION["user_id"];
$sql = "select * from user where user_id='$user_id' ";
//echo $sql;
$result = $mysqli->query($sql);    
$obj = $result->fetch_object();

?>
<div class="container-fluid"> <!-- container-fluid ขยายเต็มหน้าจอ -->
<div class="row">
    <div class="col-sm-12">
    <!-- Start content -->
    <h1>เปลี่ยนรหัสผ่าน</h1>

    <form method="post" enctype="multipart/form-data">
    

    <p>  
        <label>รหัสผ่าน</label>
        <input type="text" name="#" value="<?php if(isset($obj->password)) echo $obj->password; ?>" class="form-control" readonly>
    </p>

    <p>  
        <label>รหัสผ่านใหม่</label>
        <input type="password" name="password"  class="form-control" >
    </p>

    <p>              
        <button type="submit" name="save" class="btn btn-primary">บันทึก</button>
    </p>              
    </form>

    <!-- End content -->
    </div>
</div>
</div>  


<?php
  include("footer.php");
?>