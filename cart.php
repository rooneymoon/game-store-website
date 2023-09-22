<?php session_start(); ?>
<?php include('condb.php'); ?>
<?php $total = 0; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .nav-item {
      font-size: 20px;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary pt-3 pb-3" data-bs-theme="dark" style="background-color: #0b1521
                !important;">
      <div class="container">
        <a class="navbar-brand" href="index.php" style="padding: 10px
                        20px;">
          <i class="bi bi-joystick me-2" style="color: #3b78e6;
                            font-size: 30px;"></i>
          <strong>GAMESTORE</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="store.php">Store</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="cart.php">Cart</a>
            </li>
          </ul>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link text-primary" href="fr_product.php">For Admin</a>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-primary
                                    d-flex align-items-center ps-3 pt-0 pb-0
                                    pe-3 rounded-pill">
                <a class="nav-link text-light" href="fr_login.php"><strong>Login</strong></a>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main style="background-image: linear-gradient(rgba(11, 21, 33, 1), rgba(11, 21, 33, 0.8),rgba(11, 21, 33, 1)),
            url(images/scifi-1.jpg); background-size: cover;
            background-position: top; min-height: 700px">
    <div class="container text-light pb-5">
      <h1 class="text-light pt-5">Your Cart</h1>
      <table class="table text-light" style="background-color:#091b29">
        <tr class="text-center h6">
          <th class="p-3">Product</th>
          <th class="p-3">Price</th>
          <th class="p-3"></th>
        </tr>
        <?php
        $sql = "SELECT * FROM cart,game WHERE cart.game_name = game.game_name";
        $hand = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($hand)) {
        ?>
          <tr class="text-center">
            <td class="p-3"><?= $row["game_name"] ?></td>
            <td class="p-3"><?= $row["price"] ?> Baht</td>
            <td><a href="delete_cart.php?game_id=<?= $row["game_id"] ?>" class="btn btn-danger rounded-pill">DELETE</a></td>
          </tr>
        <?php
        }
        $total = 0;
        foreach ($hand as $key => $value) {
          $price = $value['price'];
          $total += ($price);
        }
        mysqli_close($conn);
        ?>
        <h5 class="mt-5 text-primary mb-3">Total : <?php echo $total; ?> Baht</h5>
      </table>
      <a href="store.php">
        < Go back to store</a>
    </div>
    <footer class="text-center text-white m-0" style="background-color:#0b1521">
      <div class="container">
        <hr class="my-5">
        <section class="mb-0">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <p>Designed & Built by Pannisa</p>
            </div>
          </div>
        </section>
      </div>
    </footer>
  </main>
</body>
</html>