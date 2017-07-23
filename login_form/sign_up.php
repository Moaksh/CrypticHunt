<?php
$host="localhost";
$username="root";
$password="";
$obj = new PDO("mysql:host=$host;dbname=crypt",$username,$password);
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$q = "insert into signup values('$fname','$lname','$email','$pass',1,'good')";
$c=$obj->exec($q);
if($c==1)
{
session_start();
$_SESSION['email']=$email;
    header("location:level1.php");
}
?>

