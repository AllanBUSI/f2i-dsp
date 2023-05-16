<?php 
require 'Database.php';

try {

  if (isset($_get['name'])) {
    $pdo = getConnect();  
    $name = $_GET['name'];
  
    $sql = "SELECT * FROM villes_france_free WHERE ville_slug LIKE ?";
    $array = [$name."%"];
  
    $query = $pdo->prepare($sql);
    $query->execute($array);
  
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
  }

} catch (Exception $e) {
  return false;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body> 

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbassr</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <?= isset($_get['name']) ? $name : null; ?>
    </div>
  </div>
</nav>

<form action="/projet/index.php" method="get">
  <div class="container p-5">
    <div class="card mt-5 m-3 p-5">
      <div class="row">
        <h1 class="pb-5 display-5">Bienvenue sur notre présentation de ville</h1>
        <div class="col-md-8">
          <input type="text" name="name" placeholder="Entrer un nom de ville" class="form-control">
        </div>
        <div class="col-md-4">
          <input type="submit" value="valider" class="col-12 btn btn-success">
        </div>
      </div>
    </div>
  </div>
</form>
<div class="container p-5">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Ville</th>
        <th scope="col">Code postal</th>
        <th scope="col">Nombre d'habitant</th>
      </tr>
    </thead>
    <tbody>
  
      <?php 
        if (isset($_get['name'])) {
          foreach ($data as $key => $item) {
            $key = $key+1;
            echo '<tr>
                <th scope="row">'.$key.'</th>
                <td>'.$item['ville_slug'].'</td>
                <td>'.$item['ville_code_postal'].'</td>
                <td>'.$item['ville_population_2012'].'</td>
              </tr>
            ';
          }
        }
      
      ?>
  
  
    </tbody>
  </table>
</div>



</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>