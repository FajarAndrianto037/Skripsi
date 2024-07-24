?php
session_start();

include "koneksi.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($mysqli, $sql);

    if (!$result) {
        die('Ada kesalahan pada query user: ' . mysqli_error($conn));
    }

    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($data["level"] == "admin") {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION["nama"] = $data["nama"];
            $_SESSION["username"] = $data["username"];
            $_SESSION["level"] = $data["level"];
            header("location: admin/index.php");
        } 
else {
        echo "<script>alert('Login gagal! Username atau password salah.');</script>";
    }
}
?>
