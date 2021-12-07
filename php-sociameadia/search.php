<?php
  session_start();
  include("header.php");
  include("db_connect.php");
  include("config.php");
?> 

<div class="container">
    <p><a href ="index.php"class="btn btn-info">กลับไป</a></p>

    <h2> ค้นหาเพื่อน </h2>
    <from method ="post">
        <p>
            <input type = "text" name="keyword" class="form-control">
        </p>

        <p>
            <button type = "submit" name="search" class="btn btn-primary"> ค้นหา </button>
        </p>
</form>

    <?php
        if(isset($_POST["search"])){
            $keyword = $_POST[keyword];

            $sql ="select * form user where full_name like '%$keyword%' ";
            
            $result = $mysqli->query($sql);
            while ($obj = $result->fetch_object()) {
                echo "<div>".$obj->full_name."</div>";
            }
        }
    ?>

</div>


<?php
  include("footer.php");
?>