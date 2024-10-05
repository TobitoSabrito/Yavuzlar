<?php 
  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['username']) ) {
    header("Location: index.php?message=You are already logged in!");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Kayıt Sayfası</title>
</head>
<body>
    <div class="main-div">
        <h1>Kayıt Alanı</h1>
        <div class="login-container">
            <form action="registerQuery.php" method="post" enctype="multipart/form-data">
            <input  class="userinput" type="text" name="username" id="username" placeholder="Kullanıcı Adı" required>
            <input  type="password" class="userinput" name="passwd" id="passwd" placeholder="Parola" required>
            <p>Admin Şifresini Giriniz</p>
            <input  type="password" class="userinput" name="admin" id="admin" placeholder="Admin Şifresi" required>
            <button type="submit" class="loginbtn">Kayıt Ol</button>
            </form>
        </div>
    </div>
    
    

    
</body>
</html>