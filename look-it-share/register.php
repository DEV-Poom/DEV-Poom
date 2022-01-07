<?php
    include("connect.php");
    session_start();
?>
<?php
    if(isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $fullname = $_POST["fullname"];

        $sql = "insert into user (username, password, fullname, status) 
        value ('$username', '$password', '$fullname', '1');
        ";

        $result = $mysqli->query($sql);

        if($result) {
            echo '<script> alert("บันทึกเสร็จสิ้น")</script>';
            header('Refresh:1; url=login_form.php');
        } else{
            echo '<script> alert("บันทึกล้มเหลว")</script>';
            header('Refresh:1; url=register_form.php');
        }
    }
?>