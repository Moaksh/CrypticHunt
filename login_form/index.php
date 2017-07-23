<!DOCTYPE html>
<?php
//incorrect password but correct email
if(isset($_REQUEST['msg']))
$val=  $_REQUEST['msg'];

//incorrect email
else if(isset($_REQUEST['msg2']))
$val=  $_REQUEST['msg2'];
//entering without login
if(isset($_REQUEST['val1']))
    $code=$_REQUEST['val1'];

if(isset($_REQUEST['val']))
{
    session_start();
    unset($_SESSION['email']);
    session_cache_expire();
    session_destroy();
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">

      <script>
          var a ="<?php echo $code?>";
          if(a=="01");
          alert("You Must login First");
          </script>
</head>

<body style="background-image: url(bg.png);background-size: cover">
    
    <script>
        
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '268404216940866',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
    
    FB.getLoginStatus(function (response)
  {
    login(response);
  });
  };
  
  
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
   function action(response)
        {
            console.log(response);
            if(response.status == "connected")
            {
              getinfo();
            }
            else
                document.getElementByid("msg").innerHTMl ="you are not connected";
        }
   
   function fbLogin()
   {
       FB.login(function(response){
           if(response.status == 'connected')
           {
               getinfo();
           }
           else
               document.getElementById("msg").innerHTML="Login Error choose another method";
       },{scope: 'public_profile,email'});
   }
   
   function getinfo()
   {
       console.log('Welcome!  Fetching your information.... ');
    FB.api('/me',{fields: 'last_name,first_name,id'}, function(response) {
  console.log(response);
  
  var a = response.first_name;
  var b = response.last_name;
  var c = response.id;
  window.location = "sign_up.php?fname="+a+"&lname="+b+"&email="+c+"&pass=z";
});
   }
   function login(response)
   {
         if(response.status == "connected")
      {
          FB.api('/me',{fields:'id'},function(info){
              console.log(info);
              window.location="login.php?email=" + info.id +"&pass=z";
          });
      }
   }
</script>
    
 <div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div> 
    
  <div class="form" >
      
      <ul class="tab-group">
        <li class="tab active "><a href="#signup">Sign Up</a></li>
        <li class="tab "><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="sign_up.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="fname" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="lname" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="pass" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="login.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="pass"/>
          </div>
              <div> <?php if(isset($val)) echo $val; ?></div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <input class="button button-block" type="submit" value="Log In"/>
          </form>
          <button class="button button-block" style="background-color: #3b5998"onclick="fbLogin()"> Log In using FB </button>
          
          

        </div>
        
      </div><!-- tab-content -->
    
</div>
<div id="msg" class='h1'> </div><!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
