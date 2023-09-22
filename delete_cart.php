<?php
include 'condb.php';
$game_id = $_GET['game_id'];
$sql = "DELETE FROM cart WHERE game_id = '$game_id' ";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบสินค้าในตะกร้าเรียบร้อย');</script>";
    echo "<script>window.location = 'cart.php';</script>";
} else {
    echo "Error : " . $sql . "<br>" , mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบสินค้าในตะกร้าได้');</script>";
}

mysqli_close($conn);

?>