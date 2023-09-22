<?php
session_start();
include 'condb.php';
?>
<?php
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO user(email, username, password)
VALUES ('$email','$username','$password')";
$result = mysqli_query($conn, $sql);

if ($result) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "คุณทำการล็อคอินเรียบร้อยแล้ว";
    header('location: index.php');
}
mysqli_close($conn)
?>