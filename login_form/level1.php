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
if(isset($_REQUEST['val']))
 $c=$_REQUEST['val'];

?>
<html>
    <head>
        <title>LEVEL 1</title>
        <link href="bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="css/level1.css" rel="stylesheet" type="text/css"/>
         <link href="../../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <script src="js/jquery-3.2.0.min.js" > </script>
    <script type="text/javascript">
        var a = "<?php echo $c ?>";
        if(a==1)
            alert("Dont try to be over smart");
    
    </script>
    </head>

<body style="background-color:  #222">
    <nav class="navbar navbar-default navbar-fixed-top" style="height: 100px">
        <div class="navbar-brand"> HOWDY, <?php echo $name ?></div>
        <div class="btn-group-lg" style="margin-top: 30px">
            <a href="index.php?val=000" class=" active navbar-btn"> LOG OUT</a>
            <a href="leaderboard.php" class="active navbar-btn" style="margin-left:20px;"> CHECK YOUR POSITION</a>
        </div>
    </nav>
    
    <section id="one">
        <h2 >level 1</h2>
    </section>
    <div>
        <a href="update.php?pass=good"> <img src="images/irrelevant.jpg"  alt="click on image" id= "click1" name="mystery" height="400px" width="500px" style="margin-left: 30% ; margin-top: 20px" class="img-responsive img-circle" ></a>
    </div>
    
</body>
</html>
