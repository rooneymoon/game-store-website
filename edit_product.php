<?php
include 'condb.php';
$game_name = $_GET['game_name'];
$sql = "SELECT * FROM game,genre WHERE game_name = '$game_name' AND game.genre_id =genre.genre_id ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
                    <strong>JARUNSTORE</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="store.php">Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
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
    <main style="background-image: linear-gradient(rgba(0, 0, 0,
            0.9),rgba(0, 0, 0, 0.9),rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
            url(images/scifi-3.jpg); background-size: cover; height: 1000px;
            background-position: top;">
        <div class="container pt-5">
            <h1 class="text-light">Edit Product</h1>
            <div class="row mt-3">
                <div class="col-sm-5">
                    <form action="update_product.php" method="post" class="text-light" name="game-form" enctype="multipart/form-data">
                        <label class="fs-5">Name</label>
                        <input type="text" name="game_name" class="form-control mt-2 mb-3" value="<?= $row['game_name'] ?>">
                        <label class="fs-5">Publisher</label>
                        <input type="text" name="publisher" class="form-control mt-2 mb-3" value="<?= $row['publisher'] ?>">
                        <label class="fs-5">Genre</label>
                        <input type="text" name="genre" class="form-control mt-2 mb-3" value="<?= $row['genre_name'] ?>" readonly>
                        <label class="fs-5">Description</label>
                        <input type="text" name="description" class="form-control mt-2 mb-3" value="<?= $row['description'] ?>">
                        <label class="fs-5">Price</label>
                        <input type="number" name="price" class="form-control mt-2 mb-3" value="<?= $row['price'] ?>">
                        <label class="fs-5">Image</label><br>
                        <img src="images/<?php echo $row['image'] ?>" class="mt-2 mb-5 img-thumbnail"><br>
                        <button type="submit" class="btn btn-primary me-2 fs-6 rounded-pill">Submit</button>
                        <input class="btn btn-danger me-2 fs-6 rounded-pill" type="reset" value="Cancel">
                    </form>
                </div>
            </div>
        </div>
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