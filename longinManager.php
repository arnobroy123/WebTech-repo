<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include 'manager/database.php';
    $uname="";
    $err_uname="";
    $pass="";
    $err_pass="";
    $err_invalid="";
    $has_error=false;

    if(isset($_POST['submit']))
    {
        if(empty($_POST['uname']))
        {
            $err_uname="*Username Required";
            $has_error=true;
        }
        else
        {
            $uname=$_POST['uname'];
        }
        if(empty($_POST['pass']))
        {
            $err_pass="*Password Required";
            $has_error=true;
        }
        else
        {
            $pass=$_POST['pass'];
        }
        if(!$has_error)
        {
            $query="SELECT * FROM login WHERE email='$uname' AND password='$pass'";
            $result=get($query);



            if(count($result)>0)
            {
                $rs=$result[0];
                $status=$rs['user_type'];
                if($status=='manager')
                {
                    $email = $rs['email'];
                    setcookie("loggedinuser",$rs['email'],time()+18000);
                    header("location:manager/manager_homepage.php?email=$email");
                }
           }
            else
            {
                $err_invalid="** Invalid Username or Password **";
            }
        }
    }
?>



<html>
    <center>
    <head>
        <title>Login</title>
        <head>
            <title>Manager Home Page </title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <style>
                .fakeimg {
                    height: 200px;
                    background: #aaa;
                }
            </style>
        </head>

    </head>
    <body>
      <div class="jumbotron text-center" style="margin-bottom:0">
      <h1>Welcome to</h1>
      <h2>Airline Ticket Reservation System </h2>

      </div>

            <h6>Login Here</h6>
            <form method="post" action="">
                <div class="textbox">
                    <input type="email" placeholder="Email" value="<?php echo $uname;?>" name="uname">
                </div>
                    <span style="color:red"><?php echo $err_uname;?></span>
                <div class="textbox">
                    <input type="password" placeholder="Password" value="<?php echo $pass;?>" name="pass">
                </div>
                    <span style="color:red"><?php echo $err_pass;?></span><br>
                    <input class="btn" type="submit" value="Sign In" name="submit">

            </form>
                <span style="color:red"><?php echo $err_invalid;?></span>
        </div>
    </body>
    </center>
</html>
