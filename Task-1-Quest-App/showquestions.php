<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $randomKey = array_rand($userList);
    $selectedQuestion = $userList[$randomKey];
    $selectedQuestionName = $selectedQuestion['questionname'];
    $selectedQuestionDiff = $selectedQuestion['difficulty'];
    $selectedQuestionDiffId = $selectedQuestion['diffid'];
    
    $answers = [
        $selectedQuestion['CorAnswer'],
        $selectedQuestion['OtherAnswer1'],
        $selectedQuestion['OtherAnswer2'],
        $selectedQuestion['OtherAnswer3']
    ];
    shuffle($answers);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sorular</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="whole-page">
    <div class="score-board">
      <h2>Puan: <span id="score">0</span></h2>
    </div>
    <div class="question-container">
      <h1 onload="setzero()">Soru: <?php echo htmlspecialchars($selectedQuestionName); ?></h1>
      <h2>Zorluk: <?php echo $selectedQuestionDiff; ?></h2>
      <h3><?php echo htmlspecialchars($selectedQuestion['Questionfull']); ?></h3>

      <?php foreach ($answers as $answer) { ?>
          <button class="answer-button" onclick="checkAnswer(this, '<?php echo addslashes($answer); ?>', '<?php echo addslashes($selectedQuestion['CorAnswer']); ?>', <?php echo $selectedQuestionDiffId; ?>)">
              <?php echo htmlspecialchars($answer); ?>
          </button>
      <?php } ?>
    </div>
    <button style="width: 200px; display: block;" id="nextquestionbutton" onclick="Nextquestion()">Yeni Soru</button>
    <button style="width: 200px;" id="anasyfa" onclick="goToHomePage()">Anasayfa</button>
    <button style="width: 200px;" id="anasyfa" onclick="resetScore()">Puanı Sıfırla</button>
  </div>

  <script src="otherscripts.js"></script> 
</body>
</html>
