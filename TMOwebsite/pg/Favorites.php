<!DOCTYPE html>
<?php
    session_start();
    //require("../php/db_connect.php");
    require("../php/user.php");
    require("../php/food.php");
    require("../php/action.php");

    if(isset($_GET['food'])){
        $idfood = $_GET['food'];
    }elseif(isset($_POST['foodid'])){
        $idfood = $_POST['foodid'];
    }

    //$food = getfood($idfood);
    $food = getfood(1);

    if(isset($_POST['comment'])) {
        comment( $_SESSION['id'] ,$idfood,$_POST['comment']);        
    }
?>

<html>
<head>
   <link rel=stylesheet type="text/css" href="../css/favorites.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600i,700,900" rel="stylesheet">
     <title>Favorites</title>
</head>

<body>
    <nav class="text-center">        
        <h1> Take Me Out </h1>
    </nav>

    <div class= "welcome text-right">
    <p1> Welcome, <a href="profile.php"> <?php echo  $_SESSION['name']; ?> </a></p1>
    </div>

    <div class='container'>
    
        <div id="fav">
            <p1>My Favorites</p1>
        </div>
        <div class="row">
            <ul class="list-group">
                <?php
                    $favoris = getlike( $_SESSION['id']);
                    //$empty = array_filter($favoris);            
                    if (!empty($favoris)) {
                        foreach ( $favoris as  $idfood) {
                            $food = getfood($idfood['idfood']);
                            echo ' <li class="list-group-item">';
                            echo  $food['name'].'<a href="details.php?food='.$food['idfood'].'"> More details </a>';
                            echo '</li>';
                        }
                    }else{
                        echo '
                        <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                        <h1 class="display-3">You don\'t have any favoris yet :(</h1>
                        <p class="lead"> Look around and get some likes </p>
                        </div>
                    </div>';
                    }
                    
                ?> 
            </ul>
           
        
        </div>
            <!--div id="orders">
                <p1> Orders/Receipts</p1>
                </div>
                <div class="eating">
                <ul>
                <li>
                    Pan Seared Salmon
                Type: Order</li>  
                            <li>Apple Turnover
                Type: Request</li>
                            <li>Gazpacho
                Type: Request</li>
                            <li>Vegan Wrap
                Type: Request</li>
                            <li>New Orleans Gumbo
                Type: Order </li>
                            </ul>
                        
                        </div>
                <div class="hearts">
                        <img src="Heart%20icon.svg">
                        <img src="Heart%20icon.svg">
                        <img src="Heart%20icon.svg">
                        <img src="Heart%20icon.svg">
                        <img src="Heart%20icon.svg">
                        </div>
                 </div--> 
    </body>
</html>