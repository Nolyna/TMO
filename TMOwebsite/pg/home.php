<!DOCTYPE html>
<?php
    session_start();
    //require("../php/db_connect.php");
    require("../php/food.php");
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

    <div class="container">
	<div class="row">
		<form class="form-inline text-center" action="search.php" method="post">
    		<input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
	</div>
        <div class="row">
            <!--div class="card-deck"-->
                <?php
                    //$test = getallfood();
                    $get = $GLOBALS['db']->prepare(" SELECT * FROM food ORDER BY idfood DESC  ");
                    $get->execute();
                    while ($test = $get->fetch(PDO::FETCH_ASSOC)) {
                        echo '<a href="details.php?food='.$test['idfood'].'" class="col-md-4"> ';
                        echo '<div class="card">';
                        echo '<img class="card-img-top" src="'.$test['image'].'" alt="'.$test['name'].'">';
                        echo '<div class="card-body">';
                        echo '    <h4 class="card-title">'.$test['name'].' </h4>';
                        echo '    <p class="card-text"> </p>';
                            echo '</div>';
                            echo '<div class="card-footer">';
                            echo '    <small class="text-muted"> click to see more</small>';
                            echo '</div>';
                            echo '</div> </a>';
                    }
                ?>                
            <!--/div-->
        </div>            
    </div>
        
    
    </body>
</html>