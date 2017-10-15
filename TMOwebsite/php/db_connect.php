<?php
$user = 'root';
$pass = '';

try {
    $db = new PDO('mysql:host=localhost;dbname=tmobase', $user, $pass);
} catch (PDOException $e) {
    echo '<script>console.log("Connection failed'. $e->getMessage() .'")</script>' ;
    die();
}
//;
?>
