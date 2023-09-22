<?php session_start(); ?>
<?php include('condb.php'); ?>
<?php
$query_product = "SELECT * FROM game, genre
WHERE game.genre_id = genre.genre_id 
ORDER BY genre_name ASC";
$result_product = mysqli_query($conn, $query_product);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
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
                            <a class="nav-link active" href="store.php">Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart</a>
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
    <main style="background-color:#0b1521;">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/scifi-4.jpg" class="d-block w-100 rounded">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="display-6"><strong>Welcome to our store</strong></h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/scifi-6.jpg" class="d-block w-100 rounded">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="display-6"><strong>No discount forever</strong></h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/scifi-5.jpg" class="d-block w-100 rounded">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="display-6"><strong>Every product too expensive</strong></h1>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <section style="background-image: linear-gradient(rgba(11, 21, 33, 1),rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9),rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
            url(images/scifi-2.jpg); background-size: cover;
            background-position: top;">
            <div class="container pb-5">
                <h1 class="mt-5 text-center text-light">Our Store</h1>
                <div class="row pt-5 gap-5 d-flex justify-content-center pb-5">
                    <?php foreach ($result_product as $row_pro) { ?>
                        <div class="card" style="width: 20rem; background-color:#091b29;">
                            <img src="images/<?php echo $row_pro['image']; ?>" class="card-img-top mt-4" width="200px" height="200px" style="object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-light"><?php echo $row_pro['game_name']; ?></h5>
                                <a class="text-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Description
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <div class="card-text text-light"><?php echo $row_pro['description']; ?></div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-light" style="background-color:#091b29;">Publisher : <?php echo $row_pro['publisher']; ?></li>
                                <li class="list-group-item text-light" style="background-color:#091b29">Genre : <?php echo $row_pro['genre_name']; ?></li>
                                <li class="list-group-item h5 text-primary" style="background-color:#091b29"><?php echo $row_pro['price']; ?> Baht</li>
                            </ul>
                            <div class="card-body">
                                <a href="add_to_cart.php?game_name=<?= $row_pro["game_name"] ?>&price=<?= $row_pro["price"] ?>" class="btn btn-primary rounded-pill">Add to cart</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <footer class="text-center text-white m-0" style="background-color:
            #091b29">
            <div class="container">
                <hr class="my-5">
                <section class="mb-0">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <p>Designed and Built by Pannisa</p>
                        </div>
                    </div>
                </section>
            </div>
        </footer>
    </main>
</body>

</html>