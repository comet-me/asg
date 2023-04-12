<?php
    session_start(); // I use session and I store it in the variable for notification purposes
    $connection=new mysqli('localhost','root','','crud') or die ($connection->error);
    $name=$surname="";
    $update=true;
    if(isset($_POST['save'])){
        if(empty($_POST['firstname'])){
            // $_SESSION['msg']="Fill out an empty field";
            // $_SESSION['alert']="alert alert-warning";
            header("Location:create.php");
        }else{
            $name=$_POST['firstname'];
        }
        if(empty($_POST['lastname'])){
            // $_SESSION['msg']="Fill out an empty field";
            // $_SESSION['alert']="alert alert-warning";
            header("Location:create.php");
            }else{
            $surname=$_POST['lastname'];
        }
        if(!empty($_POST['firstname']) && !empty($_POST['lastname'])){
            $name=$_POST['firstname'];
            $surname=$_POST['lastname'];
            $result=$connection->query("INSERT INTO tdata(firstname,lastname) values ('$name','$surname')") or die($connection->error);
            $_SESSION['msg']="Record has been added successfully.";
            $_SESSION['alert']="alert alert-success";
            header("Location:create.php");
        } 
    }

if(isset($_GET['edit'])){
    $update=false;
    $id=$_GET['edit'];
    $result=$connection->query("SELECT * FROM tdata WHERE id=$id")
    or die($connection->error);
    $row=$result->fetch_assoc();
    $id=$row['id'];
    $name=$row['firstname'];
    $surname=$row['lastname'];
}


if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $result=$connection->query("DELETE FROM tdata WHERE id=$id")
    or die($connection->error);
    $_SESSION['msg']="Record has been deleted successfully.";
    $_SESSION['alert']="alert alert-danger";
    header("Location:create.php");
}



if(isset($_POST['update'])){
    // if(empty($_POST['firstname'])){
    // $_SESSION['msg']="name and password should not be empty";
    // $_SESSION['alert']="alert alert-warning";
    // header("Location:create.php");
    // }else{
        // $name=$_POST['firstname'];
    // }
    // if(empty($_POST['surname'])){
        // $_SESSION['msg']="name and password should not be empty";
        // $_SESSION['alert']="alert alert-warning";
        // header("Location:create.php");
        // }else{
            // $surname=$_POST['surname'];
    // }
    // if(!empty($_POST['firstname']) && !empty($_POST['surname'])){
        $id=$_POST['id'];
        $name=$_POST['firstname'];
        $surname=$_POST['lastname'];
        $result=$connection->query("UPDATE tdata SET firstname='$name', lastname='$surname'
        WHERE id=$id")
        or die($connection->error);
        $_SESSION['msg']="Record has been updated successfully.";
        $_SESSION['alert']="alert alert-success";
        header("Location:create.php");
    // } 
}
