<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soru Listesi</title>

  <link rel="stylesheet" href="style.css">

</head>

<style>


</style>

<body>
  <div class="userList">
    
    
   
    <div class="search-bar">
      <button style="width: 200px;" id="homePageButton" onclick="goToHomePage()">Anasayfa</button>
      <input type="text" id="searchInput" onkeyup="searchQuestions()" placeholder="Ara">
    </div>

    <table id="questionTable">
      <thead>
        <tr>
         
          <th>Soru ID</th>
          <th>Soru Adı</th>
          <th>Soru Zorluğu</th>
          <th>Düzenle</th>
          <th>Sil</th>
        
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($userList as $user){
            ?>
        <tr>
          
          
          <td><?php echo $user["id"]; ?></td>
          <td><?php echo $user["questionname"]; ?></td>
          <td><?php echo $user["difficulty"]; ?></td>
          <td><a href='editquestions.php?id=<?php echo $user["id"]; ?>'>Düzenle</a></td>
          <td><a href='deletequestions.php?id=<?php echo $user["id"]; ?>' onclick="return confirm('Bu soruyu silmek istediğinize emin misiniz?')">Sil</a></td>

          
        </tr>

        <?php
        }
       
        ?>
  



      </tbody>
    </table>
    <div class="KONTEYNER">
    <button style="width: 200px;" id="addquestionbutton" onclick="Addquestion()">Soru Ekle</button>
    <button style="width: 200px;" id="showquestionbutton" onclick="Showquestions()">Başlat</button>
    </div>
  </div>
 
  <script src="script.js"></script>
</body>

</html>