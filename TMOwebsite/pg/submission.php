<!DOCTYPE html>
<?php
    session_start();
    require("../php/db_connect.php");
    require("../php/FOOD.php");
    require("../php/action.php");
    require("../php/user.php");

    if(isset($_POST['name']) ) {

        $name = valid($_POST['name']);
        $des = valid( $_POST['desc']);
        $price = valid($_POST['price']);
        $dates = valid($_POST['dates']);
        //$img = valid($_FILES["file"]);
        //$img = valid($_POST["file"]);
        $h1 = valid($_POST['t1']);
        $h2 = valid($_POST['t2']);

        if(isset($_FILES["file"]) and !empty($_FILES["file"])) {            
            $targetPath = treatImage($_FILES["file"],$path);
        }else{
            $targetPath =  '../assets/noimage.png';
        }
        
        if( newfood($name,$des,$price,$targetPath,$dates,$h1,$h2) ){
           echo "<script> $('#myModal').modal('show'); </script>"; 
           header("Location: profile.php");
        }
        
    }
?>
<html>
<head>
   <link rel=stylesheet type="text/css" href="../css/home.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600i,700,900" rel="stylesheet">
     <title> Dinner </title>
    </head>

<body>
    <nav class="text-center">        
    <h1> <a href="home.php"> Take Me Out </a> </h1>
    </nav>

    <div class= "welcome text-right">
        <p1> Welcome, <a href="profile.php"> <?php echo  $_SESSION['name']; ?> </a></p1>
    </div>

    <div class="container">

        <form action="#" method="post" id="foodForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlInput1"> Name</label>
                <input type="text" class="form-control" name = "name" id="exampleFormControlInput1" placeholder="Pasta" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Type</label>
                <input type="text" class="form-control" name = "type" id="exampleFormControlInput1" placeholder="european, african,...">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description:</label>
                <textarea class="form-control" name = "desc" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Price</label>
                <input type="text" class="form-control" name = "price" id="exampleFormControlInput1" placeholder="$15">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input:</label>
                <input type="file" class="form-control-file" name = "file" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <label for="FormControlInput">Date:</label>
                <input type="date" class="form-control" name = "dates" id="FormControlInput">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Time:</label>
                <input type="text" class="form-control" name = "t1" id="exampleFormControlInput1" placeholder="1:30 pm">
                <input type="text" class="form-control" name = "t2" id="exampleFormControlInput1" placeholder="2:30 am">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-secondary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </form>
        
    </div>

    <div class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="#myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Yeah!!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Post Succesfully.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>