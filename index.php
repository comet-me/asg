<?php include "includes/header.php"; ?>
<div class="login">
    <p>
        <a href="admin/index.php">Click here to login</a>
    </p>
</div>
<div class="index__container">
        <h3 class="text-secondary">Welcome Buddy</h3>
        <p>We don't have data yet, so let's create database first.</p>
        <p class="lead">Click here <i class="fa fa-arrow-down" aria-hidden="true"></i></p>
        <form action="index.php" method="post">
            <input type="submit" class="index_submit" value="Create database" name="submiT">
        </form>
    </div>
    <?php
            if(isset($_POST['submiT'])){
                // Drop database
                $con = new mysqli('localhost','root','')or die($con->error);
                $sqldrop = "DROP DATABASE crud";
                if ($con->query($sqldrop) === TRUE){
                    echo "silent drop";
                }
                // Create database
                $con = new mysqli('localhost','root','')or die($con->error);
                $sql = "CREATE DATABASE crud";
                //create table
                $table = "CREATE TABLE tdata ";
                $table .= "( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL,";
                $table .= " lastname VARCHAR(30) NOT NULL ) ";
                if ($con->query($sql) === TRUE){
                    $con = new mysqli('localhost','root','','crud')or die($con->error);
                    $con->query($table);
                } else {
                echo "Error creating database: " . $con->error;
                }
                $con->close();
                // echo "<script>window.location.href='create.php';</script>";
                header("Location:create.php?status=welcome");
            }
        ?>
    <div class="index spacer"></div>
<?php include "includes/footer.php"; ?>