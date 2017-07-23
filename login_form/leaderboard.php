<?php
session_start();
$host="localhost";
$username="root";
$password="";
$obj = new PDO("mysql:host=$host;dbname=crypt",$username,$password);
$email=$_SESSION['email'];
if(isset($_REQUEST['back']))
{
$qu1 = "select level from signup  where email='$email'";
$res1 = $obj->query($qu1);
if($row1 = $res1->fetch())
{
   $l=$row1['level'];
   if($l==8)
       $l--;
   $str="level".$l.".php";
   header("location:$str");
}
}
$qu = "select fname,level from signup order by level DESC";
$res = $obj->query($qu);
$rank=0; $pl=10;
echo '<table class="table-responsive table-striped table table-hover" align="center"  border="5" cell padding="10px">
       <tr class="text-center text-capitalize text-info">
           <th width="20px" height="5px" > Rank</th><th width="10px" height="5px">Name</th><th width="10px" height="5px">Level Completed</th>
       </tr>';
while($row=$res->fetch())
{
   
    if($pl!=$row['level'])
        $rank++;
    echo"<tr><td>".$rank."</td><td>".$row['fname']."</td><td>".($row['level']-1)."</td></tr><br/>";
     $pl=$row['level'];
}
echo"/<table>";
$qu = "select fname from signup  where email='$email'";
$res = $obj->query($qu);
if($row = $res->fetch())
{
   $name=$row['fname'];
}

?>
<html>
    <head>
        <title>LEADERBOARD</title>
        <link href="bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="css/level1.css" rel="stylesheet" type="text/css"/>
         <link href="../../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    </head>
   
<body style="background-color:  #222" >
    <nav class="navbar navbar-default navbar-fixed-top">
   
        <div class="navbar-brand"> HOWDY, <?php echo $name ?></div>
        <div class="btn-group-lg" style="margin-top: 30px">
            <a href="index.php?val=000" class=" active navbar-btn"> LOG OUT</a>
            <form method="post">
                <input type="submit" class="active btn-success" style="margin-left:70%;" name="back" value="BACK"/>
            </form>
        </div>
    </nav>
 
</body>
</html>
