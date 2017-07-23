<?php
session_start();
$host="localhost";
$username="root";
$password="";
$obj = new PDO("mysql:host=$host;dbname=crypt",$username,$password);
$email=$_SESSION['email'];
if(!$email)
    header("location:index.php?val1=01");
$q= "select fname from signup where email='$email'";
$res=$obj->query($q);
if($row = $res->fetch())
{
    $name=$row['fname'];
}
?>
<html>
    <head>
        <title> CONGRATULATION </title>
        <link href='http://fonts.googleapis.com/css?family=Noto+Serif' rel='stylesheet' type='text/css'>
        <link href="css/congo.css" rel="stylesheet" type="text/css"/>
        <link href="css/level1.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.0.min.js"></script>
    </head>
    <body style="background-image: url('images/giphy.gif')" >
        <nav class="navbar navbar-default navbar-fixed-top" style="height: 100px">
        <div class="navbar-brand"> HOWDY, <?php echo $name ?></div>
        <div class="btn-group-lg" style="margin-top: 30px">
            <a href="index.php?val=000" class=" active navbar-btn"> LOG OUT</a>
            <a href="leaderboard.php" class="active navbar-btn" style="margin-left:20px;"> CHECK YOUR POSITION</a>
        </div>
    </nav>
       <div id="container" >
           CONGRATULATIONS !! <br/> you have completed all the levels.
</div>
   </body>
</html>
