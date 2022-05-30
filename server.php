<?php

if(!isset($_SESSION)){
  session_start();  
}

$error=array();
$db=mysqli_connect('localhost','root','','ecommerce');


if(isset($_POST['signup'])){
    $username = mysqli_real_escape_string($db , $_POST['username']);
    $email = mysqli_real_escape_string($db , $_POST['email']);
    $password = mysqli_real_escape_string($db , $_POST['password']);
    $password2 = mysqli_real_escape_string($db , $_POST['password2']);
if(empty($username)) {
    array_push($error , "Username is Required!");
}
if(empty($email)) {
    array_push($error , "Email is Required!");
}
if(empty($password)) {
    array_push($error , "Password is Required!");
}
if(empty($password2)) {
    array_push($error , "Confirm Password is Required!");
}
if($password != $password2) {
    array_push($error , "Password Do Not Match!");
}

if(count($error) == 0) {
    $sql = "INSERT INTO user (username , email , password) VALUES ('$username' , '$email' , '$password')";

    mysqli_query($db , $sql);
    header("location:login.php");
}

}
if(isset($_POST['signin'])) {
    $email = mysqli_real_escape_string($db , $_POST['email']);
    $password = mysqli_real_escape_string($db , $_POST['password']);
    if(empty($email)) {
        array_push($error , "Email is Required!");
    }
    if(empty($password)) {
        array_push($error , "Password is Required!");
    }

    if(count($error)== 0) {
        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($db , $query);
        if(mysqli_num_rows($result) == 1 ) {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = " Welcome you are logged in";
            header("location:home.html");
        }else{
            array_push($error,"Account not Found");
        }
    }
}

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location:signin.php');
}

// order 
if(isset($_POST['buy'])){
    $name = mysqli_real_escape_string($db , $_POST['name']);
    $phone = mysqli_real_escape_string($db , $_POST['phone']);
    $pid= mysqli_real_escape_string($db, $_POST['pid']);
    $quantity= mysqli_real_escape_string($db, $_POST['quantity']);
    $adress = mysqli_real_escape_string($db, $_POST['adress']);
if(empty($name)) {
    array_push($error , "Name is Required!");
}
if(empty($phone)) {
    array_push($error , "Phone is Required!");
}
if(empty($pid)) {
    array_push($error , "Product Id is Required!");
}
if(empty($quantity)) {
    array_push($error , "Quantity is Required!");
}
if(empty($adress)) {
    array_push($error , "Adress is Required!");
}
if(count($error) == 0) {
  $sql=" INSERT INTO `order`(`name`, `number`, `pid`, `quantity`, `adress`) VALUES ('$name','$phone','$pid','$quantity','$adress')";
    mysqli_query($db , $sql);
    header("location:home.html");
}
}
?>