<?php
session_start();
$ccode = $_REQUEST['pass'];
$host="localhost";
$username="root";
$password="";
$obj = new PDO("mysql:host=$host;dbname=crypt",$username,$password);
$email=$_SESSION['email'];
$qu = "select level,code from signup  where email='{$email}'";
$res = $obj->query($qu);
$row = $res->fetch();
$alevel = $row['level'];
$acode = $row['code'];

if($acode == $ccode)
{
    $alevel+=1;
    $query1="update signup set level= '{$alevel}' where email='{$email}'";
    $result=$obj->exec($query1);
    $q1 = "select code from levels where level='{$alevel}'";
    $res1= $obj->query($q1);
    $r1 = $res1->fetch();
    $rcode = $r1['code'];
       $q2 = "update signup set code= '{$rcode}' where email='{$email}'";
    $res2= $obj->exec($q2);
    
}
if($alevel==8)
{
    header("location:congo.php");
}
    
else{    
$str="level{$alevel}.php";
header("location:$str");
}
?>