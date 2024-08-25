<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $questionname = $_POST['questionname'];
    $difficulty = $_POST['difficulty'];
    $diffid = $_POST['diffid'];
    $questionfull = $_POST['questionfull'];
    $CorAnswer = $_POST['CorAnswer'];
    $OtherAnswer1 = $_POST['OtherAnswer1'];
    $OtherAnswer2 = $_POST['OtherAnswer2'];
    $OtherAnswer3 = $_POST['OtherAnswer3'];

    $newData = "
    array(
      'id' => $id,
      'questionname' => '$questionname',
      'difficulty' => '$difficulty',
      'diffid' => $diffid,
      'Questionfull' => '$questionfull',
      'CorAnswer'=> '$CorAnswer',
      'OtherAnswer1'=> '$OtherAnswer1',
      'OtherAnswer2'=> '$OtherAnswer2',
      'OtherAnswer3'=> '$OtherAnswer3'),";

    $file = 'conn.php';


    $currentContent = file_get_contents($file);


    $newContent = str_replace(");?>", "$newData\n);?>", $currentContent);

    file_put_contents($file, $newContent);

    echo "<script>alert('Yeni soru oluşturuldu!');</script>";
    header('Location: questlist.php');
    
}
?>

<!DOCTYPE html>
<html lang="tr">
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <title>Soru Ekleme</title>
    
</head>
<body>
    <div class="form-container">
        <h2>Soru Ekleme Formu</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="id">Soru ID:</label>
                <input type="number" id="id" name="id" required>
            </div>

            <div class="form-group">
                <label for="questionname">Soru İsmi:</label>
                <input type="text" id="questionname" name="questionname" required>
            </div>

            <div class="form-group">
                <label for="difficulty">Zorluk Derecesi:</label>
                <select id="difficulty" name="difficulty" onchange="updateDiffid()" required>
                    <option value="" selected disabled>Seçiniz...</option>
                    <option value="KOLAY">KOLAY</option>
                    <option value="ORTA">ORTA</option>
                    <option value="ZOR">ZOR</option>
                    <option value="KAZIK">KAZIK</option>
                </select>
            </div>

            <input type="hidden" id="diffid" name="diffid">
    

            <div class="form-group">
                <label for="questionfull">Soru İçeriği:</label>
                <textarea id="questionfull" name="questionfull" required></textarea>
            </div>

            <div class="form-group">
                <label for="CorAnswer">Doğru Cevap:</label>
                <textarea id="CorAnswer" name="CorAnswer" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="OtherAnswer1">Diğer Şık:</label>
                <textarea id="OtherAnswer1" name="OtherAnswer1" required></textarea>
            </div>

            <div class="form-group">
                <label for="OtherAnswer2">Diğer Şık:</label>
                <textarea id="OtherAnswer2" name="OtherAnswer2" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="OtherAnswer3">Diğer Şık:</label>
                <textarea id="OtherAnswer3" name="OtherAnswer3" required></textarea>
            </div>

            <button type="submit">Soruyu Kaydet</button>
            
        </form>
        <button style="width: 200px;" id="homePageButton" onclick="goToHomePage()" >Anasayfa</button>
    </div>

    <script src="script.js"></script>
</body>
</html>
