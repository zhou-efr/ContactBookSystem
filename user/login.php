<?php
include "../sources/conn.php";

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '".md5($password)."'";
$result = mysqli_query($conn, $sql);

if ($row=mysqli_fetch_array($result)) {
    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['lastLogin'] = date("Y-m-d");

    $sql = "UPDATE users SET lastLogin = '".date("Y-m-d")."' WHERE id = ".$row['id'];
    mysqli_query($conn, $sql);

    if($row['role'] == 'admin'){
        echo('<script>alert("successfully logged as administrator");</script>');
    }else{
        echo('<script>alert("successfully login");</script>');
    }
    header("Location: ../index.php");
}
die('<script>alert("Failed to login.");location.href="../login.php";</script>');