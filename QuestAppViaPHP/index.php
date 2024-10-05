<?php
session_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['username'])) {
    header("Location: loginpage.php?message=You are not logged in!");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Anasayfa</title>
</head>
<body>
    <div class="main-div">
        <div class="managment-div">
            <a href=""><button class="btn-main" id="baslikbtn"href>Quiz App</button></a>
        </div>
        <div class="questpage-div">
            <a href="quests.php?searchinput=&diflvl="><button class="btn-main" href>Soruları Gör</button></a>
            <a href="skorboard.php"><button class="btn-main" href>Skorlar</button></a>
            <a href="logout.php"><button class = "btn-main" >Çıkış Yap</button></a>
        </div>

    </div>
</body>
</html>