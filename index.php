<?php
    require 'db.php';
    if(isset($_COOKIE['rememberforcookie_gagan'])){
    if($_COOKIE['rememberforcookie_gagan'] != ''){
        $cook=$_COOKIE['rememberforcookie_gagan'];
        $result = $mysqli->query("SELECT * FROM gagan_users where password='$cook'");
        if($result->num_rows>0){
            $user = $result->fetch_assoc();
            session_start();
            $_SESSION['username']=$user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];

            header("location: profile.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PHP Assignment</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reset.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="index.css" type="text/css">
 <script type="text/javaScript" src="./index.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <center><div class="container">
            <a href ="./index.html"><h1 class="display-3"><img src="./asset/logo.png"  style="height:80px;">Converse Point</h1></a>
        </div></center><hr size=30>
<!--------------------------------login-------------------------------------------------------------->
    <div id="login" class="container login">

        <div class="row label">
            <div class="container col-lg  text-white labelid"><button class="buttonon" onclick="registeron()">
                <center><h4>Log In</h4></center></button>
            </div>
            
            <div class="container col-lg text-grey labelid" ><button class="buttonoff" onclick="loginon()"><center><h4>Register</h4></center></button>
            </div>
                                                      
            <div class="container text-white" ><br><br><h1 ><center>WELCOME BACK!</center></h1><br>
               <div style="margin-left:200px;"> <form action="login.php" method="post" autocomplete="on" name="loginform" onsubmit="return loginform()">
<!--input-1 of login--><input type="text" name="username" placeholder="Username" required size=20 >
                <br>
                <br>

<!--input-2 of login--><input type="password" name="password" placeholder="Password" size=20 required >
                <br>
                <input type="checkbox" name="remember" value="yes">Remember me
                <br>
               <div class="submit1" ><input type="submit" class="loginbtn" name="login" value="Login">   </form>
                <br><br><a href="forgot.php"><font color="White">Forgot/Change Password</font></a>

            </div>
            </div>
            </div>

          </div>



    </div>


    
    <!-- Register--------------------------------------------------------------------------------------------------------------------->
    
    <div id="register" class="container login" >

        <div class="row label" >
            <div class="container col-lg  text-white labelid" ><button class="buttonoff" onclick="registeron()"><center><h4>Log In</h4></center></button>
            </div>
            
            <div class="container col-lg text-grey labelid" ><button class="buttonon" onclick="loginon()"><center><h4>Register</h4></center></button>
            </div>
                                                      
            <div class="container text-white" ><br><h1 ><center>REGISTER HERE</center></h1><br>
               <div style="margin-left:80px;"> 
                <form action="register.php" method="post" autocomplete="on" name="registerform" onsubmit="return registerformfunc()">
                <input type="text" name="fname" required placeholder="First Name" size=20>
                &nbsp &nbsp
                <input type="text" name="lname" required placeholder="Last Name" size=20 >

                <br>
                <br>
                
                <input type="text"  required value="+91" disabled size=1 id="s4"><input type="number" name="phone" required placeholder="Phone number" size=10 id="s5" >

                &nbsp &nbsp
                SEX : 
                <input type="radio" id="male" name="gender" value="male" checked>
                <label for="male">Male</label>&nbsp
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>&nbsp
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Other</label>&nbsp
                <br>
                <br>
                <input type="text" name="email" required placeholder="E-mail" size=20 >

                &nbsp &nbsp
                <input type="text" name="username" onchange="change(this.value)" required placeholder="Username" size=20 >
                <div id="Usernameerror" >&nbsp</div>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="password" required placeholder="Set Password" size=30 >
                <br> 
                <br>
               <div class="submit1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" class="loginbtn" name="register" value="Register"> </input>
                <!--<br><br><a href="#">Forgot Password</a>--></form>

            </div>
            </div>
            </div>
          </div>



    </div>

<script>
function change(uname){
    if(uname != ""){
        var xml = new XMLHttpRequest();

        xml.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("Usernameerror").innerHTML = this.responseText;
            }
        };
        xml.open("GET", "./usercheck.php?uname="+uname, true);
        xml.send();
    }else{

        return;
    }
}

function registeron(){
    document.getElementById("login").style.display = "block" ;
    document.getElementById("register").style.display = "none" ;
}
function loginon(){
    document.getElementById("register").style.display = "block" ;
    document.getElementById("login").style.display = "none" ;
}
</script>

    </body>
</html>
