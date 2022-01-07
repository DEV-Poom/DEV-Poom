<?php
    include("connect.php");
    include("config.php");
    session_start();
?>
<?php
    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "select * from user 
        where username='$username'
        and password='$password'
        and status='1'
        ";

        $result = $mysqli->query($sql);

        if($result->num_rows > 0) {
            $obj = $result->fetch_object();

            $_SESSION["username"] = $obj->username;
            $_SESSION["password"] = $obj->password;
            $_SESSION["fullname"] = $obj->fullname;
            $_SESSION["login"] = true;

            if($obj->username=="admin") {
                $_SESSION["admin"] = true;

                echo "<script> alert('เข้าสู่ระบบสำเร็จ')</script>";
                header('refresh:1; url=admin/index.php');
            }else {
                echo "<script> alert('เข้าสู่ระบบสำเร็จ')</script>";
                header('refresh:1; url=index_form.php');
            }
            exit();
        } else {
                echo "<script> alert('เข้าสู่ระบบล้มเหลว')</script>";
                header('refresh:1; url=login_form.php');
        }
    }
?>