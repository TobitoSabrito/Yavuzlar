<?php
session_start();
include "functions/functions.php";
$users = getScore();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Skorlar</title>
</head>
<body style="background-color: gray;">
    <div class="maintable-div">
        <h1 style="color: white;">Skorlar</h1>
        <table class="tableses">
            <tr>
                <th style="border: 1px solid white; padding: 10px; color:#ffffff;  background-color: #000000;">Name</th>
                <th style="border: 1px solid white; padding: 10px; color:#ffffff;  background-color: #000000;">Score</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td style="border: 1px solid white; padding: 10px;"><?php echo $user["username"]; ?></td>
                    <td style="border: 1px solid white; padding: 10px;"><?php echo $user["score"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h2 id="score"></h2>
        <a href="index.php">
            <button class="anasayfa-btn" style="width: 200px;">Anasayfa</button>
        </a>
    </div>
</body>
</html>
