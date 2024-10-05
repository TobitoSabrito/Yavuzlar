<?php
session_start();
include "functions/functions.php";
if (!isset($_SESSION['id']) && !isset($_SESSION['username'])) {
    header("Location: loginpage.php?message=You are not logged in!");
    die();
}
$is_admin = $_SESSION["isAdmin"];


if(empty(trim($_GET['searchinput'])) && isset($_GET['diflvl'])){
    $searchinput = $_GET['searchinput'];
    $diflvl = $_GET['diflvl'];
    $questions = searchQuest($searchinput,$diflvl);
  

}else if(isset($_GET['searchinput']) && !empty(trim($_GET['searchinput']))){
    $searchinput = $_GET['searchinput'];
    $diflvl = $_GET['diflvl'];
    $questions = searchQuest($searchinput,$diflvl);
 

}else{
    $questions = getQuestions();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sorular</title>
</head>
<body>
    <div class="main-div">
        <form action="quests.php" method="GET" class="search-form">
            <input type="text" id="searchinput" name="searchinput" placeholder="Soru Ara" class="search-input" style="text-align: center;background-color: white; color: black;">
            <button type="submit" style="width: 50px;;align-items: center;text-align:center;"class="search-button">Ara</button>
            <div class="difficulty-filter">
            <label for="difficulty-select">Zorluk Seviyesi:</label>
            <select id="difficulty-select" name="diflvl" id="diflvl">
                <option value="">Tümü</option>
                <option value="0">Kolay</option>
                <option value="1">Orta</option>
                <option value="2">Zor</option>
            </select>
        </div>
        </form>
        <?php foreach ($questions as $question): ?>
        <div class="questions">
            <p><?php echo htmlspecialchars($question['questname']); ?></p>
            <div class="question-buttons">
                <?php if($is_admin == 1):?>
                <a href="edit.php?id=<?php echo $question["id"]?>"><button style="width: 50px;"class="edit-button" id="editbtn" name="editbtn">Edit</button></a>
                <a href="questdelete.php?id=<?php echo $question["id"]?>"><button style="width: 60px;" class="delete-button" id="deletebtn" name="deletebtn">Delete</button></a>
                <?php endif;?>
            </div>
        </div>

        <?php endforeach;?>
        
        
        <div id="questions-container"></div>
        
        <div class="button-container">
            <a href="index.php" style="color: black;text-align: center;"class="nextbtn">AnaSayfa</a>
            <?php if($is_admin == 1):?>
            <a href="addquest.php"><button style="width: 100px;" class="nextbtn" id="questionpage">Soru Ekle</button></a>
            <?php endif;?>
            <a href="takequiz.php"><button style="width: 100px;" class="nextbtn" id="takequizpage">Hemen Çöz!</button></a>
        </div>
    </div>
</body>
</html>
