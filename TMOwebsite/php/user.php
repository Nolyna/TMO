<?php

require("db_connect.php");
$GLOBALS['db']=$db;
    /*function user($id,$name,$email){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }*/
    
    function login($email,$password){
        $check = $GLOBALS['db']->prepare(" SELECT count(*) FROM compte where email = '$email' and password='$password' ");
        $check->execute();
        $rows = $check->fetch(PDO::FETCH_NUM);
        if($rows[0] == 1){
            return true;
        }else{
            return false;
        }
        
    }
    function signup($name,$email,$password){
        $checkemail = $GLOBALS['db']->prepare("SELECT count(*) FROM compte where email = '$email' ");
        $checkemail->execute();
        $rows = $checkemail->fetch(PDO::FETCH_NUM);
        if($rows[0] == 0){
            $create = $GLOBALS['db']->prepare("INSERT INTO user(name,email,password) VALUES ('$name','$email','$password') ");
            $create->execute();
            return true;
        }else{
            return false;
        }
    }
    
    function getname($id){
        $check = $GLOBALS['db']->prepare(" SELECT name FROM user where iduser = '$id' ");
        $check->execute();
        $rows = $result->fetch(PDO::FETCH_NUM);        
        return $rows[0];
    }
    function getabout($id){
        $check = $GLOBALS['db']->prepare(" SELECT iduser FROM user where iduser = '$id' ");
        $check->execute();
        $rows = $result->fetch(PDO::FETCH_NUM);        
        return $rows[0];
    }
    function getid($email){
        $check = $GLOBALS['db']->prepare(" SELECT iduser FROM user where email = '$email' ");
        $check->execute();
        $rows = $check->fetch(PDO::FETCH_NUM);
        return $rows[0];        
    }

    function getuser($id){
        $check = $GLOBALS['db']->prepare(" SELECT * FROM user where iduser = '$id' ");
        $check->execute();
        $rows = $check->fetch(PDO::FETCH_ASSOC);
        return $rows;        
    }

    // check if password exist
    function checkpassword($id,$password){
        $check = $GLOBALS['db']->prepare(" SELECT password FROM user where iduser = '$id' ");
        $check->execute();
        $rows = $check->fetch(PDO::FETCH_NUM);
        if($rows[0] == $password){
            return true;
        }else{
            return false;
        }
    }
    
    function changepassword($id,$newpassword){
        $check = $GLOBALS['db']->prepare(" UPDATE user SET password ='$newpassword' where iduser = '$id' ");
        $check->execute();
    }

    function changeabout($id,$newabout){
        $check = $GLOBALS['db']->prepare(" UPDATE user SET about ='$newabout' where iduser = '$id' ");
        $check->execute();
    }

    function changeemail($id,$newemail){
        $check = $GLOBALS['db']->prepare(" UPDATE user SET email ='$newemail' where iduser = '$id' ");
        $check->execute();
    }

    function changename($id,$newname){
        $check = $GLOBALS['db']->prepare(" UPDATE user SET name ='$newname' where iduser = '$id' ");
        $check->execute();
    }

    function like($idu,$idf){
        $insert = $GLOBALS['db']->prepare(" INSERT INTO likes(iduser,idfood) VALUES ('$idu','$idf') ");
        $result = $insert->execute();
        if($result){return true;}else{return false;} 
    }

    function getlike($id){
        $get = $GLOBALS['db']->prepare("SELECT idfood FROM likes WHERE iduser='$id' ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }

    function comment($idu,$idf,$comment){
        $insert = $GLOBALS['db']->prepare(" INSERT INTO comment(iduser,idfood, dateCreer, textComment) VALUES ('$idu','$idf',date('Y-m-d'),'$comment') ");
        $result = $insert->execute();
        if($result){return true;}else{return false;} 
    }

    function getcommentfood($idfood){
        $get = $GLOBALS['db']->prepare("SELECT textComment, name, dateCreer FROM comment INNER JOIN user ON comment.iduser=user.iduser WHERE idfood='$idfood' ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }

    function save($idu,$idf){
        $insert = $GLOBALS['db']->prepare(" INSERT INTO favoris(iduser,idfood) VALUES ('$idu','$idf') ");
        $result = $insert->execute();
        if($result){return true;}else{return false;} 
    }

    function order($idu,$idf){
        $insert = $GLOBALS['db']->prepare(" INSERT INTO order(iduser,idfood) VALUES ('$idu','$idf') ");
        $result = $insert->execute();
        if($result){return true;}else{return false;} 
    }

    function getorder($id){
        $get = $GLOBALS['db']->prepare("SELECT idfood FROM order WHERE iduser='$id' ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }

    function post($idu,$idf){
        $insert = $GLOBALS['db']->prepare(" INSERT INTO post(iduser,idfood) VALUES ('$idu','$idf') ");
        $result = $insert->execute();
        if($result){return true;}else{return false;} 
    }

    function getpost($id){
        $get = $GLOBALS['db']->prepare("SELECT idfood FROM post WHERE iduser='$id' ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }

    /*function getpostautheur($id){
        $get = $GLOBALS['db']->prepare("SELECT idfood FROM post WHERE idfood='$id' ");
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }*/
?>