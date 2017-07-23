<?php
session_start();
$host="localhost";
$username="root";
$password="";
$obj = new PDO("mysql:host=$host;dbname=crypt",$username,$password);
$email=$_SESSION['email'];
if(!$email)
    header("location:index.php?val1=01");
$qu = "select fname,level from signup  where email='$email'";
$res = $obj->query($qu);
if($row = $res->fetch())
{
   $l = $row['level'];
   $name=$row['fname'];
   if($l<7)
       header("location:level1.php?val=1");
}
if(isset($_POST['sub']))
{
    $qu1 = "select answer from levels where level=7";
    $res1 = $obj->query($qu1);
    $r1 = $res1->fetch();
    $ans = $r1['answer'];
    $eans= $_POST['answer'];
    if($ans==$eans)
    {
        header("location:update.php?pass=last");
    }
}

?>
<html>
    <head>
        <title>THE FINAL PROBLEM</title>
        <link href="bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="css/level1.css" rel="stylesheet" type="text/css"/>
         <link href="../../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    </head>
    <!--So here is what you need......
    1.Connect persons of similar shape images.
    2.Birth and Death is in your hands.  -->
<body style="background-color:  #222">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-brand"> HOWDY, <?php echo $name ?></div>
        <div class="btn-group-lg" style="margin-top: 30px">
            <a href="index.php?val=000" class=" active navbar-btn"> LOG OUT</a>
            <a href="leaderboard.php" class="active navbar-btn" style="margin-left:20px;"> CHECK YOUR POSITION</a>
        </div>
    </nav>
    <section id="one">
        <h2 >level 7</h2>
    </section>
    <div align="center">
       <div>
            <img src="images/thefinalproblem.jpeg" width="600px" height="600px" />
        </div>
           
       
        <div class="form-group " id="answerbox">
            <form method="post" style="margin-top: 50px" >
                <input type='text' class="form-control focus" name="answer"/>
                <input type="submit" class="btn btn-block btn-success" name="sub" value="Submit your answer" />
            </form>
        </div>
         </div>
    </div>
</body>
</html>


