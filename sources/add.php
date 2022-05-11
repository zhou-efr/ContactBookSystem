<?php
if (preg_match('/^$|[a-zA-Z\d\s]{1,100}$/', $_POST['name'])) {
    $name = $_POST['name'] | " ";
}else{
    die('<script>alert("invalid name");location.href="../index.php";</script>');
}
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) or $_POST['email'] == '') {
    $email = $_POST['email'] | " ";
}else{
    die('<script>alert("invalid email");location.href="../index.php";</script>');
}
if (preg_match('/^$|[0-9\+\s]{1,20}$/', $_POST['phoneNumber'])) {
    $phone = $_POST['phoneNumber'] | " ";
}else{
    die('<script>alert("invalid phone number");location.href="../index.php";</script>');
}
if (preg_match("/^$|[a-zA-Z0-9\,\-\'\s]{1,100}$/", $_POST['address'])) {
    $address = $_POST['address'] | " ";
}else{
    die('<script>alert("invalid address");location.href="../index.php";</script>');
}
if (preg_match('/^$|\d{4}-\d{2}-\d{2}$/', $_POST['birthday'])) {
    $birthday = $_POST['birthday'] | "1990-01-01";
}else{
    echo $_POST['birthday'];
}
if (preg_match('/^$|[a-zA-Z]{1,10}$/', $_POST['gender'])) {
    $gender = $_POST['gender'] | " ";
}else{
    die('<script>alert("invalid request");location.href="../index.php";</script>');
}
if (preg_match('/^[a-zA-Z]{1,10}$/', $_POST['relationship']) && strtolower($_POST['relationship']) != "please select") {
    $relationship = $_POST['relationship'] | " ";
}else{
    die('<script>alert("invalid relationship");location.href="../index.php";</script>');
}

include "conn.php";

$sql = 'insert into contacts (username, phoneNumber, email, address, gender, relationship, dateOfBirth) VALUES ('.
    "'$name', '$phone', '$email', '$address', '$gender', '$relationship', '$birthday');";

mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) <= 0){
    die('<script>alert("error");location.href="../index.php";</script>');
}
echo('<script>alert("success");</script>');
header("Location: ../index.php");
?>