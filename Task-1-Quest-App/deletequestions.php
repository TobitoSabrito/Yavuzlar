<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include 'conn.php';

    
    foreach ($userList as $key => $user) {
        if ($user['id'] == $id) {
            unset($userList[$key]);
            break;
        }
    }

  
    $content = "<?php\n\$userList = " . var_export(array_values($userList), true) . ";?>";

  
    if (file_put_contents('conn.php', $content)) {
        echo "Soru başarıyla silindi!";
        header("Location: QuestList.php");
        exit;
    } else {
        echo "Dosya güncellenirken bir hata oluştu.";
    }
} else {
    echo "Geçersiz ID!";
}
?>
