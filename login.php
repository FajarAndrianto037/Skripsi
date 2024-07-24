<?php
session_start();

include "koneksi.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password using MD5
    $hashed_password = md5($password);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$hashed_password'";
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
        } else if ($data["level"] == "siswa") {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION["nama"] = $data["nama"];
            $_SESSION["username"] = $data["username"];
            $_SESSION["level"] = $data["level"];
            header("location: halaman_belajar.php");
        } else if ($data["level"] == "umum") {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION["nama"] = $data["nama"];
            $_SESSION["username"] = $data["username"];
            $_SESSION["level"] = $data["level"];
            header("location: halaman_belajar.php");
        } else if ($data["level"] == "guru") {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION["nama"] = $data["nama"];
            $_SESSION["username"] = $data["username"];
            $_SESSION["level"] = $data["level"];
            header("location: guru/halaman_guru.php");
        }
    } else {
        echo "<script>alert('Login gagal! Username atau password salah.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login/css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form 
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="login/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="login/images/signin-image.png" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Daftar Sekarang</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" formmethod="post" formaction="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="login/vendor/jquery/jquery.min.js"></script>
    <script src="login/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>