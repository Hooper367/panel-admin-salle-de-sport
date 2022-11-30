
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css//style.css">
    
    <script defer src="./assets/js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script defer src="./assets/js/query.js"></script>
    <title>Document</title>
</head>
<body>
    <header>

    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Notre blog</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active fs-4" aria-current="page" href="index.php">Accueil</a>
        </li>
        <?php session_start() ?>
        <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
        <li class="nav-item">
          <a class="nav-link fs-4" href="panel.php">Panel</a>
        </li>
        <?php else : ?>
          <li class="nav-item">
          <a class="nav-link fs-4" href="login.php">Panel</a>
        </li>
        <?php endif ;?>
          </ul>
        </li>
      </ul>
    </div>
    <div class="test">
    
     <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
      
      <p class="fs-4 d-flex justify-content-center"><?php  echo ucFirst($_SESSION['user']) ?> 🟢</p>
      <a class="btn btn-danger" name="logout" id="disconnect" href="logout.php">Deconnexion</a>
     <?php else : ?>
      <a class="btn btn-primary" href="login.php">Se connecter</a>
       

       <?php endif ; ?>
      
      
    </div>
  </div>
</nav>
    </header>
    