<?php
include 'condb.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show product</title>
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="store.php">Store</a>
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
    <main style="background-image: linear-gradient(rgba(0, 0, 0,
            0.9),rgba(0, 0, 0, 0.9),rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
            url(images/scifi-2.jpg); background-size: cover;
            background-position: top;">
        <div class="container pb-5 pt-5">
            <h1 class="text-light">Our Product</h1>
            <a href="fr_product.php" class="btn btn-primary mb-5 mt-5 rounded-pill fs-6">ADD+</a>
            <table class="table-responsive text-light col-xxl-5" style="background-color:#091b29">
                <tr class="text-center h6">
                    <th class="p-3">Name</th>
                    <th class="p-3">Publisher</th>
                    <th class="p-3">Genre</th>
                    <th class="p-3">Description</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Image</th>
                    <th class="p-3"></th>
                    <th class="p-3"></th>
                </tr>
                <?php
                $sql = "SELECT * FROM game, genre WHERE game.genre_id = genre.genre_id";
                $hand = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($hand)) {
                ?>
                    <tr class="text-center">
                        <td class="p-3"><?= $row["game_name"] ?></td>
                        <td class="p-3"><?= $row["publisher"] ?></td>
                        <td class="p-3"><?= $row["genre_name"] ?></td>
                        <td class="p-3"><?= $row["description"] ?></td>
                        <td class="p-3"><?= $row["price"] ?> Baht</td>
                        <td class="p-3"><img src="images/<?= $row["image"] ?>" width="150px" height="100px"> </td>
                        <td class="p-3"><a href="edit_product.php?game_name=<?= $row["game_name"] ?>" class="btn btn-warning rounded-pill">EDIT</a></td>
                        <td class="p-3"><a href="delete_product.php?game_name=<?= $row["game_name"] ?>" class="btn btn-danger rounded-pill" onclick="Del(this.href);return:false;">DELETE</a></td>
                    </tr>
                <?php
                }
                mysqli_close($conn);
                ?>
            </table>
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

<script language="Javascript">
    function Del(mypage) {
        var agree = confirm("คุณต้องการลบสินค้าหรือไม่");
        if (agree) {
            window.location = mypage;
        }
    }
</script>