<?php 

function getConnect() {
    try {

        $db="revision";
        $dbhost="localhost";
        $dbport=3306;
        $dbuser="root";
        $dbpasswd="root";
        
        $pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
        $pdo->exec("SET CHARACTER SET utf8");
        return $pdo;
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}

?>