<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include 'conn.php';

    
    $questionToEdit = null;
    foreach ($userList as $user) {
        if ($user['id'] == $id) {
            $questionToEdit = $user;
            break;
        }
    }

    if (!$questionToEdit) {
        echo "Geçersiz soru ID'si!";
        exit;
    }
}

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

    // Mevcut soruyu güncelle
    foreach ($userList as &$user) {
        if ($user['id'] == $id) {
            $user['questionname'] = $questionname;
            $user['difficulty'] = $difficulty;
            $user['diffid'] = $diffid;
            $user['Questionfull'] = $questionfull;
            $user['CorAnswer'] = $CorAnswer;
            $user['OtherAnswer1'] = $OtherAnswer1;
            $user['OtherAnswer2'] = $OtherAnswer2;
            $user['OtherAnswer3'] = $OtherAnswer3;
            break;
        }
    }

    $content = "<?php\n\$userList = " . var_export($userList, true) . ";\n?>";
    file_put_contents('conn.php', $content);

    echo "<script>alert('Soru başarıyla güncellendi!');</script>";
    header('Location: questlist.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <title>Soru Düzenleme</title>
</head>
<body>
    <div class="form-container">
        <h2>Soru Düzenleme Formu</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="id">Soru ID: (Değiştirilemez)</label>
                <input type="number" id="id" name="id" value="<?php echo $questionToEdit['id']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="questionname">Soru İsmi:</label>
                <input type="text" id="questionname" name="questionname" value="<?php echo $questionToEdit['questionname']; ?>" required>
            </div>

            <div class="form-group">
                <label for="difficulty">Zorluk Derecesi:</label>
                <select id="difficulty" name="difficulty" onchange="updateDiffid()" required>
                    <option value="" disabled>Seçiniz...</option>
                    <option value="KOLAY" <?php if ($questionToEdit['difficulty'] == 'KOLAY') echo 'selected'; ?>>KOLAY</option>
                    <option value="ORTA" <?php if ($questionToEdit['difficulty'] == 'ORTA') echo 'selected'; ?>>ORTA</option>
                    <option value="ZOR" <?php if ($questionToEdit['difficulty'] == 'ZOR') echo 'selected'; ?>>ZOR</option>
                    <option value="KAZIK" <?php if ($questionToEdit['difficulty'] == 'KAZIK') echo 'selected'; ?>>KAZIK</option>
                </select>
            </div>

            <input type="hidden" id="diffid" name="diffid" value="<?php echo $questionToEdit['diffid']; ?>">

            <div class="form-group">
                <label for="questionfull">Soru İçeriği:</label>
                <textarea id="questionfull" name="questionfull" required><?php echo $questionToEdit['Questionfull']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="CorAnswer">Doğru Cevap:</label>
                <textarea id="CorAnswer" name="CorAnswer" required><?php echo $questionToEdit['CorAnswer']; ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="OtherAnswer1">Diğer Şık:</label>
                <textarea id="OtherAnswer1" name="OtherAnswer1" required><?php echo $questionToEdit['OtherAnswer1']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="OtherAnswer2">Diğer Şık:</label>
                <textarea id="OtherAnswer2" name="OtherAnswer2" required><?php echo $questionToEdit['OtherAnswer2']; ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="OtherAnswer3">Diğer Şık:</label>
                <textarea id="OtherAnswer3" name="OtherAnswer3" required><?php echo $questionToEdit['OtherAnswer3']; ?></textarea>
            </div>

            <button type="submit">Değişiklikleri Kaydet</button>
        </form>
        <button style="width: 200px;" id="homePageButton" onclick="goToHomePage()">Anasayfa</button>
    </div>

    <script src="script.js"></script>
</body>
</html>
