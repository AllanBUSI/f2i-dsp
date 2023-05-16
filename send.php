<?php 
    require 'Database.php';

    if (strlen($_POST['firstname']) > 1 && strlen($_POST['lastname']) > 1){
        $pdo = getConnect();  
      
        $sql = "INSERT INTO user (firstname, lastname) VALUES(?, ?)";
        $array = [$_POST['firstname'], $_POST['lastname']];

        $query = $pdo->prepare($sql);
        $query->execute($array);
        header('location: /projet/index.php');
    } else {
        header('location: /projet/form.php');
    }

?>