<?php
$host="localhost";
$username="root";
$password="";
$obj = new PDO("mysql:host=$host;dbname=crypt",$username,$password);
$email = $_REQUEST['email'];
$pass = $_REQUEST['pass'];
$q = "select password from signup where email='$email'";
$res = $obj->query($q);
$count=$res->rowCount();
if($count>0)
{
    $row = $res->fetch();
    if($row['password'] == $pass)
    { 
        $q2="select level from signup where email='$email'";
        $r2=$obj->query($q2);
        $ro = $r2->fetch();
        $level = $ro['level'];
        if($level==8)
            $level--;
        $str= "level".$level.".php";
         header("location:$str");
         session_start();
        $_SESSION['email']=$email;
       
    }
    else
    {
        $msg = '<p style="color:green" > password incorrect</p>';
         header("location:index.php?msg='$msg'");
    }
   }
 else
 {
 $msg2='<span style="color:green"> Email/Password Incorrect</span>';
 header("location:index.php?msg2='$msg2'");
 }
    
?>