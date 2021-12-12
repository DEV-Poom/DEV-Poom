<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
<?php
$friend_id = $_GET["user_id"];

$sql = "insert into user_be_friend (user_id, friend_id, status)
    value ('".$_SESSION["user_id"]."', '$friend_id', 'R')
";

$result = $mysqli->query($sql);

if($result) {
    echo "<div class='alert alert-success'>ส่งคำขอเป็นเพื่อนแล้ว</div>";
    header("refresh:2; url=friend.php");
} else {
    echo "<div class='alert alert-danger'>ส่งคำขอเป็นเพื่อนล้มเหลว</div>";
    header("refresh:2; url=friend.php");
}

?>
</div>
<?php
	include("footer.php");
?>