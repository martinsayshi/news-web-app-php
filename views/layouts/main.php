<?php ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
  </head>
  <body>
    <header>
    <nav class="navbar navbar-dark bg-dark mb-3">
      <div class="container">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link text-light" href="/">Home</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto d-flex align-items-center">
          <li class="nav-item me-3">
            <a class="nav-link text-light" href="/addnews">Add News</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto d-flex align-items-center">
          <li class="nav-item me-3">
            <a class="nav-link text-light" href="/authors">All Authors</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto d-flex align-items-center">
          <li class="nav-item">
            <a class="nav-link text-light" href="/topauthors">Top Authors</a>
          </li>
        </ul>
      </div>
    </nav>
    </header>
    <div class="container">
      <?php echo $content ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
