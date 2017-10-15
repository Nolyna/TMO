<?php
    require("db_connect.php");
    $GLOBALS['db']=$db;
    
    function newfood($name,$des,$price,$img,$dates,$h1,$h2){
        $path = '../css/foodimg/';
        /*if($img != "") {            
            $targetPath = treatImage($img,$path);
        }else{
            $targetPath =  '../assets/noimage.png';
        }*/
        $create = $GLOBALS['db']->prepare(" INSERT INTO food(name,Description,price,image,datedispo,hbegin,hend) VALUES ('$name','$des','$price','$img','$dates','$h1','$h2') ");
        $create->execute();
        $id = $GLOBALS['db']->lastInsertId();
        post($_SESSION['id'],$id);
    }

    function searchfood($name){
        $checkemail = $GLOBALS['db']->prepare(" SELECT * FROM food where name LIKE %.$name.% ");
        $checkemail->execute();
        $rows = $result->fetch(PDO::FETCH_ASSOC);
            return $rows;
        
    }

    function getfood($id){
        $get = $GLOBALS['db']->prepare(" SELECT * FROM food where idfood = '$id'  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;        
    }

    function getallfood(){
        //incorrect 
        $get = $GLOBALS['db']->prepare(" SELECT * FROM food ORDER BY idfood DESC  ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;        
    }
    
    function getprice($email,$password){
        $check = $GLOBALS['db']->prepare(" SELECT count(*) FROM compte where email = '$email' and password='$password' ");
        $check->execute();
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        return $rows;
        
    }
    function getlimited(){
        $check = $GLOBALS['db']->prepare(" SELECT * FROM food LIMIT 10 OFFSET N-10 ");
        $check->execute();
        $rows = $result->fetch(PDO::FETCH_NUM);        
        return $rows[0];
    }

    function getpostautheur($id){
        $get = $GLOBALS['db']->prepare("SELECT iduser FROM post WHERE idfood='$id' ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }
    

?>