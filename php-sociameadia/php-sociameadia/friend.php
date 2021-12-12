<?php
    session_start();
	include("header.php");
	include("db_connect.php");
?>
<div class="container">
    <h2>เพื่อนทั้งหมด</h2>

    <h3>การขอเป็นเพื่อน</h3>
<?php
    $sql = "select * from user_be_friend 
    join user on (user_be_friend.friend_id=user.user_id)
    where user_be_friend.user_id='".$_SESSION["user_id"]."' 
    and user_be_friend.status = 'R' ";

    $result = $mysqli->query($sql);
    while($obj = $result->fetch_object()) {
        echo "<div class='card'>";
        echo "<div class='card-body'>".$obj->full_name."</div>";
        echo "</div>";
    }
?>
    <br>
    <h3>การยืนยันคำขอ</h3>
    <?php
    $sql = "select * from user_be_friend
    join user on (user_be_friend.user_id=user.user_id)
    where user_be_friend.friend_id='".$_SESSION["user_id"]."' 
    and user_be_friend.status = 'R' ";

    $result = $mysqli->query($sql);
    while($obj = $result->fetch_object()) {
        echo "<div class='card'>";
        echo "<div class='card-body'><p>".$obj->full_name."</p>
            <a href='request_confirm.php' class='btn btn-success'>ยืนยัน</a>
            <a href='request_delete.php' class='btn btn-danger'>ลบ</a>
        </div>";
        echo "</div>";
    }
?>    
</div>
<?php
	include("footer.php");
?>