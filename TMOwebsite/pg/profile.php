<!DOCTYPE html>
<?php
    session_start();
    //require("../php/db_connect.php");
    require("../php/user.php");
    require("../php/food.php");
    require("../php/action.php");
?>

<html>

<head>
    <link rel='stylesheet' type="text/css"  href="../css/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600i,700,900" rel="stylesheet">
    <title> home </title>
</head>

<body>
    <nav class="text-center">        
    <h1> <a href="home.php"> Take Me Out </a> </h1>
    </nav>

    <div class= "welcome text-right">
        <p1> Welcome, <a href="profile.php"> <?php echo  $_SESSION['name']; ?> </a></p1>
    </div>

    <div class="prof">
        <h3> Profile: </h3>
    </div>

<?php 
    if(isset($_GET['autheur'])){
        $user = getuser($_GET['autheur']);
    }else{
        $user = getuser( $_SESSION['id']);
        echo '<div class="btn-group text-center" role="group" aria-label="Basic example">
        <a href="Favorites.php"  type="button" class="btn btn-secondary"> Favorites</a>
        <a href="orders.php"     type="button" class="btn btn-secondary"> Orders</a>
        <a href="submission.php" type="button" class="btn btn-secondary"> Post food</a>
      </div>';
    }
?>
    
    <br>
    <div class="text-left">
        <p class="name"> <h4> <?php echo  $user['name']; ?> </h4>    </p>
        <p class="descrip"> <b>About me:</b> <?php echo  $user['about']; ?> </p>
        <p class="descrip"> <b>Contact:</b> <?php echo  $user['email']; ?> </p>
        <div class="descrip"> <b>Work:<b>
            <ul>
            <?php
            //$favoris = getpost( $user['iduser']);
            $y = $user['iduser'];
            $get = $GLOBALS['db']->prepare("SELECT idfood FROM post WHERE iduser='$y' ");
            $get->execute();
            $rows = $get->fetch(PDO::FETCH_ASSOC);   
            while ($favoris = $get->fetch(PDO::FETCH_ASSOC)) {{
                    $i = (int) $favoris['idfood'];
                    $food = getfood($i);
                    echo ' <li class="list-group-item">';
                    echo  $food['name'].'<a href="details.php?food='.$food['idfood'].'"> More details </a>';
                    echo '</li>';
                }
            }
            ?>
            </ul>
        </div>
    </div>
</body>
</html>