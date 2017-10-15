<!DOCTYPE html>
<?php
    session_start();
    //require("../php/db_connect.php");
    require("../php/food.php");
    require("../php/action.php");

    if(isset($_GET['food'])){
        $idfood = $_GET['food'];
    }elseif(isset($_POST['foodid'])){
        $idfood = $_POST['foodid'];
    }

    $food = getfood($idfood);
    $aut = getpostautheur($idfood);

    if(isset($_POST['comment'])) {
        comment( $_SESSION['id'] ,$idfood,$_POST['comment']);        
    }
?>
<html>
<head>
        <link rel='stylesheet' type="text/css"  href="../css/details.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600i,700,900" rel="stylesheet">
    </head>

    <body>
    
   
    <nav class="text-center">        
    <h1> <a href="home.php"> Take Me Out </a> </h1>
    </nav>

    <div class= "welcome text-right">
    <p1> Welcome, <a href="profile.php"> <?php echo  $_SESSION['name']; ?> </a></p1>
    </div>

    <div class='container'>
        <div class="row">
        <h3 class='text-center'> <?php echo $food['name']; ?> </h3>
        </div>
        <div class="row">
            <div class="col-md-8">                
                <div class="card bg-dark text-white">
                    <img src="<?php echo $food['image']; ?>">   
                </div>                  
            </div>
            <div class="col-md-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">I want it !!</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="Description">
                            <br>
                            <i><?php echo $food['Description']; ?>
                            </i>
                            <br>
                            <a href="profile.php?autheur=<?php echo $aut['iduser']; ?>" type="button" class="btn btn-outline-warning"> See cook</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                       
                        <p>Type: <?php echo $food['type']; ?></p>
                        <p> Price: <?php echo $food['price']; ?></p>
                        <p> Available: <?php echo $food['datedispo']; ?></p>
                        <button type="button" class="btn btn-outline-warning"> Request</button>
                        <button type="button" class="btn btn-outline-warning"> Order </button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <p>
                <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                COMMENTS ...
                </button>
                <button type="button" class="btn btn-outline-warning"> Like </button>
                <button type="button" class="btn btn-outline-warning"> Share </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form name='commentform' method='post' action='#'>
                        <input type="hidden" name="foodid" value=<?php echo $idfood; ?> > 
                        <div class="form-group">
                            <label for="FormControlTextarea"> Write your comment: </label>
                            <textarea class="form-control" name="comment" id="FormControlTextarea" rows="2" required></textarea>
                        </div>                        
                        <button type="submit" class="btn btn-secondary"> Submit</button>
                    </form>

                    
                    <div class="list-group">
                        <?php
                            $commentaires = getcommentfood($idfood);
                            foreach ( $commentaires as  $comment) {
                                echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">';
                                echo '<div class="d-flex w-100 justify-content-between">';
                                echo '<small>'.$comment['name'].' '.$comment['dateCreer'].'</small> </div>';
                                echo '<p class="mb-1">'.$comment['textComment'].'</p>';
                                echo '</a>';
                            }
                        ?>  
                       
                    </div>

                </div>
            </div>
                    
            <!--div class= "icon1">
                <img src="Knife%20and%20fork.svg">
                    </div>
            <div class= "icon2">
                <img src="Plate.svg">
            </div-->
            
        </div> 

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        
    </body>
    

</html>