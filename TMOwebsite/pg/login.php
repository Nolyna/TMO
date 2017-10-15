<!DOCTYPE html>
<?php
    session_start();
    require("../php/db_connect.php");
    require("../php/user.php");
    require("../php/action.php");

    if(isset($_POST['emailaddress']) && isset($_POST['password'])) {

        $email = valid($_POST['emailaddress']);
        $pass = valid( $_POST['password']);
        
        if( login($email,$pass)){
            $_SESSION['id'] = getid($email);
            $_SESSION['name'] =getname( $_SESSION['id']);
            $_SESSION['email'] = $email;
            header("Location: home.php");
        }
        
    }
?>
<html>

    <head>
        <link rel='stylesheet' type="text/css"  href="../css/login.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600i,700,900" rel="stylesheet">
        <title> Login </title>
    </head>

    <body>
        <nav class="text-center">
            <h1> Take Me Out</h1>
        </nav> 
        <div class='container content'>
            <div class='row'>
                <div class='col-md-6'>                          
                    <div class="card bg-dark text-white">
                        <img src="../assets/margo-brodowicz-203781.jpg">
                        <div class="card-img-overlay text-center">
                            <p class="card-text">Your Home Cooked Meal Is Waiting For You</p>
                        </div>
                    </div>        
                </div>
                <div class='col-md'>
                    <div class="info">
                        <h2> Login</h2>
                        <form action="#" method="post" id="signupForm">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputEmail4" class="col-form-label">Email:</label>
                                <input type="email" class="form-control"  name="emailaddress" id="inputEmail4" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword" class="col-form-label">Password:</label>
                                <input type="password" class="form-control" name="password"  id="inputPassword" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-secondary"> Login </button>
                                </div>
                            </div>
                        </form>
                        <span> Need an account ? <a href="signup.php">Sign Up</a></span>
                        <div id="forget">
                            <a href="forgot password">Forgot Password</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>