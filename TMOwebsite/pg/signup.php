<!DOCTYPE html>
<?php
    session_start();
    //require("../php/db_connect.php");
    require("../php/user.php");
    require("../php/action.php");

    if(isset($_POST['FullName']) &&  isset($_POST['emailaddress']) && isset($_POST['password'])) {
        
        $nom = valid($_POST['FullName']);
        $email = valid($_POST['emailaddress']);
        $pass = valid( $_POST['password']);
        
        if( signup($nom,$email,$pass)){
            $_SESSION['name'] =$nom;
            $_SESSION['email'] = $email;
            $_SESSION['id'] = getid($email);
            header("Location: home.php");
        }
        
    }
?>
<html>
<head>
    <link rel='stylesheet' type="text/css" href="../css/signup.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600i,700,900" rel="stylesheet">
    <title> Sign Up </title>
    </head>

    <body>
        <nav class="text-center">        
            <h1> Take Me Out </h1>
        </nav>
        <div class='container content'>
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-dark text-white">
                        <img src="../assets/margo-brodowicz-203781.jpg">
                        <div class="card-img-overlay text-center">
                            <!--p class="card-text">Your Home Cooked Meal Is Waiting For You</p-->
                        </div>
                    </div>  
                    <div class="captiontext">
                        <p2> Your Home Cooked Meal Is Waiting For You</p2>
                    </div>
                </div>
                <div class="col-md">
                    <div class="info"> 
                        <div class="Getin">
                            <h2> Sign Up</h2>
                        </div>

                        <form action="#" method="post" id="signupForm">                
                            <div class="form-group col-md-8">
                                <label for="inputname" class="col-form-label">Full Name:</label>
                                <input type="text" name="FullName" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputEmail" class="col-form-label">Email:</label>
                                <input type="text" name="emailaddress" class="form-control"placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputpassword" class="col-form-label">Password:</label>
                                <input type="password" name="password" class="form-control" placeholder ="Password" required>
                            </div>            
                            <button type="submit" class="btn btn-secondary"> Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>