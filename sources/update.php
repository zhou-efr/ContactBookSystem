<?php
// TODO : check if the values have changed
$id = intval($_GET['id']) or die('<script>alert("invalid id");window.history.go(-1);</script>');
$name = preg_match('/^[a-zA-Z0-9\s]{1,100}$/', $_POST['name']) ? $_POST['name'] : '<error>';
if ($name == '<error>') {
    echo '<script>alert("Invalid name");</script>';
    header("Location: ../index.php");
}
$email = preg_match('/^[a-zA-Z0-9\-\@a-zA-Z0-9\.a-zA-Z0-9]{1,100}$/', $_POST['email']) ? $_POST['email'] : '<error>';
if ($email == '<error>') {
    echo '<script>alert("Invalid email");</script>';
    header("Location: ../index.php");
}
$phone = preg_match('/^[0-9\+\s]{1,20}$/', $_POST['phoneNumber']) ? $_POST['phoneNumber'] : '<error>';
if ($phone == '<error>') {
    echo '<script>alert("Invalid phone");</script>';
    header("Location: ../index.php");
}
$address = preg_match("/^[a-zA-Z0-9\,\-\'\s]{1,100}$/", $_POST['address']) ? $_POST['address'] : '<error>';
if ($address == '<error>') {
    echo '<script>alert("Invalid address");</script>';
    header("Location: ../index.php");
}
$birthday = preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $_POST['birthday']) ? $_POST['birthday'] : '<error>';
if ($birthday == '<error>') {
    echo '<script>alert("Invalid birthday");</script>';
    header("Location: ../index.php");
}
$gender = preg_match('/^[a-zA-Z]{1,10}$/', $_POST['gender']) ? $_POST['gender'] : '<error>';
if ($birthday == '<error>') {
    echo '<script>alert("Invalid request");</script>';
    header("Location: ../index.php");
}
$relationship = preg_match('/^[a-zA-Z]{1,10}$/', $_POST['relationship']) ? $_POST['relationship'] : '<error>';
if ($birthday == '<error>') {
    echo '<script>alert("Invalid request");</script>';
    header("Location: ../index.php");
}

////display values
//echo $id.'<br/>';
//echo $name.'<br/>';
//echo $email.'<br/>';
//echo $phone.'<br/>';
//echo $address.'<br/>';
//echo $birthday.'<br/>';
//echo $gender.'<br/>';
//echo $relationship.'<br/>';

include "conn.php";

$sql = "update contacts set ".
    "username='$name', ".
    "phoneNumber='$phone', ".
    "email='$email', ".
    "address='$address', ".
    "gender='$gender', ".
    "relationship='$relationship', ".
    "dateOfBirth='$birthday' ".
    "where id=$id;";

//echo $sql;
mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) <= 0){
    die('<script>alert("edit error");location.href="../index.php";</script>');
}
echo('<script>alert("edit success");window.history.go(-1);</script>');
header("Location: ../index.php");
?>