<?php
  session_start();
  include("header.php");
  include("db_connect.php");
?>
<div class="container-fluid"> <!-- container-fluid ขยายเต็มหน้าจอ -->
    <div class="row">
        <div class="col-sm-12">
<?php
    echo "<h1>จัดการผู้ใช้</h1>";    

    $result = $mysqli->query("select * from user"); //SQL    

    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<thead>";
    echo "<th>รหัสผู้ใช้</th>";
    echo "<th>ชื่อผู้ใช้</th>";
    echo "<th>ชื่อ-สกุล</th>";
    echo "<th>สถานะ</th>";
    echo "<th>จัดการ</th>";
    echo "</thead>";

    echo "<tbody>";
    while($obj = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>".$obj->user_id."</td>";
        echo "<td>".$obj->user_name."</td>";
        echo "<td>".$obj->full_name."</td>";
        echo "<td>";
            if($obj->status=="0") {
                echo "ยังไม่อนุม้ติ";
            } else if($obj->status=="1") {
                echo "อนุม้ติ";
            } else if($obj->status=="2") {
                echo "ยกเลิก";
            } else {
                echo "ไม่รู้จัก";
            }
        echo "</td>";
        echo "<td>
            <a href='user_active.php?user_id=".$obj->user_id."' class='btn btn-info'>อนุมัติ</a> 
            <a href='user_unactive.php?user_id=".$obj->user_id."' class='btn btn-warning'>ยกเลิก</a>
            <a href='user_delete.php?user_id=".$obj->user_id."' class='btn btn-danger'>ลบ</a>
        </td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
?>
        </div>
    </div>
</div>  
<?php
  include("footer.php");
?>