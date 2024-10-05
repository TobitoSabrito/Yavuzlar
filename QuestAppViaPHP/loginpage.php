<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    echo "<script>alert('Already signed in!');</script>";
    header("Location:index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Giriş Yap</title>
</head>
<body>
    <div class="main-div">
        <h1>Quiz Uygulaması Giriş Paneli</h1>
        <div class="login-container">
        <form action="loginpageQuery.php" method="post" enctype="multipart/form-data">
        <input type="text" class="userinput" id="username" name="username" placeholder="Kullanıcı Adı">
        <input type="password" class="userinput" id="passwd" name="passwd" placeholder="Parola">
        <a href="index.php"><button type="submit" class="loginbtn">Giriş Yap</button></a>
        </form>
        <a href="register.php"><button class="loginbtn">Kayıt Ol</button></a>
    </div>

    </div>
    
</body>
</html>