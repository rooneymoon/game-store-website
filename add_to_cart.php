<?php
include 'condb.php';
$game_name = $_GET['game_name'];
$price = $_GET['price'];
$sql="INSERT INTO cart(game_name,price)
VALUES('$game_name','$price')";

if(mysqli_query($conn,$sql)){
    echo "<script>alert('เพิ่มลงในตะกร้าสินค้าเรียบร้อย');</script>";
    echo "<script>window.location = 'cart.php';</script>";
} else {
    echo "Error : " . $sql . "<br>" , mysqli_error($conn);
    echo "<script>alert('ไม่สามารถเพิ่มลงในตะกร้าสินค้าได้');</script>";
}
mysqli_close($conn);

?>