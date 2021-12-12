<?php
  session_start();
  include("header.php");
  include("db_connect.php");
?> 

<div class="container">
<?php
  echo "<h1>Hello Social Media</h1><br>";
  
  if(isset($_SESSION["file_photo"])) {
    echo "<img src='uploads/".$_SESSION["file_photo"]."' height='250'>";
  }
  
  echo "<p>สวัสดีคุณ ";
  echo $_SESSION["full_name"]."</p><br>";    
?>
  <br>
  <p>
    <a href="user_list.php" class="btn btn-primary">จัดการผู้ใช้</a>
  </p>
<?php
  $sql = "select * from message
      join user on (message.user_id=user.user_id)
      order by message_id desc
    ";
  $result = $mysqli->query($sql);
  while ($obj = $result->fetch_object()) {
    echo "<div class=\"card\">";
    echo "<div class=\"card-body\"><div>".$obj->message_datetime." : ".$obj->user_name."</div><p>".$obj->message_body."</p>";
    echo "<div class='text-right'>
      <a href='delete_post.php?message_id=".$obj->message_id."' class='btn btn-danger'>ลบ</a>
      </div>";
    echo "</div>";
    echo "</div>"; 
    echo "<br>";   
  }
?>
</div>
<?php
  include("footer.php");
?>